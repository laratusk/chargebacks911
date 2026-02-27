<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911;

use InvalidArgumentException;
use ReflectionClass;

abstract class ChargeBackAbstract
{
    /** @var array<string, mixed> */
    private array $data = [];

    /** @return array<string> */
    abstract protected function requiredFields(): array;

    /** @param array<string, mixed> $data */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }
    }

    public function __set(string $key, mixed $value): void
    {
        if (! $this->propertyExists($key)) {
            throw new InvalidArgumentException("$key property doesn't exist in ".static::class);
        }

        $propertyTypes = $this->getPropertyTypes();

        if (isset($propertyTypes[$key]) && ! $this->isValidType($value, $propertyTypes[$key])) {
            throw new InvalidArgumentException('Invalid type for '.$key.' in '.static::class.'. Expected '.implode('|', (array) $propertyTypes[$key]).', got '.gettype($value));
        }

        if (is_array($value)) {
            $this->data[$key] = [];
            foreach ($value as $itemKey => $item) {
                $this->data[$key][$itemKey] = is_a($item, ChargeBackAbstract::class) ? $item->toArray() : $item;
            }
        } else {
            $this->data[$key] = $value;
        }
    }

    public function __get(string $key): mixed
    {
        return $this->data[$key] ?? null;
    }

    public function toJson(): string
    {
        $result = json_encode($this->toArray(), JSON_PRETTY_PRINT);

        return $result === false ? '' : $result;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $this->validate();

        $maybeToArray = static function (mixed $value): mixed {
            if ($value === null) {
                return null;
            }

            return \is_object($value) && \method_exists($value, 'toArray') ? $value->toArray() : $value;
        };

        return \array_reduce(\array_keys($this->data), function (array $acc, string $k) use ($maybeToArray): array {
            $v = $this->data[$k];
            $acc[$k] = $this->isList($v) ? \array_map($maybeToArray, (array) $v) : $maybeToArray($v);

            return $acc;
        }, []);
    }

    private function isList(mixed $array): bool
    {
        if (! \is_array($array)) {
            return false;
        }
        if ($array === []) {
            return true;
        }

        return \array_keys($array) === \range(0, \count($array) - 1);
    }

    private function validate(): void
    {
        foreach ($this->requiredFields() as $field) {
            if (! isset($this->data[$field])) {
                throw new InvalidArgumentException("$field is required in ".static::class);
            }
        }

        $propertyTypes = $this->getPropertyTypes();
        foreach ($this->data as $key => $value) {
            if (isset($propertyTypes[$key]) && ! $this->isValidType($value, $propertyTypes[$key])) {
                throw new InvalidArgumentException('Invalid type for '.$key.' in '.static::class.'. Expected '.implode('|', (array) $propertyTypes[$key]).', got '.gettype($value));
            }
        }
    }

    private function propertyExists(string $key): bool
    {
        return array_key_exists($key, $this->getPropertyTypes());
    }

    /** @return array<string, string|array<string>> */
    private function getPropertyTypes(): array
    {
        $propertyTypes = [];
        $reflection = new ReflectionClass($this);

        $docComment = $reflection->getDocComment();
        if ($docComment) {
            preg_match_all('/@property\s+(\S+)\s+\$(\w+)/', $docComment, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $rawType = str_replace('?', 'null|', $match[1]);
                $types = explode('|', $rawType);
                $uniqueTypes = array_values(array_unique($types));
                $propertyTypes[$match[2]] = count($uniqueTypes) > 1 ? $uniqueTypes : $uniqueTypes[0];
            }
        }

        return $propertyTypes;
    }

    /** @param array<string>|string $expectedType */
    private function isValidType(mixed $value, array|string $expectedType): bool
    {
        if (is_array($expectedType)) {
            foreach ($expectedType as $type) {
                if ($this->isValidType($value, $type)) {
                    return true;
                }
            }

            return false;
        }

        // Strip generic type parameters (e.g. array<mixed> → array)
        $baseType = (string) preg_replace('/<[^>]+>/', '', $expectedType);

        if ($baseType !== $expectedType) {
            return $this->isValidType($value, $baseType);
        }

        if ($value instanceof $expectedType) {
            return true;
        }

        return match ($expectedType) {
            'string' => is_string($value),
            'numeric' => is_numeric($value),
            'int' => is_int($value),
            'float' => is_float($value),
            'bool' => is_bool($value),
            'array' => is_array($value),
            'object' => is_object($value),
            'null' => is_null($value),
            default => false
        };
    }
}

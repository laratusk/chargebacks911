<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $D12_s2 Time
 * @property string $event_date Event date
 * @property string $event_name Event name
 * @property string $manifest URL to manifest
 * @property string $name_on_ticket Name on ticket
 * @property string $passenger_name Passenger name
 * @property string $P359_S1 Sales agent
 * @property string $P359_S2 Amount
 * @property string $P506 Ticket/ITIN number
 * @property string $P511 Agency name
 * @property string $P521 Airline code
 * @property string $P523 Origin
 * @property string $P524 Destination
 * @property string $P530 Flight number
 * @property string $P575 Travel date
 * @property string $P1015 Fare basis
 * @property string $P1211 Cabin class
 * @property string $redemption_code Redemption code
 * @property string $redemption_status Redemption status
 * @property string $reissue_date Reissue date
 * @property string $sales_agent Sales agent name
 * @property string $ticket_itin_number Ticket itinerary number
 */
final class TravelAndEntertainment extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}

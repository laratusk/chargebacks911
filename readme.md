https://apidoc.chargebacks911.com/documentation

## Add Orders

This allows the merchant to upload orders into our platform. The structured JSON schema in the request body ensures clarity and precision in conveying essential order details while allowing flexibility in what data elements are conveyed to our platform. Users can efficiently contribute new order information to enhance the platform's transactional insights

Please note that the payload received under the meta optional property would be saved for data enrichment. POST /orders endpoint's response for the meta property would be limited compared to what is received in POST request.

| **Field**      | **Details**                                                                 |
|----------------|-----------------------------------------------------------------------------|
| **merchantId** | **required**                                                                |
| **Type**       | `integer`                                                                   |
| **Description**| The Defined ID value associated with the Merchant                           |


### Fields

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **acquire_date**              | **Type**: `string`<br>**Description**: Date of customer's account creation  |
| **affiliate_id**              | **Type**: `string`<br>**Description**: Affiliate, store or franchisee ID    |
| **affiliate_name**            | **Type**: `string`<br>**Description**: Affiliate, store or franchisee ID    |
| **billing**                   | **Type**: `object`<br>**Description**: An object containing order billing details |
| **campaign_id**               | **Type**: `integer`<br>**Description**: ID of the order's campaign          |
| **child_order_id**            | **Type**: `string`<br>**Description**: The merchant’s custom unique child order identifier of the order id, from their CRM/OMS |
| **coupon_discount**           | **Type**: `object`<br>**Description**: Coupon/Discount amount deducted from the order |
| **date**                      | **Type**: `string`<br>**Description**: Date that the order was processed in the merchant’s CRM/OMS |
| **date_of_last_contact**      | **Type**: `string`<br>**Description**: The most recent date that the customer was contacted |
| **employee_name**             | **Type**: `string`<br>**Description**: Merchant employee’s name who created the order in the CRM/OMS |
| **employee_username**         | **Type**: `string`<br>**Description**: Merchant employee’s username who created the order in the CRM/OMS |
| **hold_date**                 | **Type**: `string`<br>**Description**: Date when customer’s recurring orders stopped or put this order on hold |
| **id**                        | **Type**: `string`<br>**Description**: ID of the transaction<br>**Required**: Yes |
| **is_blacklisted**            | **Type**: `boolean`<br>**Description**: Is the customer blacklisted in the CRM/OMS? (true/false) |
| **is_fraud**                  | **Type**: `boolean`<br>**Description**: Is this order flagged as fraud in the CRM/OMS? (true/false) |
| **meta**                      | **Type**: `object`<br>**Description**: An object containing customer identification, social media, historical purchases, and order-related screenshots |
| **on_hold_by**                | **Type**: `string`<br>**Description**: The username of the merchant’s agent who placed the order on hold |
| **order_click_id**            | **Type**: `string`<br>**Description**: To track the online traffic source reference identifier |
| **order_contact_email**       | **Type**: `string`<br>**Description**: Customer’s email address. Note: Required if the order source is PayPal. |
| **order_contact_phone**       | **Type**: `string`<br>**Description**: Customer’s phone number              |
| **order_notes**               | **Type**: Array of `strings`<br>**Description**: An array of notes related to this order |
| **parent_order_id**           | **Type**: `string`<br>**Description**: The merchant’s custom unique parent order identifier of the order id, from their CRM/OMS |
| **publisher_id**              | **Type**: `string`<br>**Description**: Publisher or promoter identifier     |
| **publisher_name**            | **Type**: `string`<br>**Description**: Publisher or promoter name           |
| **sales_tax_amount**          | **Type**: `string`<br>**Description**: Order sales tax amount               |
| **sales_tax_percent**         | **Type**: `string`<br>**Description**: Order sales tax percent              |
| **shipping_charge**           | **Type**: `string`<br>**Description**: Shipping charge amount               |
| **status_confirmation**       | **Type**: `string`<br>**Description**: Order has received confirmation in the merchant’s CRM/OMS and sent to Fulfillment for processing |
| **status_confirmation_date**  | **Type**: `string`<br>**Description**: Date when the order was confirmed and sent to Fulfillment |
| **store_location**            | **Type**: `string`<br>**Description**: A link to the merchant’s website or physical store identifier |
| **sub_affiliate_id**          | **Type**: `string`<br>**Description**: Affiliate, store or franchisee subdivision identifier |
| **sub_affiliate_name**        | **Type**: `string`<br>**Description**: Affiliate, store or franchisee subdivision name |
| **total_amount**              | **Type**: `number`<br>**Description**: Order amount total                   |
| **total_currency**            | **Type**: `string`<br>**Description**: The currency type of the order total |
| **transactions**              | **Type**: Array of `objects`<br>**Description**: An array of transactions objects related to the order. Note: For Getting Orders, the transactions value will be an object containing the first transaction posted (not an array of objects)<br>**Required**: Yes |
| **travel_and_entertainment**  | **Type**: `object`<br>**Description**: (No description provided)            |
| **voice_signature**           | **Type**: `string`<br>**Description**: A link pointing to a file containing a recording of the audio at the time of order (Phone Orders) |

---

### Billing Object

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **address**                   | **Type**: `object`<br>**Description**: Billing address details              |
| **company**                   | **Type**: `string`<br>**Description**: Billing company                      |
| **contact_first_name**        | **Type**: `string`<br>**Description**: Billing contact first name           |
| **contact_last_name**         | **Type**: `string`<br>**Description**: Billing contact last name            |
| **email**                     | **Type**: `string`<br>**Description**: Billing email                        |
| **fax**                       | **Type**: `string`<br>**Description**: Billing fax number                   |
| **phone**                     | **Type**: `string`<br>**Description**: Billing phone number                 |

---

### Address Object (Billing)

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **city**                      | **Type**: `string`<br>**Description**: Billing City                         |
| **country**                   | **Type**: `string`<br>**Description**: Billing Country                      |
| **postcode**                  | **Type**: `string`<br>**Description**: Billing Postcode                     |
| **state**                     | **Type**: `string`<br>**Description**: Billing region or state              |
| **street**                    | **Type**: `string`<br>**Description**: Billing Address                      |
| **street_2**                  | **Type**: `string`<br>**Description**: Billing address (second line)        |

---

### Meta Object

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **customer**                  | **Type**: `object`<br>**Description**: Customer details                     |
| **screenshots**               | **Type**: `object`<br>**Description**: (No description provided)            |

---

### Customer Object (Meta)

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **date_of_first_transaction** | **Type**: `string`<br>**Description**: Date of the customer's first transaction. |
| **dob**                       | **Type**: `string`<br>**Description**: Customer's date of birth (yyyy-mm-dd) |
| **drivers_license_number**    | **Type**: `string`<br>**Description**: Customer's driver's license number (for electronic check/debit card). |
| **history**                   | **Type**: Array of `objects`<br>**Description**: An array of historic transactions and profile updates related to this customer (preferred going back the last 6 months). Note: For Getting Orders, the history value will be an object containing the first customer history object submitted (not an array of objects). |
| **id**                        | **Type**: `integer`<br>**Description**: Customer ID.                        |
| **passport_number**           | **Type**: `integer`<br>**Description**: Customer's passport number          |
| **profile_updates**           | **Type**: Array of `strings`<br>**Description**: An array of customer's profile updates. Example: {'new payment method added', 'customer updated primary email address'} |
| **refund_total**              | **Type**: `string`<br>**Description**: The total amount refunded to the customer so far on this order. |
| **social_media**              | **Type**: `object`<br>**Description**: An object containing social media information related to this customer |
| **ssn**                       | **Type**: `string`<br>**Description**: The customers SSN (Social Security Number) (for debit card purchases). |
| **type**                      | **Type**: `string`<br>**Description**: Customer type in the CRM/OMS         |

---

### Social Media Object (Customer)

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **url**                       | **Type**: `string`<br>**Description**: Customer's Social URL                |
| **username**                  | **Type**: `string`<br>**Description**: Customer's social media username     |

---

### History Object (Customer)

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **arn**                       | **Type**: `string`<br>**Description**: Acquirer Reference Number            |
| **auth_id**                   | **Type**: `string`<br>**Description**: Authorization code at the time of the transaction |
| **auth_type**                 | **Type**: `string`<br>**Description**: Sample values:(“Card Not Present”,“Chip and Pin”,“Chip and Signature”,“Contactless”,“MastercardSecure”,“Mobile Purchase Authenticated”,“Other”,“Secured by AmericanExpress”,“SignatureOnly”,“Verified by Visa”) |
| **avs**                       | **Type**: `string`<br>**Description**: Address Verification Status Code [A-Z] |
| **bill_cycle**                | **Type**: `string`<br>**Description**: How many times has this customer been billed (rebill depth)? (1. First month, or 2. Second month) Default to 1 if not provided |
| **card**                      | **Type**: `object`<br>**Description**: An object representing the credit or debit card used to make the order/transaction |
| **cascading_gateway**         | **Type**: `boolean`<br>**Description**: Identifies if the orders for this client are processed through multiple payment gateways |
| **checkout_account_ssn_last_four** | **Type**: `string`<br>**Description**: The last 4 digits of the customer’s social security number (SSN) (Optional for debit card payments) |
| **checkout_last_four**        | **Type**: `string`<br>**Description**: The last 4 digits of the checking account (optional for debit card payments) |
| **cvv**                       | **Type**: `string`<br>**Description**: Cardholder Verification Value Status [0-9 or A-Z]. Note: Do NOT send the CVV code in this field, this value is the CVV status code sent back from the merchant’s payment gateway. |
| **date_issued**               | **Type**: `string`<br>**Description**: The date that the transaction was created/issued, this is usually the same as the order date. The settlement date or when funds were transferred into the merchant’s bank account is the settlement_date |
| **decline_reason**            | **Type**: `string`<br>**Description**: Indicates the authorization decline reason |
| **device_id**                 | **Type**: `string`<br>**Description**: The mobile or computer device identifier (ID) |
| **device_name**               | **Type**: `string`<br>**Description**: Name of the mobile device type or type of computer used to process this transaction. |
| **fraud_action**              | **Type**: `string`<br>**Description**: Action taken if/when the transaction is identified as fraudulent. |
| **fraud_filter**              | **Type**: `string`<br>**Description**: The name of the fraud filter applied against the transaction. |
| **fraud_score**               | **Type**: `string`<br>**Description**: The fraud score assessed on this transaction [A-Z] |
| **id**                        | **Type**: `string`<br>**Description**: ID of the transaction<br>**Required**: Yes |
| **ip_address**                | **Type**: `string`<br>**Description**: IP address of the customer who generated the transaction |
| **market_type**               | **Type**: `string`<br>**Description**: Valid market types:(“eCommerce”,“MOTO”,“Retail”) |
| **mid**                       | **Type**: `string`<br>**Description**: The merchant account number or merchant identifier (MID) associated with this transaction<br>**Required**: Yes |
| **mid_gateway_descriptor**    | **Type**: `string`<br>**Description**: The MID descriptor is the text displayed on the customer’s credit card statement for this transaction. |
| **mid_gateway_id**            | **Type**: `string`<br>**Description**: The merchant’s payment gateway identifier (ID). |
| **products**                  | **Type**: Array of `objects`<br>**Description**: An array of product objects purchased on this order. |
| **rebill_discount_percent**   | **Type**: `string`<br>**Description**: The percentage discount offered to clients who initially refused to continue a recurring /subscription service. |
| **refund_amount**             | **Type**: `string`<br>**Description**: The sum of all refunds on this order. |
| **refund_date**               | **Type**: `string`<br>**Description**: Date of the last refund for this order (*Required if refund_amount is provided) |
| **retry_date**                | **Type**: `string`<br>**Description**: The next date that a recurring subscription charge will be attempted (if previous charge failed) |
| **routing_transit_number**    | **Type**: `string`<br>**Description**: The bank routing number used in this transaction. Typically this is included with debit card purchases. |
| **settlement_amount**         | **Type**: `string`<br>**Description**: The amount paid to the merchant at the time of settlement.<br>**Required**: Yes |
| **settlement_currency**       | **Type**: `string`<br>**Description**: The type of currency used when the transaction was settled. |
| **settlement_date**           | **Type**: `string`<br>**Description**: The date the transaction was settled<br>**Required**: Yes |
| **status**                    | **Type**: `string`<br>**Description**: The current status of the transaction, must match one of these values: (“Approved”,“Authorized”,“Declined”,“Duplicate”,“Error”,“Failed”,“Other”,“Refunded”,“Rejected”,“Success”) |
| **void_amount**               | **Type**: `string`<br>**Description**: The sum of all voids for the current order. |
| **void_date**                 | **Type**: `string`<br>**Description**: Date of the last void for the current order (*Required if void_amount is provided) |

---

### Card Object (History)

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **code_status**               | **Type**: `string`<br>**Description**: For merchants who use Card Code Verification. This value represents the status value returned by the card network/scheme |
| **exp_month**                 | **Type**: `string`<br>**Description**: Credit or debit card expiration month |
| **exp_year**                  | **Type**: `string`<br>**Description**: Credit or debit card expiration year |
| **number**                    | **Type**: `string`<br>**Description**: Credit or debit card number. Note: Only send the first 6 digits and the last 4 digits of the credit/debit number. The rest of the middle digits should be masked with x’s. |
| **prepaid**                   | **Type**: `boolean`<br>**Description**: Is this a prepaid card? (true/false) |
| **test**                      | **Type**: `boolean`<br>**Description**: Is this a test order? (true/false) |
| **type**                      | **Type**: `string`<br>**Description**: Credit or debit card type (“Visa”, “MasterCard”, “Discover”, “Amex”) |

---

### Products Object (History)

| **Field**                     | **Details**                                                                 |
|-------------------------------|-----------------------------------------------------------------------------|
| **description**               | **Type**: `string`<br>**Description**: Description of the product/service.  |
| **digital**                   | **Type**: `object`<br>**Description**: An object containing digital product/service details |
| **has_rma**                   | **Type**: `boolean`<br>**Description**: Has a return been authorized on this product/service? (“true”/”false”) |
| **id**                        | **Type**: `string`<br>**Description**: The merchant’s unique product/service identifier (ID).<br>**Required**: Yes |
| **is_upsell**                 | **Type**: `string`<br>**Description**: Was this product/service an upsell?  |
| **name**                      | **Type**: `string`<br>**Description**: Name of the product or service.      |
| **price**                     | **Type**: `string`<br>**Description**: Price of the product/service.        |
| **product_group**             | **Type**: `string`

## Get a list of chargebacks
Please note that max. 2500 records will be returned per API call. Paginate using page filter parameters until no records returned as shown in the example below.

/v2/clients/{merchantId}/chargebacks?page=1...

/v2/clients/{merchantId}/chargebacks?page=2...

Users are encouraged to refine their searches using request parameters (filter criteria) like Acquirer Reference Numbers (ARN), case numbers or date range.

verdict and verdict_history are available based on account access. If you would like to know more, please reach out to your Account Relationship Manager.
# Query Parameters
| Parameter        | Type     | Example                              | Description                                                                 |
|------------------|----------|--------------------------------------|-----------------------------------------------------------------------------|
| **arn**          | string   | `arn=98278274829743294525435`        | A 23-digit string integer that represents the Acquirer Reference Number (ARN) |
| **bin**          | string   | `bin=438493`                         | The first 6 digits on the credit card                                       |
| **case_no**      | string   | `case_no=EC2833`                     | The unique case number                                                      |
| **case_type**    | string   | `case_type=First Chargeback`         | Case Type. Enum: `"First Chargeback"`, `"Retrieval Request"`, `"Second Chargeback"` |
| **cc_type**      | string   | `cc_type=Visa`                       | Credit card type. Enum: `"Amex"`, `"Discover"`, `"MasterCard"`, `"Unknown"`, `"Visa"` |
| **currency**     | string   | `currency=USD`                       | Transaction currency                                                        |
| **date_column**  | string   | `date_column=date_trans`             | The value of this field is used to search for date ranges. Enum: `"date_created"`, `"date_post"`, `"date_trans"`, `"date_updated"` |
| **date_created** | string   | `date_created=2020-03-15`            | The date the chargeback was created in Chargebacks911                       |
| **date_due**     | string   | `date_due=2020-02-14`                | Chargeback due date                                                         |
| **date_post**    | string   | `date_post=2020-02-01`               | The date the chargeback was created by the card network/scheme              |
| **date_updated** | string   | `date_updated=2020-02-01`            | The last date the chargeback was updated                                    |
| **end_date**     | string   | `end_date=2020-05-04`                | The ending date for searching by date                                       |
| **id**           | integer  | `id=123456`                          | The unique identifier number for a chargeback                               |
| **last_four**    | string   | `last_four=5345`                     | The last 4 digits of the credit card related to the chargeback              |
| **limit**        | string   | `limit=20`                           | Only retrieve results from the page number specified                        |
| **mid**          | string   | `mid=21226255`                       | The merchant account number or ID for the chargeback                        |
| **page**         | string   | `page=4`                             | Limit the number of results returned per page                               |
| **reason_category** | string | `reason_category=Unauthorized transaction` | The reason category code provided by the card network/scheme as to the reason the chargeback was filed |
| **reason_code**  | string   | `reason_code=4837`                   | The reason code provided by the card network/scheme as to the reason the chargeback was filed |
| **start_date**   | string   | `start_date=2020-01-01`              | The beginning date for searching by date                                    |
| **status**       | any      | `status=new`                         | The current status of the chargeback. Enum: `"completed"`, `"expired"`, `"new"`, `"not_represented"` |


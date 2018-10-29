# Payment Gateway [Pre-employement Test] - Green Packet

## Production
POST data into https://green-packet-umar-checkout.herokuapp.com

Example input:
- `amount`: Floating number 0.05 and above (eg.: 32.99).
- `merchantId`: Encrypted string from MD5 encryption - `MD5(merchantId+salt)` (eg.: f2e4aa62a1f79f1a43a1fcbb86e0ebf2).
- `reference`: Any unique string from the merchant (eg.: T19037)

## Unit Test
To run the test, type `./vendor/bin/phpunit test/**`

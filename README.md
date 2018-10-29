# Payment Gateway [Pre-employement Test] - Green Packet

## Production
POST data into https://green-packet-umar-checkout.herokuapp.com

Example input:
- amount:
    type: float
    description: floating number 0.05 and above
    example: 32.99
- merchantId:
    type: string
    description: Encrypted string from MD5 encryption [MD5(merchantId+salt)]
    example: f2e4aa62a1f79f1a43a1fcbb86e0ebf2
- reference:
    type: string
    description: Any unique string from the merchant
    example: T19037

## Unit Test
To run the test, type `./vendor/bin/phpunit test/**`

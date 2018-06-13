# dealerkit-api
This library work with DealerKit API - https://dealerkit.co

`composer.phar require "fiamma06/dealerkit-api":"*"`

$token = 'XXXXXXX'; // Get from 
$client = new DealerKitApi($token);

### Basic usage
Before you start using API you need to register and go into your profile for getting api key. Next create basic object of DealerKitApi class
```
$token = '{your-personal-token}';
$client = new DealerKitApi($token);
```

### 1. VIN lookup
Basic usage for decoding vin:
```
$vin = '1N6AD07U46C418468';
$data = $client->getVinLookup($vin);
```

Success result:
```
{
  "success": true,
  "query": "1N6AD07U46C418468",
  "specification": {
    "year": "2006",
    "make": "Nissan",
    "model": "Frontier",
    "trim": "Nismo Crew Cab 2WD",
    "made_in": "UNITED STATES",
    "style": "CREW CAB PICKUP 4-DR",
    "engine": "4.0L V6 DOHC 24V",
    "transmission": "5-Speed Automatic",
    "drive_type": "RWD",
    "tank_size": "21.10",
    "city_mileage": "16",
    "highway_mileage": "20",
    "anti_brake_system": "4-Wheel ABS",
    "steering_type": "R&P",
    "standard_seating": "5",
    "optional_seating": "No data",
    "length": "205.50",
    "width": "72.80",
    "height": "70.10"
  }
}
```

### 2. Get usage statistics
```
$data = $client->getUsageStatistics();
```
Success result:
```
{
    "success": true,
    "decoded_total": 3121,
    "decoded_today": 127
}
```

### 3. Get information about subscribed billing plan
```
$data = $client->getBillingInfo();
```
Success result:
```
{
    "success": true,
    "billing_plan": {
        "name": "Mega",
        "price": 159.99,
        "price_req": 0.01,
        "price_currency": "USD"
    }
}
```

<p align="center">
  <img src="https://ecourier.com.bd/wp-content/themes/ecourier-2.0/images/logo.svg">
</p>

<h1 align="center">Ecourier parcel service php/laravel package</h1>
<p align="center" >
<img src="https://img.shields.io/packagist/dt/codeboxr/ecourier-courier">
<img src="https://img.shields.io/packagist/stars/codeboxr/ecourier-courier">
</p>

## Requirements

- PHP >=7.4
- Laravel >= 6

## Installation

```bash
composer require codeboxr/ecourier-courier
```

### vendor publish (config)
```bash
php artisan vendor:publish --provider="Codeboxr\\EcourierCourier\\EcourierServiceProvider"
```

After publish config file setup your credential. you can see this in your config directory ecourier.php file
```
"sandbox"    => env("ECOURIER_SANDBOX", false), // for sandbox mode use true
"app_key"    => env("ECOURIER_API_KEY", ""),
"app_secret" => env("ECOURIER_API_SECRET", ""),
"user_id"    => env("ECOURIER_USER_ID", "")
```

### Set .env configuration
```
ECOURIER_SANDBOX=true // for production mode use false
ECOURIER_API_KEY=""
ECOURIER_API_SECRET=""
ECOURIER_USER_ID=""
```

## Usage

### 1. Get ecourier delivery city list

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::area()->city();

```

### 2. Get ecourier delivery thana/upzilla list

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::area()->thana($cityName);

```

### 3. Get ecourier delivery postcode list

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::area()->postcode($cityName,$thanaName);

```

### 4. Get ecourier delivery postcode area list

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::area()->areaList($postcode);

```

### 5. Get ecourier branch list

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::area()->branch();

```

### 6. Delivery package list

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::order()->packageList();

```

### 7. Delivery package list

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::order()->packageList();

```

### 8. Create Parcel

```
use Codeboxr\EcourierCourier\Facade\Ecourier;

return Ecourier::order()->create([
    "ep_name"              => "", // eCommerce Partner (EP) Name
    "pick_contact_person"  => "", // Contact Person of provided ep
    "pick_district"        => "", // Pickup district name
    "pick_thana"           => "", // Pickup thana name
    "pick_hub"             => "", // Pickup branch id 
    "pick_union"           => "", // Pickup union 
    "pick_address"         => "", // Pickup address
    "pick_mobile"          => "", // Pickup person contact number
    "recipient_name"       => "", // Parcel receiver’s name
    "recipient_mobile"     => "", // Parcel receiver’s mobile number
    "recipient_district"   => "", // Parcel receiver’s district name
    "recipient_city"       => "", // Parcel receiver’s city name
    "recipient_area"       => "", // Parcel receiver’s area name
    "recipient_thana"      => "", // Parcel receiver’s thana name
    "recipient_union"      => "", // Parcel receiver’s union name
    "package_code"         => "", // Package code find in package API
    "recipient_address"    => "", // Parcel receiver’s full address
    "parcel_detail"        => "", // Parcel product or documents details
    "number_of_item"       => "", // Total quantity
    "product_price"        => "", // Receive amount from parcel receiver’s
    "payment_method"       => "", // Cash On Delivery – COD,Point of Sale – POS, Mobile Payment – MPAY, Card Payment – CCRD
    "ep_id"                => "", // Invoice Id 
    "actual_product_price" => "" // Parcel product actual price
]);

```


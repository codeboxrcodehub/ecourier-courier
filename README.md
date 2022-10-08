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
    "ep_name"              => "",
    "pick_contact_person"  => "",
    "pick_district"        => "",
    "pick_thana"           => "",
    "pick_hub"             => "",
    "pick_union"           => "",
    "pick_address"         => "",
    "pick_mobile"          => "",
    "recipient_name"       => "",
    "recipient_mobile"     => "",
    "recipient_district"   => "",
    "recipient_city"       => "",
    "recipient_area"       => "",
    "recipient_thana"      => "",
    "recipient_union"      => "",
    "package_code"         => "",
    "recipient_address"    => "",
    "parcel_detail"        => "",
    "number_of_item"       => "",
    "product_price"        => "",
    "payment_method"       => "",
    "ep_id"                => "",
    "actual_product_price" => ""
]);

```


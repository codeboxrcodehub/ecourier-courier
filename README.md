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

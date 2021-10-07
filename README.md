# BASIC AUTH LUYA MODULE

[![LUYA](https://img.shields.io/badge/Powered%20by-LUYA-brightgreen.svg)](https://luya.io)
![Tests](https://github.com/luyadev/luya-module-basicauth/workflows/Tests/badge.svg)
[![Total Downloads](https://poser.pugx.org/luyadev/luya-module-basicauth/downloads)](https://packagist.org/packages/luyadev/luya-module-basicauth)
[![Latest Stable Version](https://poser.pugx.org/luyadev/luya-module-basicauth/v/stable)](https://packagist.org/packages/luyadev/luya-module-basicauth)
[![Test Coverage](https://api.codeclimate.com/v1/badges/0431f013a2b0dff94265/test_coverage)](https://codeclimate.com/github/luyadev/luya-module-basicauth/test_coverage)

Adds the typical htaccess auth dialog before each request. This module is made as angular does have problems with basic htaccess authentifications in the administration area.

## Installation & Usage

Add the `luyadev/luya-module-basicauth` package to your composer config:

```sh
composer require luyadev/luya-module-basicauth
```

Add the module to your configuration in the modules section.

```php
'modules' => [
    //...
    'basicauth' => [
        'class' => 'luya\basicauth\Module',
        'password' => '<DEFINE_THE_PASSWORD_HERE>',
    ]
]
```

As the module checks the authentication status on before each request, you have to bootstrap the module inside the bootstrap section of your config:

```php
'bootstrap' => [
    'basicauth',
],
```

All frontend requests are now protected with your entered password from the config.

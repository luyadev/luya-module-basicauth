BASIC AUTH LUYA MODULE
====

Adds the typical htaccess auth dialog before each request. This module is made as angular does have problems with basic htaccess authentifications in the administration area.

Installation
----

composer require the luya basic auth module

```sh
composer require luyadev/luya-module-basicauth:^1.0@dev
```

add the module to your config

```php
'modules' => [
    'basicauth' => [
        'class' => 'luya\basicauth\Module',
        'password' => '<DEFINE_THE_PASSWORD_HERE>',
    ]
],
```

as this module takes care each before every request you have to bootstrap this module as in the boostrap section of your config:


```php
'bootstrap' => [
    'basicauth',
],
```

Now each request of your luya instance requires the entered password from your configuration files.

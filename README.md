BASIC AUTH LUYA MODULE
====

Adds the typical htaccess auth dialog before each request, except of the admin module is this is protected by user and password. This module is made as angular does have problems with basic htaccess authentifications.

Installation
----

composer require the luya basic auth module

```sh
composer require luyadev/luya-module-basicauth
```

add the module to your config

```php
'modules' => [
    'basicauth' => [
        'class' => 'basicauth\Module',
        'password' => '<DEFINE_THE_PASSWORD_HERE>',
    ]
],
```

as this module takes care each before every request you have to bootstrap this module as in the boostrap section of your config:


```php
'boostrap' => [
    'basicauth',
],
```

Now each request of your luya instance requres the entered password from your configuration files.
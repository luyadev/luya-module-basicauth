<?php

namespace luya\basicauth;

/**
 * Basic Auth Asset
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.1
 */
class BasicAuthAsset extends \luya\web\Asset
{
    public $sourcePath = '@basicauth/resources';
    
    public $css = [
        "basicauth.css",
    ];

    public $js = [
        "basicauth.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
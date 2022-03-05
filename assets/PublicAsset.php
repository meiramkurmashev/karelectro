<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/fontawesome-all.min.css',

        'public/css/main.css',
    ];
    public $js = [
            "public/js/jquery.min.js",
            "public/js/browser.min.js",
            "public/js/breakpoints.min.js",
            "public/js/util.js",
            "public/js/main.js",
    ];
    public $depends = [

    ];
}

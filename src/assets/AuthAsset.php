<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

namespace gearsoftware\auth\assets;

use yii\web\AssetBundle;

/**
 * AuthAsset is an asset bundle for [[gearsoftware\auth\widgets\AuthChoice]] widget.
 */
class AuthAsset extends AssetBundle
{
    public $sourcePath = '@vendor/gearsoftware/yii2-auth/assets/source';
    public $css = [
        'css/authstyle.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

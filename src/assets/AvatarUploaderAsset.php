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
 * AvatarUploaderAsset is an asset bundle for avatar upload widget.
 */
class AvatarUploaderAsset extends AssetBundle
{
    public $sourcePath = '@vendor/gearsoftware/yii2-auth/src/assets/source';
    public $css = ['css/avatar-uploader.css'];
    public $js = ['js/avatar-uploader.js'];
    public $depends = ['yii\web\JqueryAsset'];

}

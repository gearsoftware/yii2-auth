<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

namespace gearsoftware\auth\helpers;

use gearsoftware\models\User;
use Yii;
use yii\imagine\Image as Imagine;

class AvatarHelper
{

    /**
     *
     * @param \yii\web\UploadedFile $image
     * @return string
     */
    public static function saveAvatar($image)
    {
        $uploadPath = 'uploads/avatar';
        $extension = '.' . $image->extension;
        $fileName = 'avatar_' . Yii::$app->user->identity->id . '_' . time();
        $sourceFile = $uploadPath . '/' . $fileName . $extension;

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $image->saveAs($sourceFile);

        Imagine::$driver = [Imagine::DRIVER_GD2, Imagine::DRIVER_GMAGICK, Imagine::DRIVER_IMAGICK];
        $sizes = [
            'small' => 48,
            'medium ' => 96,
            'large' => 144,
        ];

        foreach ($sizes as $alias => $size) {
            $avatarUrl = "$uploadPath/$fileName-{$size}x{$size}$extension";
            Imagine::thumbnail($sourceFile, $size, $size)->save($avatarUrl);
            $avatars[$alias] = "/$avatarUrl";
            Yii::$app->user->identity->setAvatars($avatars);
        }

        return $avatars;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
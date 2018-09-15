<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

/**
 * @var $this yii\web\View
 * @var $user gearsoftware\models\User
 */
use yii\helpers\Html;

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/auth/default/reset-password-request', 'token' => $user->confirmation_token]);
?>

<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Follow the link below to reset your password:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
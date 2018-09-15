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
 * @var yii\web\View $this
 * @var gearsoftware\models\User $user
 */

$this->title = Yii::t('core/auth', 'E-mail confirmed');
?>
<div class="change-own-password-success">

    <div class="alert alert-success text-center">
        <?= Yii::t('core/auth', 'E-mail confirmed') ?> - <b><?= $user->email ?></b>
    </div>

</div>

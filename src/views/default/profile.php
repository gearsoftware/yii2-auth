<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use gearsoftware\assets\core\CoreAsset;
use gearsoftware\auth\assets\AvatarUploaderAsset;
use gearsoftware\auth\widgets\AuthChoice;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use gearsoftware\helpers\CoreHelper;

/**
 * @var yii\web\View $this
 * @var gearsoftware\auth\models\forms\SetEmailForm $model
 */
$this->title = Yii::t('core/auth', 'User Profile');
$this->params['breadcrumbs'][] = $this->title;

CoreAsset::register($this);
AvatarUploaderAsset::register($this);

$col12 = $this->context->module->gridColumns;
$col9 = (int) ($col12 * 3 / 4);
$col6 = (int) ($col12 / 2);
$col3 = (int) ($col12 / 4);
?>

<div class="profile-index">

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-<?= $col9 ?>">
            <span class="h4"><?= $this->title ?></span>
        </div>
        <div class="text-right col-md-<?= $col3 ?>">
            <?= Html::a(Yii::t('core/auth', 'Update Password'), ['/auth/default/update-password'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-<?= $col3 ?>">

            <div class="image-uploader">
                <?php
                ActiveForm::begin([
                    'method' => 'post',
                    'action' => Url::to(['/auth/default/upload-avatar']),
                    'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => 'off'],
                ])
                ?>

                <?php $avatar = Yii::$app->user->identity->getAvatar('large');?>
                <div class="image-preview" data-default-avatar="<?= $avatar ?>">
                    <img src="<?= $avatar ?>"/>
                </div>
                <div class="image-actions">
                    <span class="btn btn-primary btn-file"
                          title="<?= Yii::t('core/auth', 'Change profile picture') ?>" data-toggle="tooltip"
                          data-placement="left">
                        <i class="fa fa-folder-open fa-lg"></i>
                        <?= Html::fileInput('image', null, ['class' => 'image-input']) ?>
                    </span>

                    <?=
                    Html::submitButton('<i class="fa fa-save fa-lg"></i>', [
                        'class' => 'btn btn-primary image-submit',
                        'title' => Yii::t('core/auth', 'Save profile picture'),
                        'data-toggle' => 'tooltip',
                        'data-placement' => 'top',
                    ])
                    ?>

                    <span class="btn btn-primary image-remove"
                          data-action="<?= Url::to(['/auth/default/remove-avatar']) ?>"
                          title="<?= Yii::t('core/auth', 'Remove profile picture') ?>" data-toggle="tooltip"
                          data-placement="right">
                        <i class="fa fa-remove fa-lg"></i>
                    </span>
                </div>
                <div class="upload-status"></div>

                <?php ActiveForm::end() ?>
            </div>

            <div class="oauth-services">
                <div class="oauth-authorized-services">
                    <div class="label label-primary space-down"
                         title="<?= Yii::t('core/auth', 'Click to unlink service') ?>" data-toggle="tooltip"
                         data-placement="right">
                        <?= Yii::t('core/auth', 'Authorized Services') ?>:
                    </div>

                    <?=
                    AuthChoice::widget([
                        'baseAuthUrl' => ['/auth/default/unlink-oauth', 'language' => false],
                        'displayClients' => AuthChoice::DISPLAY_AUTHORIZED,
                        'popupMode' => false,
                        'shortView' => true,
                    ])
                    ?>
                </div>

                <div>
                    <div class="label label-primary space-down"
                         title="<?= Yii::t('core/auth', 'Click to connect with service') ?>" data-toggle="tooltip"
                         data-placement="right">
                        <?= Yii::t('core/auth', 'Non Authorized Services') ?>:
                    </div>

                    <?=
                    AuthChoice::widget([
                        'baseAuthUrl' => ['/auth/default/oauth', 'language' => false],
                        'displayClients' => AuthChoice::DISPLAY_NON_AUTHORIZED,
                        'popupMode' => false,
                        'shortView' => true,
                    ])
                    ?>
                </div>
            </div>

        </div>

        <?php
        $form = ActiveForm::begin([
                    'id' => 'user',
                    'validateOnBlur' => false,
                ])
        ?>

        <div class="col-md-<?= $col9 ?>">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'autofocus' => false]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'autofocus' => false]) ?>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-<?= $col6 ?>">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => 124]) ?>
                        </div>
                        <div class="col-md-<?= $col6 ?>">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => 124]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-<?= $col3 ?>">
                            <?= $form->field($model, 'gender')->dropDownList(gearsoftware\models\User::getGenderList()) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-<?= $col3 ?>">
                            <?= $form->field($model, 'birth_day')->textInput(['maxlength' => 2]) ?>
                        </div>
                        <div class="col-md-<?= $col3 ?>">
                            <?= $form->field($model, 'birth_month')->dropDownList(CoreHelper::getMonthsList()) ?>
                        </div>
                        <div class="col-md-<?= $col3 ?>">
                            <?= $form->field($model, 'birth_year')->textInput(['maxlength' => 4]) ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-<?= $col6 ?>">
                            <?= $form->field($model, 'skype')->textInput(['maxlength' => 64]) ?>
                        </div>
                        <div class="col-md-<?= $col6 ?>">
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => 24]) ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'info')->textarea(['maxlength' => 255]) ?>

                </div>
            </div>
            
            <?= Html::submitButton(Yii::t('core/auth', 'Save Profile'), ['class' => 'btn btn-primary']) ?>
 

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>



<?php
$confRemovingAuthMessage = Yii::t('core/auth', 'Are you sure you want to unlink this authorization?');
$confRemovingAvatarMessage = Yii::t('core/auth', 'Are you sure you want to delete your profile picture?');
$js = <<<JS
confRemovingAuthMessage = "{$confRemovingAuthMessage}";
confRemovingAvatarMessage = "{$confRemovingAvatarMessage}";
JS;

$this->registerJs($js, yii\web\View::POS_READY);
?>

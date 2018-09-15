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
use gearsoftware\widgets\nifty\LanguageSelector;
use gearsoftware\widgets\ActiveForm;
use gearsoftware\widgets\nifty\Notifications;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var gearsoftware\auth\models\forms\ResetPasswordForm $model
 */

CoreAsset::register($this);
$coreBaseUrl = $this->assetBundles[CoreAsset::class]->baseUrl;
$this->title = Yii::t('core/auth', 'Reset Password');
?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
<div class="alert-alert-warning text-center">
    <?= Yii::$app->session->getFlash('error') ?>
</div>
<?php endif; ?>

<div id="container" class="cls-container">
    <div id="bg-overlay"></div>
    <div class="cls-header">
        <div class="cls-brand">
            <a class="box-inline" href="<?= Yii::$app->homeUrl ;?>">
                <span class="brand-title"><?= Yii::$app->settings->get('general.title', 'Site Title', Yii::$app->language)?></span>
            </a>
        </div>
    </div>
    <div class="cls-content">
        <div class="cls-content-sm panel" id="panel">
            <div class="cls-language-selector">
                <ul class="nav">
					<?= LanguageSelector::widget(['display' => 'label', 'view' => 'lang-selector']); ?>
                </ul>
            </div>
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3"><?= $this->title ;?></h1>
                    <p><?= Yii::t('core/auth', 'Enter your email address to recover your password.') ;?></p>
                </div>
		        <?php $form = ActiveForm::begin([
			        'id' => 'reset-form',
			        'options' => ['autocomplete' => 'off', 'class' => 'text-left'],
			        'validateOnBlur' => false,
			        'fieldConfig' => [
				        'template' => "{input}\n{error}",
				        'errorOptions' => [
					        'tag' => 'label',
				        ],
			        ],
		        ]); ?>
                <div class="form-group has-feedback">
			        <?= $form->field($model, 'email',
				        [
					        'feedbackIcon' => [
						        'prefix' => '',
						        'default' => 'ti-email',
						        'success' => 'ti-email',
						        'error' => 'ti-email',
					        ],
				        ])->textInput(['autofocus' => true, 'maxlength' => 255, 'placeholder' => $model->getAttributeLabel('email'), 'autocomplete' => 'off']) ?>
                </div>
                <div class="form-group has-feedback">
			        <?= $form->field($model, 'captcha',
				        [
					        'feedbackIcon' => [
						        'prefix' => '',
						        'default' => 'ti-layers',
						        'success' => 'ti-layers',
						        'error' => 'ti-layers',
					        ],
				        ])->widget(Captcha::className(), [
				        'template' => '<div class="row"><div class="col-xs-5 col-sm-4">{image}</div><div class="col-xs-7 col-sm-8">{input}</div></div>',
				        'captchaAction' => ['/auth/captcha'],
				        'options' => [
					        'class' => 'form-control',
					        'placeholder' =>  $model->getAttributeLabel('captcha')
				        ]
			        ]) ?>
                </div>
		        <?= Html::submitButton(Yii::t('core/auth', 'Reset'), ['class' => 'btn btn-danger btn-lg btn-primary btn-block']) ?>
		        <?php ActiveForm::end() ?>
            </div>
            <div class="pad-all text-left">
		        <?= Html::a(Yii::t('core/auth', 'Back to login'), ['/auth/default/login'], ['class' => 'btn btn-default']); ?>
                <div class="media pad-top bord-top">
                    <div class="pull-right">
				        <?= gearsoftware\Core::powered() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Notifications::widget(); ?>
<?php $this->registerJs("bindBackgroundOverlay();"); ?>
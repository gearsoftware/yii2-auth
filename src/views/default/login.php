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
 * @var $model gearsoftware\auth\models\forms\LoginForm
 */

use gearsoftware\assets\core\CoreAsset;
use gearsoftware\widgets\ActiveForm;
use gearsoftware\widgets\nifty\LanguageSelector;
use gearsoftware\widgets\nifty\Notifications;
use yii\helpers\Html;

CoreAsset::register($this);
$coreBaseUrl = $this->assetBundles[CoreAsset::class]->baseUrl;
$this->title = Yii::t('core/auth', 'Account Login');
?>
<div id="container" class="cls-container">
    <div id="bg-overlay"></div>
    <div class="cls-header">
        <div class="cls-brand">
            <a class="box-inline" href="<?= Yii::$app->homeUrl ;?>">
                <!--<img alt="Logo" src="img/logo.png" class="brand-icon">-->
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
                    <p><?= Yii::t('core/auth', 'Sign In to your account') ;?></p>
                </div>
		        <?php $form = ActiveForm::begin([
			        'id' => 'login-form',
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
			        <?= $form->field($model, 'username',
				        [
					        'feedbackIcon' => [
						        'prefix' => '',
						        'default' => 'ti-user',
						        'success' => 'ti-user',
						        'error' => 'ti-user',
					        ],
				        ])->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('username'), 'autocomplete' => 'off']) ?>
                </div>
                <div class="form-group has-feedback">
			        <?= $form->field($model, 'password',
				        [
					        'feedbackIcon' => [
						        'prefix' => '',
						        'default' => 'ti-lock',
						        'success' => 'ti-lock',
						        'error' => 'ti-lock',
					        ],
				        ])->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'autocomplete' => 'off']) ?>
                </div>
                <div class="checkbox text-left">
			        <?= $form->field($model, 'rememberMe',
				        [
					        'errorOptions' => [
						        'tag' => 'span',
						        'class' => 'hide',
					        ],
				        ])->checkbox([
				        'class' => 'magic-checkbox',
				        'labelOptions' => [
					        'id' => 'loginform-label-rememberme',
				        ],
			        ]); ?>
                </div>
		        <?= Html::submitButton(Yii::t('core/auth', 'Sign In'), ['class' => 'btn btn-primary btn-lg btn-block']) ?>
		        <?php ActiveForm::end() ?>
            </div>
            <div class="pad-all text-left">
		        <?= Html::a(Yii::t('core/auth', 'Forgot password?'), ['/auth/default/reset-password'], ['class' => 'btn btn-default']); ?>
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

<?php
$js = <<<JS
bindBackgroundOverlay();
$('#loginform-label-rememberme').attr('for', 'loginform-rememberme');
JS;
$this->registerJs($js);
?>
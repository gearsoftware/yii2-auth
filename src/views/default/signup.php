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
use gearsoftware\widgets\ActiveForm;
use gearsoftware\widgets\nifty\LanguageSelector;
use gearsoftware\widgets\nifty\Notifications;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 * @var \gearsoftware\auth\models\forms\SignupForm $model
 */

CoreAsset::register($this);
$coreBaseUrl = $this->assetBundles[CoreAsset::class]->baseUrl;
$this->title = Yii::t('core/auth', 'Signup');
?>
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
        <div class="cls-content-lg panel" id="panel">
            <div class="cls-language-selector">
                <ul class="nav">
					<?= LanguageSelector::widget(['display' => 'label', 'view' => 'lang-selector']); ?>
                </ul>
            </div>
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3"><?= Yii::t('core/auth', 'Create a New Account'); ?></h1>
                    <p><?= Yii::t('core/auth', 'Come join the community! Let\'s set up your account.'); ?></p>
                </div>
		        <?php $form = ActiveForm::begin([
			        'id' => 'signup-form',
			        'options' => ['autocomplete' => 'off', 'class' => 'text-left'],
			        'validateOnBlur' => false,
			        'fieldConfig' => [
				        'template' => "{input}\n{error}",
				        'errorOptions' => [
					        'tag' => 'label',
				        ],
			        ],
		        ]); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group has-feedback">
				            <?= $form->field($model, 'username',
					            [
						            'feedbackIcon' => [
							            'prefix' => '',
							            'default' => 'ti-user',
							            'success' => 'ti-user',
							            'error' => 'ti-user',
						            ],
					            ])->textInput(['autofocus' => true, 'maxlength' => 50, 'placeholder' => $model->getAttributeLabel('username'), 'autocomplete' => 'off']) ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group has-feedback">
		                    <?= $form->field($model, 'email',
			                    [
				                    'feedbackIcon' => [
					                    'prefix' => '',
					                    'default' => 'ti-email',
					                    'success' => 'ti-email',
					                    'error' => 'ti-email',
				                    ],
			                    ])->textInput(['maxlength' => 255, 'placeholder' => $model->getAttributeLabel('email')]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group has-feedback">
			                <?= $form->field($model, 'password',
				                [
					                'feedbackIcon' => [
						                'prefix' => '',
						                'default' => 'ti-lock',
						                'success' => 'ti-lock',
						                'error' => 'ti-lock',
					                ],
				                ])->passwordInput(['maxlength' => 255, 'placeholder' => $model->getAttributeLabel('password')]) ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group has-feedback">
			                <?= $form->field($model, 'repeat_password',
				                [
					                'feedbackIcon' => [
						                'prefix' => '',
						                'default' => 'ti-unlock',
						                'success' => 'ti-unlock',
						                'error' => 'ti-unlock',
					                ],
				                ])->passwordInput(['maxlength' => 255, 'placeholder' => $model->getAttributeLabel('repeat_password')]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
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
				                'template' => '<div class="row"><div class="col-xs-5">{image}</div><div class="col-xs-7">{input}</div></div>',
				                'captchaAction' => ['/auth/captcha'],
				                'options' => [
					                'class' => 'form-control',
					                'placeholder' =>  $model->getAttributeLabel('captcha')
				                ]
			                ]) ?>
                        </div>
                    </div>
                </div>
                <div class="checkbox text-left">
		            <?php $link = Html::a(Yii::t('core/auth', 'Terms and Conditions'), ['/auth/default/terms-and-conditions'], ['class' => 'btn-link text-bold']); ?>
		            <?= $form->field($model, 'accept',
			            [
				            'errorOptions' => [
					            'tag' => 'span',
				            ],
			            ])->checkbox([
			            'class' => 'magic-checkbox',
			            'label' => Yii::t('core/auth', 'I agree with the') .' '. $link,
			            'labelOptions' => [
				            'id' => 'signup-label-accept',
			            ],
		            ]); ?>
                </div>
		        <?= Html::submitButton(Yii::t('core/auth', 'Sign In'), ['class' => 'btn btn-primary btn-lg btn-block']) ?>
		        <?php ActiveForm::end() ?>
            </div>
            <div class="pad-all">
                <?= Yii::t('core/auth', 'Already have an account?'); ?>
                <?= Html::a(Yii::t('core/auth', 'Sign In'), ['/auth/default/login'], ['class' => 'btn-link mar-rgt text-bold']); ?>
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
$('#signup-label-accept').attr('for', 'signupform-accept');
JS;
$this->registerJs($js);
?>
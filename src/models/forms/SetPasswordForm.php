<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

namespace gearsoftware\auth\models\forms;

use Yii;
use yii\base\Model;

class SetPasswordForm extends Model
{

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $repeat_password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'repeat_password'], 'required'],
            [['password', 'repeat_password'], 'string', 'max' => 255],
            [['password'], 'string', 'min' => 6],
            [['password', 'repeat_password'], 'trim'],
            ['repeat_password', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => Yii::t('core/auth', 'Password'),
            'repeat_password' => Yii::t('core/auth', 'Repeat password'),
        ];
    }

}
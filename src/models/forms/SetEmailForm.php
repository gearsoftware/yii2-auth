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

use gearsoftware\models\User;
use Yii;
use yii\base\Model;

class SetEmailForm extends Model
{

    /**
     * @var string
     */
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'validateEmailUnique'],
        ];
    }

    /**
     * Check that there is no such E-mail in the system
     */
    public function validateEmailUnique()
    {

        if ($this->email) {
            $exists = User::findOne([
                'email' => $this->email,
            ]);

            if ($exists) {
                $this->addError('email', Yii::t('core/auth', 'This E-mail already exists'));
            }
        }
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
        ];
    }

}
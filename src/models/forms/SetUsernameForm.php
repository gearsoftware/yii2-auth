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

class SetUsernameForm extends Model
{

    /**
     * @var string
     */
    public $username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'trim'],
            ['username', 'validateUsernameUnique'],
        ];
    }

    /**
     * Check that there is no such username in the system
     */
    public function validateUsernameUnique()
    {
        if ($this->username) {
            $exists = User::findOne([
                'username' => $this->username,
            ]);

            if ($exists) {
                $this->addError('username', Yii::t('core/auth', 'Login has been taken'));
            }
        }
    }

}
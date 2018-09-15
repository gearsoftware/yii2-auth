<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

namespace gearsoftware\auth;

use Yii;
use yii\base\Exception;

/**
 * @author José Peña <joepa37@gmail.com>
 */
class AuthAction extends \yii\authclient\AuthAction
{

    /**
     * Runs the action.
     */
    public function run()
    {
        try {
            return parent::run();
        } catch (Exception $ex) {
            Yii::$app->session->setFlash('danger', $ex->getMessage());
            //Yii::$app->session->setFlash('error', Yii::t('core/auth', "Authentication error occured."));
            return $this->redirectCancel();
        }
    }
}
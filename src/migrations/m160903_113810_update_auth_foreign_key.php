<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use yii\db\Migration;

class m160903_113810_update_auth_foreign_key extends Migration
{

    const TABLE_NAME = '{{%auth}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->dropForeignKey('fk_auth_user', self::TABLE_NAME);
        $this->addForeignKey('fk_auth_user', self::TABLE_NAME, 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_user', self::TABLE_NAME);
    }

}

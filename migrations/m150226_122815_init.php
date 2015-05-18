<?php
 
/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

use yii\db\Schema;
use yii\db\Migration;

class m150226_122815_init extends Migration {

	public function safeUp() {
		$this->createTable('{{%mata_keyvalue}}', [
			'Key' => 'VARCHAR(255) NOT NULL',
			'Value' => Schema::TYPE_TEXT . ' NOT NULL'
			]);

		$this->addPrimaryKey("PK_Key", "{{%mata_keyvalue}}", "Key");
	}

	public function safeDown() {
		$this->dropTable('{{%mata_keyvalue}}');
	}
}
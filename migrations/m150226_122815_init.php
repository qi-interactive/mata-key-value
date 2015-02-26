<?php

/*
 * This file is part of the mata project.
 *
 * (c) mata project <http://github.com/qi-interactive/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use yii\db\Schema;
use yii\db\Migration;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class m150226_122815_init extends Migration {

	public function up() {
		$this->createTable('{{%mata_keyvalue}}', [
			'Key' => 'VARCHAR(255) NOT NULL',
			'Value' => Schema::TYPE_TEXT . ' NOT NULL'
			]);

		$this->addPrimaryKey("PK_Key", "{{%mata_keyvalue}}", "Key");
	}

	public function down() {
		$this->dropTable('{{%mata_keyvalue}}');
	}
}
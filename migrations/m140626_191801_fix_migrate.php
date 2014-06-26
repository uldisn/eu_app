<?php

class m140626_191801_fix_migrate extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
            UPDATE 
              migration 
            SET
              module = 'd2fixr' 
            WHERE module = 'd2finv' 
              AND `version` IN (
                'm140605_110700_create_table_fret',
                'm140605_110900_create_table_fixr',
                'm140608_213800_create_table_frep',
                'm140608_214200_alter_table_fixr',
                'm140608_214300_create_table_fped',
                'm140608_214400_create_table_fpeo'
              )
            


        ");
	}

	/**
	 * Drops the table
	 */
	public function down()
	{
		$this->execute("
            TRUNCATE TABLE `vfue_fuel`;
        ");
	}

	/**
	 * Creates initial version of the table in a transaction-safe way.
	 * Uses $this->up to not duplicate code.
	 */
	public function safeUp()
	{
		$this->up();
	}

	/**
	 * Drops the table in a transaction-safe way.
	 * Uses $this->down to not duplicate code.
	 */
	public function safeDown()
	{
		$this->down();
	}
}

<?php

class m131105_150300_bprd_alter extends CDbMigration {

    /**
     * Creates initial version of the audit trail table
     */
    public function up() {

        $sSql = "
            ALTER TABLE `bprd_period`
              ADD COLUMN `bprd_fcrn_date` DATE NULL AFTER `bprd_data_json`,
              ADD COLUMN `bprd_series` VARCHAR(10) NULL AFTER `bprd_fcrn_date`,
              ADD COLUMN `bprd_start_number` INT NULL AFTER `bprd_series`;
            ";
        $result = Yii::app()->db->createCommand($sSql)->query();
        
       
    }

    /**
     * Drops the audit trail table
     */
    public function down() {

    }

    /**
     * Creates initial version of the audit trail table in a transaction-safe way.
     * Uses $this->up to not duplicate code.
     */
    public function safeUp() {
        $this->up();
    }

    /**
     * Drops the audit trail table in a transaction-safe way.
     * Uses $this->down to not duplicate code.
     */
    public function safeDown() {
        $this->down();
    }

}
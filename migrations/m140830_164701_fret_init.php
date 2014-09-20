<?php

class m140830_164701_fret_init extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
        truncate table fdm3_dimension3;    
        truncate table fdm2_dimension2;    
        truncate table fret_ref_type;    
        insert  into `fret_ref_type`(`fret_id`,`fret_model`,`fret_model_fixr_id_field`,`fret_modelpk_field`,`fret_label`,`fret_finv_type`,`fret_controller_action`,`fret_view_form`,`fret_period_fret_id_list`) values (1,'VtdcTruckDoc','vtdc_fixr_id','vtdc_id','Vilcēja dokumenti','in','FixrFiitXRef/popupPosition','VtdcTruckDoc','5,6'),(2,'VtrsTruckService','vtrs_fixr_id','vtrs_id','Vilcēja uzturēšana','in','FixrFiitXRef/popupPosition','vtrsTruckService',NULL),(3,'VtlsTrailerService','vtls_fixr_id','vtls_id','Piekabes uzturēšana','in','FixrFiitXRef/popupPosition','vtlsTrailerService',NULL),(4,'VtrdTrailerDoc','vtrd_fixr_id','vtrd_id','Piekabes dokumenti','in','FixrFiitXRef/popupPosition','vtrdTrailerDoc',NULL),(5,'FpedPeriodDate','fped_fixr_id','fped_id','Laiks','in','FixrFiitXRef/popupPeriod','fpedPeriodDate','2,3,4'),(6,'FpeoPeriodOdo','fpeo_fixr_id','fpeo_id','Odometrs','in','FixrFiitXRef/popupPeriod','fpeoPeriodOdo','1,2,3,4'),(7,'VexpExpenses','vexp_fixr_id','vexp_id','Reisa izdevumi','in','FixrFiitXRef/popupPosition','vexpExpenses','8'),(8,'VexpExpenses','vexp_fixr_id','vexp_id','Reiss','in','FixrFiitXRef/popupPeriod','vexpExpensesVoyage','7'),(9,'VfufFuelFinv','vfuf_fixr_id','vfuf_id','Reisa degviela','in','FixrFiitXRef/popupPosition','vfufFuel',NULL),(10,'VfufFuelFinv','vfuf_fixr_id','vfuf_id','Reiss','in','FixrFiitXRef/popupPeriod','vfufFuelVoyage','9'),(11,'FddaDimData','fdda_fixr_id','fdda_id','Birojs','in','FixrFiitXRef/popupPosition','FddaDimData',NULL),(12,'FddaDimData','fdda_fixr_id','fdda_id','Laiks','in','FixrFiitXRef/popupPeriod','FddaDimDataPeriod','11');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('1','11',NULL,'Telpas','Telpas','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('3','11',NULL,'Sakari','Sakari','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('4','11',NULL,'Biroja Teh','Biroja Tehnika','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('5','11',NULL,'Kancelejas','Kancelejas preces','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('6','11',NULL,'Grm. un Ju','Grm. un Jurid. pakalp','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('7','11',NULL,'Saimn. pre','Saimn. preces','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('8','11',NULL,'Komandējum','Komandējumi','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('9','11',NULL,'Dzeramais ','Dzeramais ūdens','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('10','11',NULL,'Cits','Cits','0');
        insert into `fdm2_dimension2` (`fdm2_id`, `fdm2_fret_id`, `fdm2_ref_id`, `fdm2_code`, `fdm2_name`, `fdm2_hidden`) values('11','11',NULL,'IT','IT','0');

        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('1','11',NULL,'1','Noma','Noma','0');
        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('2','11',NULL,'1','AutStav','AutStav','0');
        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('3','11',NULL,'1','Komun','Komun','0');
        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('4','11',NULL,'1','Citi','Citi','0');
        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('5','11',NULL,'1','Apsaimniek','Apsaimniekošana','0');
        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('6','11',NULL,'3','Fiksētie','Fiksētie','0');
        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('7','11',NULL,'3','Mobilie','Mobilie','0');
        insert into `fdm3_dimension3` (`fdm3_id`, `fdm3_fret_id`, `fdm3_ref_id`, `fdm3_fdm2_id`, `fdm3_code`, `fdm3_name`, `fdm3_hidden`) values('8','11',NULL,'3','Citi','Citi','0');        
        
        

            


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

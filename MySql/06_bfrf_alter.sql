ALTER TABLE `bfrf_fuel_refill`   
  ADD COLUMN `bfrf_fiit_id` INT UNSIGNED NULL  COMMENT 'links uz atskaiti' AFTER `bfrf_type`,
  ADD COLUMN `bfrf_record_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP   NOT NULL AFTER `bfrf_fiit_id`;

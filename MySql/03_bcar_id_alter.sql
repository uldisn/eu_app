ALTER TABLE `bcar_id`   
  DROP COLUMN `bcar_start_date`, 
  DROP COLUMN `bcar_end_date`, 
  ADD COLUMN `bcar_status` ENUM('ACTIVE','INACTIVE') DEFAULT 'ACTIVE'   NOT NULL AFTER `bcar_reg_number`;

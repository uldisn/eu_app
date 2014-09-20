ALTER TABLE `ccuc_user_company`   
  ADD COLUMN `ccuc_first_name` VARCHAR(255) CHARSET utf8 NULL AFTER `ccuc_user_id`,
  ADD COLUMN `cucc_last_name` VARCHAR(255) CHARSET utf8 NULL AFTER `ccuc_first_name`,
  ADD COLUMN `ccuc_status` ENUM('ACTIVE','DISABLED') NULL AFTER `cucc_last_name`;

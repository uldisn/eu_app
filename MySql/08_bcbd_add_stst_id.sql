ALTER TABLE `bcbd_company_branch_day` ADD COLUMN `bcbd_stst_id` TINYINT UNSIGNED DEFAULT 1 NOT NULL COMMENT 'statuss' AFTER `bcbd_notes`; 
ALTER TABLE `bcbd_company_branch_day` ADD FOREIGN KEY (`bcbd_stst_id`) REFERENCES `p3_02`.`stst_state`(`stst_id`); 

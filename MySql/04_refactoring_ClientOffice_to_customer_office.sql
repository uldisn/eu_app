INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES ('CustomertOffice', '2', 'CustomertOffice', NULL, 'N;'); 
UPDATE `authassignment` SET `itemname` = 'CustomertOffice' WHERE `itemname` = 'ClientOffice' AND `userid` = '2' AND `bizrule` IS NULL AND `data` = 'N;'; 
DELETE FROM `p3_02`.`authitem` WHERE `name` = 'ClientOffice'; 
Alter table air_drop Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table eco_system  Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table funding_round  Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table hot_news Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table ido_ieo Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table killer_project Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table new_listing Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table new_project Add COLUMN share TEXT NULL DEFAULT NULL;
Alter table unusual_activity Add COLUMN share TEXT NULL DEFAULT NULL;

ALTER TABLE `users` ADD `reffer_code` VARCHAR(10) NULL DEFAULT NULL AFTER `remember_token`;
ALTER TABLE `users` ADD `reffered_by` INT NULL DEFAULT NULL AFTER `reffer_code`, ADD `credits` INT NULL DEFAULT '0' AFTER `reffered_by`;

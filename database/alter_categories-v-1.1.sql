ALTER TABLE `categories`
	ADD COLUMN `active` INT NULL DEFAULT '0' AFTER `name`;
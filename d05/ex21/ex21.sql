SELECT MD5(CONCAT(REPLACE(`phone_number`, "7", "9"), '42')) AS `ft5`
FROM `distrib`
WHERE `distrib`.`id_distrib` = 84;
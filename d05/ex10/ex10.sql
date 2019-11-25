SELECT `film`.`title` AS 'Title', `film`.`summary` AS 'Summary', `film`.`prod_year` FROM film
INNER JOIN genre ON `film`.`id_genre` = `genre`.`id_genre`
WHERE `genre`.`name` LIKE 'erotic'
ORDER BY `film`.`prod_year` DESC;
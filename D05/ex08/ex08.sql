SELECT `last_name`, `first_name`, DATE(`birthdate`) as birthdate
FROM user_card
WHERE EXTRACT(YEAR FROM birthdate) = 1989
ORDER BY `last_name`;
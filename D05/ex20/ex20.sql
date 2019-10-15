SELECT 
    IFNULL(F.`id_genre`, "id_genre") AS "id_genre",
    G.`name` AS "name_genre",
    IFNULL(D.`id_distrib`, "id_distib") AS "id_distrib",
    D.`name` AS "name_distrib",
    IFNULL(F.`title`, "title") AS "title_film"
FROM film as F
LEFT JOIN genre as G
ON F.id_genre = G.id_genre
LEFT JOIN distrib as D
ON F.id_distrib = D.id_distrib
WHERE F.`id_genre` BETWEEN 4 AND 8;
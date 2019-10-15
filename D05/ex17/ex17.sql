SELECT
    COUNT(name) AS "nb_susc",
    FLOOR(AVG(PRICE)) AS "av_susc",
    MOD(SUM(`duration_sub`), 42) AS "ft"
FROM subscription;

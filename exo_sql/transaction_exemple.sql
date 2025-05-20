START TRANSACTION;

SELECT nomfou FROM fournis WHERE numfou=120;

UPDATE fournis  SET nomfou= 'test' WHERE numfou=120;

SELECT nomfou FROM fournis WHERE numfou=120;

COMMIT;



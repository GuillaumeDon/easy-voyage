CREATE USER 'superadmin'@'localhost' IDENTIFIED BY 'mdp1234';
GRANT ALL PRIVILEGES ON bdd_easy_voyage.* TO 'superadmin'@'localhost';
FLUSH PRIVILEGES;




	CREATE USER ‘adminEV01’@'localhost' IDENTIFIED BY ‘zrbzbf848TGINZRnnezvz’;
GRANT
 SELECT, INSERT, UPDATE, DELETE, EXEC 
ON bdd_easy_voyage.* 
TO ‘adminEV01’@'localhost';
FLUSH PRIVILEGES;

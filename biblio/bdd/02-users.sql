CREATE USER 'superadmin'@'localhost' IDENTIFIED BY 'mdp1234';
GRANT ALL PRIVILEGES ON bdd_easy_voyage.* TO 'superadmin'@'localhost';
FLUSH PRIVILEGES;




	CREATE USER ‘admin’@'localhost' IDENTIFIED BY ‘zrbzbfnnezvz’;
GRANT
 SELECT, INSERT, UPDATE, DELETE, EXEC 
ON bdd_easy_voyage.* 
TO ‘admin’@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'superadmin'@'localhost' IDENTIFIED BY 'mdp1234';
GRANT ALL PRIVILEGES ON bdd_easy_voyage.* TO 'superadmin'@'localhost';
FLUSH PRIVILEGES;


-- private $username = "superadmin";
--     private $password = "3m35353dpSe3curi_53353seLvlElite40675";
--     private $conn;
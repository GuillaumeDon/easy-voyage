--------------------Partie gestion des voyages------------------------------

-- Table des mois de départ--
CREATE TABLE departure (
  id INT PRIMARY KEY AUTO_INCREMENT,
  departure_label VARCHAR(50) NOT NULL,
  departure_title VARCHAR(255) NOT NULL,
  departure_description TEXT NOT NULL,
  picture_header VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Table des catégories
CREATE TABLE category (
  id INT PRIMARY KEY AUTO_INCREMENT,
  category_label VARCHAR(50) NOT NULL,
  category_title VARCHAR(255) NOT NULL,
  category_description TEXT NOT NULL,
  picture_header VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des continents
CREATE TABLE continent (
  id INT PRIMARY KEY AUTO_INCREMENT,
  continent_label VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des pays
CREATE TABLE country (
  id INT PRIMARY KEY AUTO_INCREMENT,
  country_label VARCHAR(50) NOT NULL,
  country_title VARCHAR(255) NOT NULL,
  country_description TEXT NOT NULL,
  continent_id INT NOT NULL,
  picture_header VARCHAR(255) NOT NULL,
  FOREIGN KEY (continent_id) REFERENCES continent(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des voyages
CREATE TABLE journey (
  id INT PRIMARY KEY AUTO_INCREMENT,
  journey_label VARCHAR(50) NOT NULL,
  journey_title VARCHAR(255) NOT NULL,
  journey_description TEXT NOT NULL,
  journey_duration VARCHAR(255) NOT NULL,
  journey_price INT NOT NULL,
  hostel_title VARCHAR(255) NOT NULL,
  hostel_description TEXT NOT NULL,
  hostel_picture VARCHAR(255) NOT NULL,
  circuit_title VARCHAR(255) NOT NULL,
  circuit_description TEXT NOT NULL,
  circuit_picture VARCHAR(255) NOT NULL,
  formalities TEXT NOT NULL,
  departure_id INT NOT NULL,
  category_id INT NOT NULL,
  country_id INT NOT NULL,
  FOREIGN KEY (departure_id) REFERENCES departure(id),
  FOREIGN KEY (category_id) REFERENCES category(id),
  FOREIGN KEY (country_id) REFERENCES country(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Table des photos des voyages
CREATE TABLE pictures (
  id INT PRIMARY KEY AUTO_INCREMENT,
  journey_id INT NOT NULL,
  picture VARCHAR(255) NOT NULL,
  FOREIGN KEY (journey_id) REFERENCES journey(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-------------------------Gestion des profils et messages-------------------------

--Table des rôles
CREATE TABLE role (
  id INT AUTO_INCREMENT PRIMARY KEY,
  label VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--Table des utilisateurs
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(255),
  lastname VARCHAR(255),
  pass VARCHAR(255),
  email VARCHAR(255),
  role_id INT,
  FOREIGN KEY (role_id) REFERENCES role(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--Table des messages
CREATE TABLE message (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  title VARCHAR(255),
  content TEXT,
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




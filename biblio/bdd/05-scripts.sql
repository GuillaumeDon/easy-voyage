##Procédures stockés

###Pour les USERS

CREATE PROCEDURE get_all_users()
BEGIN
    SELECT * FROM users;
END;


##Pour les MESSAGES

DELIMITER //
CREATE PROCEDURE get_all_messages_with_user_details()
BEGIN
  SELECT message.id, message.title, message.content, message.date_creation, users.firstname, users.lastname, users.email
  FROM message
  INNER JOIN users ON message.user_id = users.id;
END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE get_message_by_id(IN messageId INT)
BEGIN
  SELECT users.firstname, users.lastname, users.email, message.title, message.content, message.date_creation
  FROM message
  JOIN users ON message.user_id = users.id
  WHERE message.id = messageId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE delete_message_by_id(IN messageId INT)
BEGIN
  DELETE FROM message WHERE id = messageId;
END //
DELIMITER ;


##Pour les voyages

CREATE PROCEDURE get_all_journeys_with_labels()
BEGIN
    SELECT
        j.id,
        j.journey_label,
        j.journey_title,
        j.journey_description,
        j.journey_duration,
        j.journey_price,
        j.hostel_title,
        j.hostel_description,
        j.hostel_picture,
        j.circuit_title,
        j.circuit_description,
        j.circuit_picture,
        j.formalities,
        c.country_label AS country,
        d.departure_label AS departure,
        cat.category_label AS category
    FROM journey j
    JOIN country c ON j.country_id = c.id
    JOIN departure d ON j.departure_id = d.id
    JOIN category cat ON j.category_id = cat.id;
END;



DELIMITER //
CREATE PROCEDURE get_journey_by_id(IN journeyId INT)
BEGIN
  SELECT * FROM journey WHERE id = journeyId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE delete_journey_by_id(IN journeyId INT)
BEGIN
  -- Supprime les images associées au voyage
  DELETE FROM pictures WHERE journey_id = journeyId;

  -- Supprime le voyage
  DELETE FROM journey WHERE id = journeyId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE select_random_image()
BEGIN
  DECLARE total_rows INT DEFAULT 0;

  SELECT COUNT(*) INTO total_rows FROM pictures;

  IF total_rows > 0 THEN
    SELECT * FROM pictures
    ORDER BY RAND()
    LIMIT 1;
  ELSE
    SELECT NULL AS id, NULL AS journey_id, NULL AS picture;
  END IF;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE insert_journey(IN journey_label VARCHAR(50), IN journey_title VARCHAR(255), IN journey_description TEXT, IN journey_duration VARCHAR(255), IN journey_price INT, IN hostel_title VARCHAR(255), IN hostel_description TEXT, IN hostel_picture VARCHAR(255), IN circuit_title VARCHAR(255), IN circuit_description TEXT, IN circuit_picture VARCHAR(255), IN formalities TEXT, IN departure_id INT, IN category_id INT, IN country_id INT)
BEGIN
  INSERT INTO journey (journey_label, journey_title, journey_description, journey_duration, journey_price, hostel_title, hostel_description, hostel_picture, circuit_title, circuit_description, circuit_picture, formalities, departure_id, category_id, country_id)
  VALUES (journey_label, journey_title, journey_description, journey_duration, journey_price, hostel_title, hostel_description, hostel_picture, circuit_title, circuit_description, circuit_picture, formalities, departure_id, category_id, country_id);
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE update_journey(IN id INT, IN journey_label VARCHAR(50), IN journey_title VARCHAR(255), IN journey_description TEXT, IN journey_duration VARCHAR(255), IN journey_price INT, IN hostel_title VARCHAR(255), IN hostel_description TEXT, IN hostel_picture VARCHAR(255), IN circuit_title VARCHAR(255), IN circuit_description TEXT, IN circuit_picture VARCHAR(255), IN formalities TEXT, IN departure_id INT, IN category_id INT, IN country_id INT)
BEGIN
  UPDATE journey SET journey_label = journey_label, journey_title = journey_title, journey_description = journey_description, journey_duration = journey_duration, journey_price = journey_price, hostel_title = hostel_title, hostel_description = hostel_description, hostel_picture = hostel_picture, circuit_title = circuit_title, circuit_description = circuit_description, circuit_picture = circuit_picture, formalities = formalities, departure_id = departure_id, category_id = category_id, country_id = country_id WHERE id = id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE add_picture(IN journey_id INT, IN picture_path VARCHAR(255))
BEGIN
  INSERT INTO pictures (journey_id, picture) VALUES (journey_id, picture_path);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE get_all_departures()
BEGIN
  SELECT * FROM departure;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE get_all_categories()
BEGIN
  SELECT * FROM category;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE get_all_countries()
BEGIN
  SELECT * FROM country;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE RegisterUser(IN p_firstname VARCHAR(255), IN p_lastname VARCHAR(255), IN p_email VARCHAR(255), IN p_password VARCHAR(255))
BEGIN
    INSERT INTO users (firstname, lastname, email, pass, role_id) VALUES (p_firstname, p_lastname, p_email, p_password, 2);
END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE GetUserByEmail(IN p_email VARCHAR(255))
BEGIN
    SELECT * FROM users WHERE email = p_email;
END //
DELIMITER ;


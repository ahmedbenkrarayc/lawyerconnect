/*CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT,
	fname VARCHAR(50) NOT NULL,
	lname VARCHAR(50) NOT NULL,
	email VARCHAR(50) UNIQUE,
	password VARCHAR(50) NOT NULL,
	phone VARCHAR(15),
	photo TEXT,
	role ENUM('client', 'lawyer'),
	created_at DATETIME DEFAULT NOW(),
	updated_at DATETIME DEFAULT NOW()
);

CREATE TABLE lawyer_details(
	id_lawyer INT PRIMARY KEY,
	spcialite VARCHAR(50),
	experience INT,
	biographie TEXT,
	country VARCHAR(50),
	city VARCHAR(50),
	address TEXT,
	casecount INT,
	hourly_rate FLOAT,
	created_at DATETIME DEFAULT NOW(),
	updated_at DATETIME DEFAULT NOW(),
	FOREIGN KEY(id_lawyer) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE reservation(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_client INT NOT NULL,
	id_lawyer INT NOT NULL,
	date_reservation DATE NOT NULL,
	status ENUM('confirmed', 'waiting', 'canceled'),
	created_at DATETIME DEFAULT NOW(),
	updated_at DATETIME DEFAULT NOW()
);

CREATE TABLE review(
	id_reservation INT PRIMARY KEY,
	rating INT NOT NULL,
	message TEXT,
	created_at DATETIME DEFAULT NOW(),
	FOREIGN KEY(id_reservation) REFERENCES reservation(id) ON DELETE CASCADE
);

CREATE TABLE unavailable(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_lawyer INT NOT NULL,
	date_debut DATE NOT NULL,
	date_fin DATE NOT NULL,
	FOREIGN KEY(id_lawyer) REFERENCES user(id) ON DELETE CASCADE
);

INSERT INTO user (fname, lname, email, password, phone, photo, role)
VALUES 
('John', 'Doe', 'john.doe@example.com', '32aa2fd87338e241978c48ab319641bc', '1234567890', 'john_photo.jpg', 'lawyer'),
('Jane', 'Smith', 'ahmed.benkrara11@gmail.com', '32aa2fd87338e241978c48ab319641bc', '0987654321', 'jane_photo.jpg', 'client');


INSERT INTO reservation (id_client, id_lawyer, date_reservation, status)
VALUES 
(3, 1, '2024-12-25', 'waiting');

#SELECT rv.*, u.fname, u.lname FROM review rv, reservation r, user u WHERE rv.id_reservation = r.id AND r.id_client = u.id AND r.id_lawyer = 1;

#SELECT u.*, l.* FROM user u, lawyer_details l WHERE u.id = l.id_lawyer AND u.id = 1


#Nombre de demandes en attente
#SELECT COUNT(*) FROM reservation WHERE STATUS = 'waiting' AND id_lawyer = 1;

#Nombre de demandes approvés pour la journée
#SELECT COUNT(*) FROM reservation WHERE date_reservation = CURDATE() AND STATUS = 'confirmed' AND id_lawyer = 1;

#Nombre de demandes approuvées pour le jour suivant
#SELECT COUNT(*) FROM reservation WHERE DATEDIFF(date_reservation, CURDATE()) = 1 AND STATUS = 'confirmed' AND id_lawyer = 1;

#Détails des prochains client et de ses réservations
#SELECT r.*,u.fname, u.lname, u.phone, u.email FROM reservation r, user u, user l WHERE r.id_client = u.id AND r.id_lawyer = l.id AND r.id_lawyer = 1 AND r.`status` = 'waiting' AND date_reservation = CURDATE();

#SELECT r.*, u.*,   FROM reservation r, user u WHERE r.id_client = 3;

DELETE FROM reservation where id = 5;

UPDATE user SET fname = 'ahmed' WHERE id = 1;

*/
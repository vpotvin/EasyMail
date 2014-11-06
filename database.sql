use SE

#DROP TABLE IF EXISTS Emails;

DROP TABLE IF EXISTS contacts;
DROP TABLE IF EXISTS users;


CREATE TABLE IF NOT EXISTS contacts(
	eid INT AUTO_INCREMENT PRIMARY KEY,
	first_name varchar(50),
	last_name varchar(50),
	addr varchar(100)
);

CREATE TABLE IF NOT EXISTS users(
	uid INT AUTO_INCREMENT PRIMARY KEY,
	username varchar(50),
	password varchar(100)
);

INSERT INTO users (username, password) VALUES('setest', 'c1333a0f215ff8f8dd7bbdc636ab4762');
INSERT INTO contacts (first_name, last_name, addr)VALUES('t_f_name', 't_last_name', 'test@test.com');
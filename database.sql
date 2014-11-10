use SE

-- DROP TABLE IF EXISTS Emails;
-- DROP TABLE IF EXISTS contacts;

DROP TABLE IF EXISTS drafts;
DROP TABLE IF EXISTS email_addr_groups;
DROP TABLE IF EXISTS user_groups;
DROP TABLE IF EXISTS email_addr;
DROP TABLE IF EXISTS users;







-- CREATE TABLE IF NOT EXISTS contacts(
-- 	eid INT AUTO_INCREMENT PRIMARY KEY,
-- 	first_name varchar(50),
-- 	last_name varchar(50),
-- 	addr varchar(100)
-- );

CREATE TABLE IF NOT EXISTS users(
	uid INT AUTO_INCREMENT PRIMARY KEY,
	username varchar(50),
	password varchar(100)
);

CREATE TABLE IF NOT EXISTS email_addr(
	eaid INT AUTO_INCREMENT PRIMARY KEY,
	uid INT,
	email_address varchar(100),
	title varchar(100),
	FOREIGN KEY (uid) 
        REFERENCES users(uid)
        ON DELETE CASCADE,
    UNIQUE KEY (`email_address`,`uid`)
);

CREATE TABLE IF NOT EXISTS user_groups(
	gid INT AUTO_INCREMENT PRIMARY KEY,
	uid INT,
	group_name varchar(100),
	group_desc TEXT,
	group_color varchar(10),
	FOREIGN KEY(uid)
		REFERENCES users(uid)
);

CREATE TABLE IF NOT EXISTS email_addr_groups(
	eaid INT,
	gid INT,
	FOREIGN KEY (eaid)
		REFERENCES email_addr(eaid),
	FOREIGN KEY (gid)
		REFERENCES user_groups(gid)
);

CREATE TABLE IF NOT EXISTS drafts(
	did int AUTO_INCREMENT PRIMARY KEY,
	message TEXT
);


INSERT INTO users (username, password) VALUES('setest', 'c1333a0f215ff8f8dd7bbdc636ab4762');
-- INSERT INTO contacts (first_name, last_name, addr)VALUES('t_f_name', 't_last_name', 'test@test.com');
-- INSERT INTO email_addr(uid, email_address, title) VALUES(1, 'test@test.com', 'FOR TESTING');
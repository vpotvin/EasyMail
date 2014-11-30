use SE


-- DROP TABLE IF EXISTS contacts;
DROP TABLE IF EXISTS config;
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
        ON DELETE CASCADE
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

CREATE TABLE IF NOT EXISTS config(
	cid int AUTO_INCREMENT PRIMARY KEY,
	uid int,
	smpt_addr varchar(100),
	email_username varchar(100),
	email_password varchar(100),
	FOREIGN KEY (uid)
		REFERENCES users(uid)
);

CREATE TABLE IF NOT EXISTS drafts(
	did int AUTO_INCREMENT PRIMARY KEY,
	uid int,
	sendType varchar(50),
	sendto varchar(50),
	subject varchar(50),
	message TEXT,
	FOREIGN KEY(uid)
		REFERENCES users(uid)
);


INSERT INTO users (username, password) VALUES('setest', 'c1333a0f215ff8f8dd7bbdc636ab4762');
INSERT INTO users (username, password) VALUES('setest2', '7e54e03f709208b6fd164a3cf3f09202');

INSERT INTO email_addr(uid, email_address, title) VALUES(1, 'barnettlynn@gmail.com', 'FOR TESTING');
INSERT INTO email_addr(uid, email_address, title) VALUES(1, 'vjgqqw@pwrby.com', 'FOR TESTING2');


INSERT INTO email_addr(uid, email_address, title) VALUES(2, 'ThisShouldntShowUP@test.com', 'FOR TESTING');
INSERT INTO email_addr(uid, email_address, title) VALUES(2, 'ThisShouldntShowUP2@test.com', 'FOR TESTING');
INSERT INTO email_addr(uid, email_address, title) VALUES(2, 'ThisShouldntShowUP3@test.com', 'FOR TESTING');

INSERT INTO email_addr(uid, email_address, title) VALUES(1, 'ANOTHER@test.com', 'FOR TESTING');
INSERT INTO email_addr(uid, email_address, title) VALUES(1, 'ANOTHER2@test.com', 'FOR TESTING2');
INSERT INTO email_addr(uid, email_address, title) VALUES(1, 'ANOTHER3@test.com', 'FOR TESTING3');

INSERT INTO user_groups(uid, group_name, group_color) VALUES(1, 'TEST', 'success');
INSERT INTO user_groups(uid, group_name, group_color) VALUES(1, 'ANOTHER GROUP', 'success');

INSERT INTO email_addr_groups(eaid, gid) VALUES(1, 1);
INSERT INTO email_addr_groups(eaid, gid) VALUES(2, 1);
INSERT INTO email_addr_groups(eaid, gid) VALUES(3, 1);

INSERT INTO email_addr_groups(eaid, gid) VALUES(4, 2);
INSERT INTO email_addr_groups(eaid, gid) VALUES(5, 2);
INSERT INTO email_addr_groups(eaid, gid) VALUES(6, 2);

INSERT INTO config(uid, smpt_addr, email_username, email_password) VALUES(1, 'ssl://smtp.gmail.com', 'seeasymail@gmail.com', 'seproject')

-- SELECT email_addr.email_address 
-- FROM email_addr JOIN email_addr_groups 
-- 	ON email_addr.eaid = email_addr_groups.eaid JOIN user_groups 
-- 	ON email_addr_groups.gid = user_groups.gid 
-- WHERE user_groups.gid = 1;



-- INSERT INTO contacts (first_name, last_name, addr)VALUES('t_f_name', 't_last_name', 'test@test.com');
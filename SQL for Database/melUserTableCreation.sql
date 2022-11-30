CREATE DATABASE IF NOT EXISTS webassign2;

CREATE TABLE users (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, password VARCHAR(45) NOT NULL, username VARCHAR(45) NOT NULL UNIQUE, firstName VARCHAR(45) NOT NULL, 
                    lastName VARCHAR(50) NOT NULL, email VARCHAR(45) NOT NULL UNIQUE, phone VARCHAR(20) NULL, role VARCHAR(15) NULL);

INSERT INTO users (username, password, firstName, lastName, email, phone, role)
VALUES
('meth0020', 'meth0020','Melanie', 'Methe', 'meth0020@algonquinlive.com', '6132924414', 'admin'),
('jdoe', 'password', 'John', 'Doe', 'john.doe@hotmail.com', '', ''),
('jdoe2', 'password', 'Jane', 'Doe', 'jane.doe@hotmail.com', '613456738',''),
('testUser', 'test', 'test', 'user', 'test.user@yahoo.ca', '', 'admin');
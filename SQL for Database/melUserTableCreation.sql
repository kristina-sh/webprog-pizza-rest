-- Course name: Web Programming (CST_8285_312)
-- Assignment 2
-- Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad

CREATE DATABASE IF NOT EXISTS webassign2;

-- Creating a table for the admin page (Melanie Methe)
CREATE TABLE IF NOT EXISTS webassign2.users (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, password VARCHAR(45) NOT NULL, username VARCHAR(45) NOT NULL UNIQUE, firstName VARCHAR(45) NOT NULL, 
                    lastName VARCHAR(50) NOT NULL, email VARCHAR(45) NOT NULL UNIQUE, phone VARCHAR(20) NULL, role VARCHAR(15) NULL);

INSERT INTO webassign2.users (username, password, firstName, lastName, email, phone, role)
VALUES
('meth0020', 'meth0020','Melanie', 'Methe', 'meth0020@algonquinlive.com', '6132924414', 'admin'),
('jdoe', 'password', 'John', 'Doe', 'john.doe@hotmail.com', '', ''),
('jdoe2', 'password', 'Jane', 'Doe', 'jane.doe@hotmail.com', '613456738',''),
('testUser', 'test', 'test', 'user', 'test.user@yahoo.ca', '', 'admin');

-- Creating a table for the menu page (Kristina Shalaginova)
CREATE TABLE webassign2.items (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, image VARCHAR(250) NULL, name VARCHAR(250) NULL, category VARCHAR(250) NULL, description VARCHAR(400) NULL,
 size VARCHAR(250) NULL, price VARCHAR(250) NULL);

-- Inserting values into items table
INSERT INTO webassign2.items (image, name, category, description, size, price)
VALUES
('./images/hawaiian.jpg', 'Hawaiian', 'Pizza', 'Freshly baked in the oven pizza with pineapple and slices of ham topped with an extra layer of cheese', 'Medium', '$15.55'),
('./images/chicken.jpg', 'Chicken', 'Pizza', 'Freshly baked in the oven pizza with mozzarella cheese, fresh mushrooms, onions, all white-meat chicken, bacon', 'Medium', '$17.55'),
('./images/veggie.jpg', 'Veggie', 'Pizza', 'Freshly baked in the oven pizza with roasted red peppers, fresh baby spinach, fresh mushrooms, tomatoes, black olives and feta', 'Medium', '$13.55'),
('./images/carbonara.jpg', 'Carbonara', 'Pasta', 'Homemade pasta with grilled white meat chicken, bacon, onions and mushrooms mixed with penne pasta', 'Medium', '$13.55'),
('./images/tomato.jpg', 'Italian Tomato', 'Pasta', 'Homemade pasta whith fresh tomatoes, fresh baby spinach, green peppers, mushrooms', 'Medium', '$10.55'),
('./images/prima.jpg', 'Creamy Chicken', 'Pasta', 'Homemade pasta whith chicken and creammy sauce', 'Medium', '$14.55');

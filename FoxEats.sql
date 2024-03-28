-- Assignment 3
-- August Alexander, Sydonya Miller, Andrej Opancic

DROP DATABASE IF EXISTS FoxEats;
CREATE DATABASE FoxEats;
USE FoxEats;

-- Table for Food

CREATE TABLE Food (
  Food_Option VARCHAR(255) NOT NULL,
  Price DECIMAL(5,2) DEFAULT NULL,
  Food_Description TEXT DEFAULT NULL,
  Food_Category VARCHAR(255) DEFAULT NULL,
  Dining_Service VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (Food_Option)
);

INSERT INTO Food (Food_Option, Price, Food_Description, Food_Category, Dining_Service) VALUES
('Beef Tacos', 5.99, 'Spicy beef tacos with salsa and cheese', 'Mexican', 'Taco Truck'),
('Butter Chicken', 10.99, 'Creamy butter chicken served with rice', 'Indian', 'Curry House'),
('Cheese Pizza', 8.99, 'Classic cheese pizza with marinara sauce', 'Italian', 'Main Cafe'),
('Chicken Salad', 6.99, 'Grilled chicken salad with mixed greens', 'Healthy', 'Salad Bar'),
('Chocolate Cake', 4.99, 'Rich chocolate cake with fudge icing', 'Dessert', 'Bakery'),
('Falafel Wrap', 6.99, 'Falafel with hummus and veggies in a wrap', 'Middle Eastern', 'Mediterranean Deli'),
('Pad Thai', 8.99, 'Stir-fried noodles with shrimp and peanuts', 'Thai', 'Noodle Shop'),
('Pulled Pork Sandwich', 7.99, 'Slow-cooked pulled pork with BBQ sauce', 'American', 'Smokehouse'),
('Sushi Roll', 9.99, 'Fresh salmon sushi roll with avocado', 'Japanese', 'Sushi Counter'),
('Veggie Burger', 7.99, 'Plant-based burger with lettuce and tomato', 'American', 'Grill Station');

-- Table for Payment

CREATE TABLE Payment (
  FoxID INT NOT NULL,
  Credit_Card VARCHAR(19) DEFAULT NULL,
  Balance DECIMAL(10,2) DEFAULT NULL,
  PRIMARY KEY (FoxID)
);

INSERT INTO Payment (FoxID, Credit_Card, Balance) VALUES
(101, '1234-5678-9123-4567', 120.00),
(102, '2345-6789-0123-4568', 95.50),
(103, '3456-7890-1234-5679', 80.75),
(104, '4567-8901-2345-6780', 60.00),
(105, '5678-9012-3456-7891', 45.25),
(106, '6789-0123-4567-8902', 30.50),
(107, '7890-1234-5678-9013', 15.75),
(108, '8901-2345-6789-0124', 100.00),
(109, '9012-3456-7890-1235', 85.25),
(110, '0123-4567-8901-2346', 70.50);

-- Table for User

CREATE TABLE User (
  Username VARCHAR(255) NOT NULL,
  Password VARCHAR(255),
  Contact_Number VARCHAR(15),
  Building VARCHAR(255),
  Fox_ID INT,
  PRIMARY KEY (Username),
  FOREIGN KEY (Fox_ID) REFERENCES Payment(FoxID)
);

INSERT INTO User (Username, Password, Contact_Number, Building, Fox_ID) VALUES
('alexl', 'hashedpass5', '407-555-0345', 'Cedar Residence', 101),
('avas', 'hashedpass10', '407-555-0234', 'Ivy Residence', 102),
('danielm', 'hashedpass7', '407-555-0789', 'Fir Residence', 103),
('emilyf', 'hashedpass6', '407-555-0567', 'Elm Residence', 104),
('janedoe', 'hashedpass2', '407-555-0456', 'Oak Residence', 105),
('johndoe', 'hashedpass1', '407-555-0123', 'Pine Residence', 106),
('mikeb', 'hashedpass3', '407-555-0789', 'Maple Residence', 107),
('oliviap', 'hashedpass8', '407-555-0987', 'Grove Residence', 108),
('sarahc', 'hashedpass4', '407-555-0124', 'Birch Residence', 109),
('williamr', 'hashedpass9', '407-555-0456', 'Holly Residence', 110);

-- Table for Orders

CREATE TABLE Orders (
  Order_ID INT AUTO_INCREMENT,
  Username VARCHAR(255),
  Order_History VARCHAR(255),
  Status VARCHAR(255),
  Update_Time DATETIME,
  Rating INT,
  PRIMARY KEY (Order_ID),
  KEY username (Username),
  CONSTRAINT fk_orders_users FOREIGN KEY (Username) REFERENCES User (Username)
);

INSERT INTO Orders (Order_ID, Username, Order_History, Status, Update_Time, Rating) VALUES
(1, 'johndoe', 'Burger, Fries', 'Delivered', '2024-03-26 18:30:00', 4),
(2, 'janedoe', 'Salad, Soup', 'Preparing', '2024-03-26 18:35:00', 5),
(3, 'mikeb', 'Pizza, Soda', 'Delivered', '2024-03-26 18:40:00', 3),
(4, 'sarahc', 'Pasta, Wine', 'Cancelled', '2024-03-26 18:45:00', 2),
(5, 'alexl', 'Sushi, Tea', 'Delivered', '2024-03-26 18:50:00', 5),
(6, 'emilyf', 'Tacos, Lemonade', 'Delivered', '2024-03-26 18:55:00', 4),
(7, 'danielm', 'Steak, Beer', 'Preparing', '2024-03-26 19:00:00', 5),
(8, 'oliviap', 'Curry, Rice', 'Delivered', '2024-03-26 19:05:00', 4),
(9, 'williamr', 'Sandwich, Chips', 'Delivered', '2024-03-26 19:10:00', 3),
(10, 'avas', 'Ice Cream, Cake', 'Delivered', '2024-03-26 19:15:00', 5);

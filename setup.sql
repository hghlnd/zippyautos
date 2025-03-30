-- setup.sql
CREATE DATABASE IF NOT EXISTS zippyusedautos;
USE zippyusedautos;

CREATE TABLE makes (
    makeID INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50) NOT NULL
);

CREATE TABLE types (
    typeID INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL
);

CREATE TABLE classes (
    classID INT AUTO_INCREMENT PRIMARY KEY,
    class VARCHAR(50) NOT NULL
);

CREATE TABLE vehicles (
    vehicleID INT AUTO_INCREMENT PRIMARY KEY,
    year INT NOT NULL,
    makeID INT NOT NULL,
    typeID INT NOT NULL,
    classID INT NOT NULL,
    model VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (makeID) REFERENCES makes(makeID) ON DELETE CASCADE,
    FOREIGN KEY (typeID) REFERENCES types(typeID) ON DELETE CASCADE,
    FOREIGN KEY (classID) REFERENCES classes(classID) ON DELETE CASCADE
);

-- Sample data (optional, add more as needed)
INSERT INTO makes (make) VALUES ('Chevrolet'), ('Ford'), ('Cadillac'), ('Nissan'), ('Hyundai');
INSERT INTO types (type) VALUES ('SUV'), ('Truck'), ('Sedan');
INSERT INTO classes (class) VALUES ('Economy'), ('Luxury'), ('Sport');

INSERT INTO vehicles (year, model, price, makeID, typeID, classID) VALUES
(2009, 'Suburban', 18999.00, 1, 1, 1),
(2011, 'F150', 22999.00, 2, 2, 1),
(2012, 'Escalade', 24999.00, 3, 1, 3),
(2018, 'Rogue', 34999.00, 4, 1, 2),
(2016, 'Sonata', 29999.00, 5, 3, 2);

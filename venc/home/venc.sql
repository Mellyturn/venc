




CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

----------------------------------

CREATE TABLE Admin (
    AdminID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) UNIQUE,
    Password VARCHAR(255)
);

-------------------------------

CREATE TABLE Vehicle (
    vehicle_id INT PRIMARY KEY AUTO_INCREMENT,
    brand VARCHAR(50) NOT NULL,
    year_model INT NOT NULL,
    vehicle_type VARCHAR(50),
    plate_number VARCHAR(20),
    load_capacity DECIMAL(10, 2),
    status VARCHAR(20)
);

-------------------------------
CREATE TABLE IF NOT EXISTS driverlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    address VARCHAR(255),
    email VARCHAR(255),
    status ENUM('Active', 'Inactive') DEFAULT 'Active'
    
);
-------------------------------



CREATE TABLE VehicleRequest (
    RequestID INT PRIMARY KEY AUTO_INCREMENT,
    VehicleRequired DATETIME,
    DriversName VARCHAR(255),
    DriversEmail VARCHAR(255),
    OrganizationName VARCHAR(255),
    ContactPerson VARCHAR(255),
    ContactEmail VARCHAR(255),
    ContactPhone VARCHAR(20),
    VehiclePreference BOOLEAN,
    NumberOfSUV INT,
    NumberOfMiniVan INT,
    NumberOfMotorcycles INT
);

----------------------------------






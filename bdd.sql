CREATE DATABASE IF NOT EXISTS vparrots;

USE vparrots;

CREATE TABLE IF NOT EXISTS fueltype (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS gearbox (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS brands (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS pictures (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS options (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(50)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    models VARCHAR(255) NOT NULL,
    dateOfCirculation DATE NOT NULL,
    price DECIMAL(10),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    milesAge DECIMAL(10),
    gearbox_id INT,
    brands_id INT,
    fuelType_id INT,
    FOREIGN KEY (gearbox_id) REFERENCES gearbox(id),
    FOREIGN KEY (brands_id) REFERENCES brands(id),
    FOREIGN KEY (fuelType_id) REFERENCES fueltype(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS pictures_vehicles (
    id_pictures INT,
    id_vehicles INT,
    FOREIGN KEY (id_pictures) REFERENCES pictures(id),
    FOREIGN KEY (id_vehicles) REFERENCES vehicles(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS options_vehicles (
    id_options INT,
    id_vehicles INT,
    FOREIGN KEY (id_options) REFERENCES options(id),
    FOREIGN KEY (id_vehicles) REFERENCES vehicles(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS role (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    role VARCHAR(50)
) ENGINE=InnoDB; 

CREATE TABLE IF NOT EXISTS horaire (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    days DATE NOT NULL,
    hours TIME NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    mail VARCHAR(255),
    phone VARCHAR(10),
    adress VARCHAR(255),
    age VARCHAR(2),
    id_role INT,
    id_horaire INT,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_role) REFERENCES role(id),
    FOREIGN KEY (id_horaire) REFERENCES horaire(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS avis (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    content VARCHAR(255) NOT NULL,
    note DECIMAL(5) NOT NULL,
    publish VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS avis_users (
    id_avis INT,
    id_users INT,
    FOREIGN KEY (id_avis) REFERENCES avis(id),
    FOREIGN KEY (id_users) REFERENCES users(id)
) ENGINE=InnoDB;
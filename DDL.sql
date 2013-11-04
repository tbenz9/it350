-- ================================================
--
-- Authors:  Thomas Bennett & Taylor Beurger
-- Title:  DDL for IT Inventory Management
-- Class:  BYU IT 350 Dr. Tew
--
-- ================================================

-- ================================================
--         SQL Style Guide
--
-- table names: lowercase & plural
-- attribute names: lowercase, singular, descriptive with underscores
-- keys: labeled with pk_ or fk_
--
-- ================================================

-- Create the employees Table
CREATE TABLE employees
(
	employees_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	title VARCHAR(100),
	manager INTEGER,
	office_number VARCHAR(30),
	hire_date DATE,
	phone_number VARCHAR(20)
);

-- Create the computers Table
CREATE TABLE computers
(
	computers_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	operating_system VARCHAR(30),
	motherboard VARCHAR(30),
	ram VARCHAR(30),
	assignment_date DATE,
	upgrade_date DATE,
	employees_ID INTEGER
);

-- Create the macaddresses Table
CREATE TABLE macaddresses
(
	macaddresses_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	computers_ID INTEGER,
	mac_address VARCHAR(23)
);

-- Create the harddrives Table
CREATE TABLE harddrives
(
	harddrives_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	capacity INTEGER,
	serial_number VARCHAR(20),
	model VARCHAR(20),
	computers_ID INTEGER
);

-- Create the licenses Table
CREATE TABLE licenses
(
	licenses_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	license_key VARCHAR(30),
	number_times_activated TINYINT,
	max_activation TINYINT,
	license_name VARCHAR(45),
	license_expiration_date DATE,
	computers_ID INTEGER
);

-- Create the switches Table
CREATE TABLE switches
(
	switches_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	password VARCHAR(30),
	username VARCHAR(30),
	location VARCHAR(30),
	model VARCHAR(30),
	smart BOOLEAN,
	managed BOOLEAN
);

-- Create the ports Table
CREATE TABLE ports
(
	switches_ID INTEGER,
	port_number TINYINT,
	device_ID INTEGER
);

-- Create the warranties Table
CREATE TABLE warranties
(
	warranty_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	expires DATE,
	vendor VARCHAR(30),
	warranty_length VARCHAR(20),
	purchase_date DATE,
	devices_ID INTEGER
);

-- Create the monitors Table
CREATE TABLE monitors
(
	monitors_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	serial_number VARCHAR(20),
	model VARCHAR(30),
	screen_size TINYINT,
	computers_ID INTEGER
);

-- Create the devices Table
CREATE TABLE devices
(
	devices_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	serial_number VARCHAR(20),
	model VARCHAR(30),
	devices_type VARCHAR(20),
	employees_ID INTEGER
);

-- Create the phones Table
CREATE TABLE phones
(
	phones_ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
	serial_number VARCHAR(20),
	model VARCHAR(30),
	ip VARCHAR(15),
	switch_port VARCHAR(20),
	empoyees_ID INTEGER
);

-- Create the reviews Table
CREATE TABLE reviews
(
	reviewer INTEGER PRIMARY KEY NOT NULL,
	review_date DATE,
	rating INTEGER
);

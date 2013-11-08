-- Dummy data for employees
INSERT INTO employees (employees_ID,employee_firstname,employee_lastname,title,manager,office_number,hire_date,phone_number) VALUES ('e_1336', 'Thomas', 'Bennett', 'Senior IT Tech', 'e_1337', 'E310', '2008-09-30', '801-717-3377');
INSERT INTO employees (employees_ID,employee_firstname,employee_lastname,title,manager,office_number,hire_date,phone_number) VALUES ('e_1337', 'Spencer', 'Owen', 'Customer Support', 'e_1338', 'E345', '2012-10-30', '801-717-3360');
INSERT INTO employees (employees_ID,employee_firstname,employee_lastname,title,manager,office_number,hire_date,phone_number) VALUES ('e_1338', 'Mike', 'Lovell', 'Network Infrastructure', 'e_1339', 'E312', '2010-10-01', '801-717-3375');
INSERT INTO employees (employees_ID,employee_firstname,employee_lastname,title,manager,office_number,hire_date,phone_number) VALUES ('e_1339', 'Jared', 'Bristow', 'IT Manager', 'e_1340', 'E315', '2008-02-01', '801-717-3718');
INSERT INTO employees (employees_ID,employee_firstname,employee_lastname,title,manager,office_number,hire_date,phone_number) VALUES ('e_1340', 'Alan', 'Taylor', 'CFO', '', 'E320', '2012-05-05', '801-341-0345');


-- Dummy data for computers
INSERT INTO computers (computers_ID,hostname,operating_system,motherboard,ram,assignment_date,employees_ID)
VALUES ('c_1234', 'bigtony2', 'ubuntu_12.04', 'BL460c G1', '20GB', '2012-05-12', 'e_1336');

INSERT INTO computers (computers_ID,hostname,operating_system,motherboard,ram,assignment_date,upgrade_date,employees_ID)
VALUES ('c_1235', 'c01a', 'ubuntu_12.04', 'Supermicro X8DTT-H', '48GB', '2011-10-20', 'e_1337');

INSERT INTO computers (computers_ID,hostname,operating_system,motherboard,ram,assignment_date,upgrade_date,employees_ID)
VALUES ('c_1236', 'aumoe', 'ubuntu_12.04', 'Inspiron 530', '8GB', '2011-02-04', 'e_1338');

INSERT INTO computers (computers_ID,hostname,operating_system,motherboard,ram,assignment_date,upgrade_date,employees_ID)
VALUES ('c_1237', 'apple', 'macOSX3.5', 'G4 Mac', '0.5GB', '2008-01-22', 'e_1336');

INSERT INTO computers (computers_ID,hostname,operating_system,motherboard,ram,assignment_date,upgrade_date,employees_ID)
VALUES ('c_1238', 'aloha', 'win7', 'Inspiron 537s', '4GB', '2009-12-10', 'e_1340');


-- Dummy data for macaddresses
INSERT INTO macaddresses (macaddresses_ID,computers_ID,mac_address) VALUES ('m_110', 'c_1234', '25640490000');

INSERT INTO macaddresses (macaddresses_ID,computers_ID,mac_address) VALUES ('m_111', 'c_1237', '001CC4E16AFE');

INSERT INTO macaddresses (macaddresses_ID,computers_ID,mac_address) VALUES ('m_112', 'c_1238', '001CC4E16B22');

INSERT INTO macaddresses (macaddresses_ID,computers_ID,mac_address) VALUES ('m_113', 'c_1235', '001CC415927D');

INSERT INTO macaddresses (macaddresses_ID,computers_ID,mac_address) VALUES ('m_114', 'c_1237', '50E549C7B110');


-- Dummy data for harddrives
INSERT INTO harddrives (harddrives_ID,capacity,serial_number,model,computers_ID) VALUES ('h_100', '500', 'C82700043BF0557', 'WD Black', 'c_1235');

INSERT INTO harddrives (harddrives_ID,capacity,serial_number,model,computers_ID) VALUES ('h_101', '1000', 'c82700038bc0706', 'WD Blue', 'c_1236');

INSERT INTO harddrives (harddrives_ID,capacity,serial_number,model,computers_ID) VALUES ('h_102', '3000', 'c82700046bf0748', 'WD Red', 'c_1237');

INSERT INTO harddrives (harddrives_ID,capacity,serial_number,model,computers_ID) VALUES ('h_103', '3000', 'ZM11S70836', 'WD Red', 'c_1237');

INSERT INTO harddrives (harddrives_ID,capacity,serial_number,model,computers_ID) VALUES ('h_104', '1500', 'ZM11S70715', 'WD Black', 'c_1234');



-- Dummy data for licenses
INSERT INTO licenses (license_key,number_times_activated,max_activation,license_name,license_expiration_date,computers_ID) VALUES ('AAAA-BBBB-CCCC-DDDD', '23', '100', 'Adobe Dreamweaver CS5', '2014-05-01', 'c_1234');

INSERT INTO licenses (license_key,number_times_activated,max_activation,license_name,license_expiration_date,computers_ID) VALUES ('BBBB-CCCC-DDDD-EEEE', '27', '200', 'vmware', '2014-12-31', 'c_1234');

INSERT INTO licenses (license_key,number_times_activated,max_activation,license_name,license_expiration_date,computers_ID) VALUES ('CCCC-DDDD-EEEE-FFFF', '134', '0', 'Microsoft Office 2010 Home and Business', 'c_1235');

INSERT INTO licenses (license_key,number_times_activated,max_activation,license_name,license_expiration_date,computers_ID) VALUES ('DDDD-EEEE-FFFF-GGGG', '27', '200', 'vmware', 'c_1238');

INSERT INTO licenses (license_key,number_times_activated,max_activation,license_name,license_expiration_date,computers_ID) VALUES ('EEEE-FFFF-GGGG-HHHH', '27', '200', 'vmware', 'c_1236');



-- Dummy data for switches
INSERT INTO switches (switches_ID,password,username,location,model,smart,managed) VALUES ('s_123', 'badp@ssword', 'guessme', 'Rack 8', 'SG200-50', '1', '0');

INSERT INTO switches (switches_ID,password,username,location,model,smart,managed) VALUES ('s_124', 'badp@ssword', 'guessme', 'Rack 4', '3750 Series', '1', '1');

INSERT INTO switches (switches_ID,password,username,location,model,smart,managed) VALUES ('s_125', 'betterp@ssword', 'user123', 'Rack3', 'GSM7248 v2', '0', '1');

INSERT INTO switches (switches_ID,password,username,location,model,smart,managed) VALUES ('s_126', 'betterp@ssword', 'user123', 'Rack7', 'FS750T2', '1', '1');

INSERT INTO switches (switches_ID,password,username,location,model,smart,managed) VALUES ('s_127', 'badp@ssword', 'guessme', 'Rack 5', 'TEG-448WS', '1', '1');


-- Dummy data for ports
INSERT INTO ports (switches_ID,port_number,device_ID) VALUES ('s_123', '56', 'd_1000');

INSERT INTO ports (switches_ID,port_number,device_ID) VALUES ('s_124', '20', 'd_1111');

INSERT INTO ports (switches_ID,port_number,device_ID) VALUES ('s_125', '4', 'd_3245');

INSERT INTO ports (switches_ID,port_number,device_ID) VALUES ('s_126', '15', 'd_1123');

INSERT INTO ports (switches_ID,port_number,device_ID) VALUES ('s_127', '11', 'd_8765');


-- Dummy data for warranties 
INSERT INTO warranties (expires,vendor,warranty_length,prucahse_date,devices_ID) VALUES ();

INSERT INTO warranties (expires,vendor,warranty_length,prucahse_date,devices_ID) VALUES ();

INSERT INTO warranties (expires,vendor,warranty_length,prucahse_date,devices_ID) VALUES ();

INSERT INTO warranties (expires,vendor,warranty_length,prucahse_date,devices_ID) VALUES ();

INSERT INTO warranties (expires,vendor,warranty_length,prucahse_date,devices_ID) VALUES ();


-- Dummy data for monitors 
INSERT INTO monitors (monitors_ID,serial_number,model,screen_size,computers_ID) VALUES
('m_1000', 'AC3456', 'Acer 23', '23', 'c_1000'),
('m_1001', 'AC3457', 'Acer 23', '23', 'c_1000'),
('m_2000', 'HP3453', 'HP 27', '27', 'c_2000'),
('m_2020', 'HP3454', 'HP 27', '27', 'c_2000'),
('m_2123', 'H6537', 'HannsG 28', '28', 'c_1234');


-- Dummy data for devices
INSERT INTO devices (devices_ID,serial_number,model,devices_type,employees_ID) VALUES ('d_1000', 'AC3453', 'Acer 1260', 'Tablet', 'e_1337');
INSERT INTO devices (devices_ID,serial_number,model,devices_type,employees_ID) VALUES ('d_1111', 'S4568', 'Samsung note 2', 'Cell Phone', 'e_1337');
INSERT INTO devices (devices_ID,serial_number,model,devices_type,employees_ID) VALUES ('d_3245', 'V58hg', 'VZ Jetpack', 'Hotspot', 'e_1337');
INSERT INTO devices (devices_ID,serial_number,model,devices_type,employees_ID) VALUES ('d_1123', 'V43892', 'Vizio 37', 'TV', 'e_1337');
INSERT INTO devices (devices_ID,serial_number,model,devices_type,employees_ID) VALUES ('d_8765', 'WD3tbe', 'WD 3TB', 'External HDD', 'e_1337');

-- Dummy data for phones
INSERT INTO phones (phones_ID,serial_number,model,ip,switch_port,employees_ID) VALUES ('p_1234', 'S45623', 'Polycom 335', '192.168.2.123', 'phone4-24', 'e_1337');
INSERT INTO phones (phones_ID,serial_number,model,ip,switch_port,employees_ID) VALUES ('p_1111', 'S10000', 'Polycom 330', '192.168.2.120', 'phone3-45', 'e_1337');
INSERT INTO phones (phones_ID,serial_number,model,ip,switch_port,employees_ID) VALUES ('p_1567', 'S32545', 'Polycom 400', '192.168.2.119', 'phone4-12', 'e_1336');
INSERT INTO phones (phones_ID,serial_number,model,ip,switch_port,employees_ID) VALUES ('p_1000', 'S45623', 'Polycom 321', '192.168.2.118', 'phone4-18', 'e_1339');
INSERT INTO phones (phones_ID,serial_number,model,ip,switch_port,employees_ID) VALUES ('p_2000', 'S87454', 'Polycom 335', '192.168.2.180', 'phone3-36', 'e_1340');

-- Dummy data for reviews
INSERT INTO reviews (reviewer,review_date,rating) VALUES ();

INSERT INTO reviews (reviewer,review_date,rating) VALUES ();

INSERT INTO reviews (reviewer,review_date,rating) VALUES ();

INSERT INTO reviews (reviewer,review_date,rating) VALUES ();

INSERT INTO reviews (reviewer,review_date,rating) VALUES ();

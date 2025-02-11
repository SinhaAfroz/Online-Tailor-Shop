CREATE TABLE Customer (c_userid varchar(255) NOT NULL, t_userid varchar(10) NOT NULL, pass varchar(255), fname varchar(255), lname varchar(255), email varchar(255) UNIQUE, phone varchar(255) UNIQUE, address varchar(255), city varchar(255), district varchar(255), postalcode int(5), PRIMARY KEY (c_userid));
CREATE TABLE Tailor (t_userid varchar(10) NOT NULL, pass varchar(255), fname varchar(255), lname varchar(255), email varchar(255) UNIQUE, phone varchar(255) UNIQUE, address varchar(255), PRIMARY KEY (t_userid));
CREATE TABLE Payments (orderno int(10) NOT NULL, trans_no varchar(255) UNIQUE, paydate date, payamount double, PRIMARY KEY (orderno));
CREATE TABLE Orders (orderno int(10) NOT NULL AUTO_INCREMENT, c_userid varchar(255) NOT NULL, orderdate date, deliverydate date, status varchar(255), details varchar(255), rating int(10), price double, PRIMARY KEY (orderno));
CREATE TABLE OrderDetails (orderno int(10) NOT NULL, productcode varchar(255) NOT NULL, quantity int(10), price double, PRIMARY KEY (orderno));
CREATE TABLE Category (productcode varchar(255) NOT NULL, productname varchar(255) UNIQUE, description varchar(255), gender varchar(10), PRIMARY KEY (productcode));
CREATE TABLE Measurement (c_userid varchar(255) NOT NULL, height int(10), weight int(10), neck int(10), chest int(10), waist int(10), hips int(10), shoulder int(10), sleeve int(10), PRIMARY KEY (c_userid));
CREATE TABLE Dress (designid varchar(255) NOT NULL, details varchar(255), image varchar(255), price double, required_measurement varchar(255), productcode varchar(255) NOT NULL, PRIMARY KEY (designid));
CREATE TABLE Orders_Dress (Ordersorderno int(10) NOT NULL, Dressdesignid varchar(255) NOT NULL, quantity int(11), PRIMARY KEY (Ordersorderno, Dressdesignid));
CREATE TABLE Material (mateid varchar(255) NOT NULL, details varchar(255), image varchar(255), designid varchar(255) NOT NULL, PRIMARY KEY (mateid));
CREATE TABLE Material_Orders_Dress (Materialmateid varchar(255) NOT NULL, Orders_DressOrdersorderno int(10) NOT NULL, Orders_DressDressdesignid varchar(255) NOT NULL, PRIMARY KEY (Materialmateid, Orders_DressOrdersorderno, Orders_DressDressdesignid));
ALTER TABLE Customer ADD INDEX FKCustomer496508 (t_userid), ADD CONSTRAINT FKCustomer496508 FOREIGN KEY (t_userid) REFERENCES Tailor (t_userid) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE Orders ADD INDEX FKOrders106494 (c_userid), ADD CONSTRAINT FKOrders106494 FOREIGN KEY (c_userid) REFERENCES Customer (c_userid) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE OrderDetails ADD INDEX FKOrderDetai45992 (orderno), ADD CONSTRAINT FKOrderDetai45992 FOREIGN KEY (orderno) REFERENCES Orders (orderno) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE OrderDetails ADD INDEX FKOrderDetai398445 (productcode), ADD CONSTRAINT FKOrderDetai398445 FOREIGN KEY (productcode) REFERENCES Category (productcode) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE Measurement ADD INDEX FKMeasuremen866508 (c_userid), ADD CONSTRAINT FKMeasuremen866508 FOREIGN KEY (c_userid) REFERENCES Customer (c_userid) ON UPDATE Cascade ON DELETE Cascade;
ALTER TABLE Payments ADD INDEX FKPayments173611 (orderno), ADD CONSTRAINT FKPayments173611 FOREIGN KEY (orderno) REFERENCES Orders (orderno);
ALTER TABLE Dress ADD INDEX FKDress63043 (productcode), ADD CONSTRAINT FKDress63043 FOREIGN KEY (productcode) REFERENCES Category (productcode);
ALTER TABLE Orders_Dress ADD INDEX FKOrders_Dre310325 (Ordersorderno), ADD CONSTRAINT FKOrders_Dre310325 FOREIGN KEY (Ordersorderno) REFERENCES Orders (orderno);
ALTER TABLE Orders_Dress ADD INDEX FKOrders_Dre881533 (Dressdesignid), ADD CONSTRAINT FKOrders_Dre881533 FOREIGN KEY (Dressdesignid) REFERENCES Dress (designid);
ALTER TABLE Material ADD INDEX FKMaterial96906 (designid), ADD CONSTRAINT FKMaterial96906 FOREIGN KEY (designid) REFERENCES Dress (designid);
ALTER TABLE Material_Orders_Dress ADD INDEX FKMaterial_O147670 (Materialmateid), ADD CONSTRAINT FKMaterial_O147670 FOREIGN KEY (Materialmateid) REFERENCES Material (mateid);
ALTER TABLE Material_Orders_Dress ADD INDEX FKMaterial_O750518 (Orders_DressOrdersorderno, Orders_DressDressdesignid), ADD CONSTRAINT FKMaterial_O750518 FOREIGN KEY (Orders_DressOrdersorderno, Orders_DressDressdesignid) REFERENCES Orders_Dress (Ordersorderno, Dressdesignid);

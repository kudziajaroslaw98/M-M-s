CREATE TABLE Documents (documentID int(10) NOT NULL AUTO_INCREMENT, uploadTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, lastModifactionTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, notes varchar(255), filePath varchar(255) NOT NULL UNIQUE, PRIMARY KEY (documentID));
CREATE TABLE Gear (gearID int(10) NOT NULL AUTO_INCREMENT, purchaseInvoiceID int(10) NOT NULL, userID int(10) NOT NULL, name varchar(255) NOT NULL, serialNumber varchar(255) NOT NULL, notes varchar(255), netValue float NOT NULL, warrantyDate date, PRIMARY KEY (gearID));
CREATE TABLE PurchaseInvoices (purchaseInvoiceID int(10) NOT NULL AUTO_INCREMENT, uploadTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, lastModificationTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, contractorData varchar(255) NOT NULL, amountNetto float NOT NULL, amountBrutto float NOT NULL, transactionDate date NOT NULL, notes varchar(255), filePath varchar(255) NOT NULL UNIQUE, currency varchar(255) NOT NULL, vat float NOT NULL, PRIMARY KEY (purchaseInvoiceID));
CREATE TABLE Reports (reportID int(10) NOT NULL AUTO_INCREMENT, reportDate date NOT NULL, PRIMARY KEY (reportID));
CREATE TABLE Roles (roleID int(10) NOT NULL AUTO_INCREMENT, roleName varchar(255) NOT NULL UNIQUE, PRIMARY KEY (roleID));
CREATE TABLE Roles_Users (roleID int(10) NOT NULL, userID int(10) NOT NULL, PRIMARY KEY (roleID, userID));
CREATE TABLE SaleInvoices (saleInvoiceID int(10) NOT NULL AUTO_INCREMENT, uploadTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, lastModificationTime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, contractorData varchar(255) NOT NULL, amountNetto float NOT NULL, amountBrutto float NOT NULL, transactionDate date NOT NULL, notes varchar(255), filePath varchar(255) NOT NULL UNIQUE, currency varchar(255) NOT NULL, vat float NOT NULL, PRIMARY KEY (saleInvoiceID));
CREATE TABLE SaleInvoices_Users (saleInvoiceID int(10) NOT NULL, userID int(10) NOT NULL, PRIMARY KEY (saleInvoiceID, userID));
CREATE TABLE Software (softwareID int(10) NOT NULL AUTO_INCREMENT, userID int(10) NOT NULL, purchaseInvoiceID int(10), name varchar(255) NOT NULL, licenceKey varchar(255), notes varchar(255), expirationDate date, techSupportDate date, PRIMARY KEY (softwareID));
CREATE TABLE Users (userID int(10) NOT NULL AUTO_INCREMENT, firstName varchar(255) NOT NULL, lastName varchar(255) NOT NULL, jobtitile varchar(255) NOT NULL, phoneNumber varchar(255) NOT NULL, PRIMARY KEY (userID));
CREATE TABLE Users_Documents (userID int(10) NOT NULL, documentID int(10) NOT NULL, PRIMARY KEY (userID, documentID));
CREATE TABLE Users_PurchaseInvoices (userID int(10) NOT NULL, purchaseInvoiceID int(10) NOT NULL, PRIMARY KEY (userID, purchaseInvoiceID));
ALTER TABLE Roles_Users ADD CONSTRAINT FKRoles_User126221 FOREIGN KEY (roleID) REFERENCES Roles (roleID);
ALTER TABLE Roles_Users ADD CONSTRAINT FKRoles_User780791 FOREIGN KEY (userID) REFERENCES Users (userID);
ALTER TABLE Users_Documents ADD CONSTRAINT FKUsers_Docu602919 FOREIGN KEY (userID) REFERENCES Users (userID);
ALTER TABLE Users_Documents ADD CONSTRAINT FKUsers_Docu66244 FOREIGN KEY (documentID) REFERENCES Documents (documentID);
ALTER TABLE SaleInvoices_Users ADD CONSTRAINT FKSaleInvoic884712 FOREIGN KEY (saleInvoiceID) REFERENCES SaleInvoices (saleInvoiceID);
ALTER TABLE SaleInvoices_Users ADD CONSTRAINT FKSaleInvoic516270 FOREIGN KEY (userID) REFERENCES Users (userID);
ALTER TABLE Users_PurchaseInvoices ADD CONSTRAINT FKUsers_Purc967449 FOREIGN KEY (userID) REFERENCES Users (userID);
ALTER TABLE Users_PurchaseInvoices ADD CONSTRAINT FKUsers_Purc649896 FOREIGN KEY (purchaseInvoiceID) REFERENCES PurchaseInvoices (purchaseInvoiceID);
ALTER TABLE Gear ADD CONSTRAINT FKGear822160 FOREIGN KEY (userID) REFERENCES Users (userID);
ALTER TABLE Software ADD CONSTRAINT FKSoftware61779 FOREIGN KEY (userID) REFERENCES Users (userID);
ALTER TABLE Gear ADD CONSTRAINT FKGear532083 FOREIGN KEY (purchaseInvoiceID) REFERENCES PurchaseInvoices (purchaseInvoiceID);
ALTER TABLE Software ADD CONSTRAINT FKSoftware292465 FOREIGN KEY (purchaseInvoiceID) REFERENCES PurchaseInvoices (purchaseInvoiceID);


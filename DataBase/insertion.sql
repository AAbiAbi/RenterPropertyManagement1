--test data fof all constraints:

-- Rental Property 1
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1111, '123 Main St', 'Los Angeles', '90001', 3, 1500.00, 'available', 4087521428);

-- Rental Property 2
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1112, '456 Elm St', 'New York', '10001', 2, 1200.00, 'available', 4087521429);

-- Rental Property 3
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1113, '789 Oak Ave', 'Chicago', '60601', 4, 2000.00, 'available', 4087521430);

-- Rental Property 4
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1114, '987 Pine Rd', 'San Francisco', '94101', 1, 900.00, 'available', 4087521431);

-- Rental Property 5
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1115, '321 Maple Dr', 'Seattle', '98101', 3, 1600.00, 'available', 5678901234);

-- Rental Property 6
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1116, '555 Oak St', 'Houston', '77002', 2, 1300.00, 'available', 6789012345);

-- Rental Property 7
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1117, '777 Elm St', 'Atlanta', '30303', 1, 950.00, 'available', 7890123456);

-- Rental Property 8
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1118, '999 Oak Ave', 'Dallas', '75201', 3, 1800.00, 'available', 8901234567);

-- Rental Property 9
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1119, '222 Pine Rd', 'Miami', '33130', 2, 1400.00, 'available', 9012345678);

-- Rental Property 10
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1120, '444 Maple Dr', 'Boston', '02108', 4, 2200.00, 'available', 8901234567);

-- Rental Property 11
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1121, '666 Oak St', 'Philadelphia', '19103', 2, 1100.00, 'available', 9876543210);
-- Rental Property 12
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1122, '888 Elm St', 'Chicago', '60606', 1, 1000.00, 'available', 4087521428);

-- Rental Property 13
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1123, '999 Maple Dr', 'New York', '10007', 3, 1800.00, 'available', 4087521429);

-- Rental Property 14
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1124, '777 Pine Rd', 'San Francisco', '94102', 2, 1300.00, 'available', 4087521430);

-- Rental Property 15
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1125, '444 Oak St', 'Seattle', '98102', 1, 950.00, 'available', 4087521431);

-- Rental Property 16
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1126, '555 Maple Dr', 'Los Angeles', '90006', 3, 1600.00, 'available', 5678901234);

-- Rental Property 17
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1127, '777 Oak Ave', 'Chicago', '60607', 2, 1200.00, 'available', 6789012345);

-- Rental Property 18
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1128, '999 Pine Rd', 'New York', '10008', 4, 2000.00, 'available', 7890123456);

-- Rental Property 19
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1129, '222 Oak St', 'San Francisco', '94103', 3, 1500.00, 'available', 8901234567);

-- Rental Property 20
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1130, '444 Pine Rd', 'Seattle', '98103', 2, 1200.00, 'available', 9012345678);

-- Rental Property 21
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1131, '666 Maple Dr', 'Los Angeles', '90007', 4, 2000.00, 'available', 0123456789);

-- Rental Property 22
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1132, '888 Oak Ave', 'Chicago', '60608', 1, 950.00, 'available', 9876543210);

-- Rental Property 23
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1133, '999 Maple Dr', 'New York', '10009', 3, 1700.00, 'available', 8765432109);


INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1133, '999 Maple Dr', 'New York', '10009', 'Samntha Sander', 6543567265, 5435627876, 1700.0, 1700.0, TO_DATE('2023/06/01', 'yyyy/mm/dd'),TO_DATE('2024/05/20', 'yyyy/mm/dd'));


-- --a)
-- INSERT INTO Supervise(RPNumber,SupId) VALUES(1121,11);
-- --should not success
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1123, '441 N Winchester', 'Santa Clara', '95050', 2, 2800.00, 'available', 5551112222);
-- --should insert to emp 12
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1122, '440 N Winchester', 'Santa Clara', '95050', 2, 2800.00, 'available', 8453657652);
-- --successful created
-- ------------cons (a) test perfect-----------------
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1124, '442 N Winchester', 'Santa Clara', '95050', 2, 2800.00, 'available', 8453657652);
-- --success
-- INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (13, 'John Doe', 9876543210, TO_DATE('2021/01/15', 'yyyy/mm/dd'), 'supervisor', 01, 9);
-- INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (15, 'Robert Johnson', 9456782301, TO_DATE('2022/03/10', 'yyyy/mm/dd'), 'supervisor', 02, 8);
-- INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (14, 'Alice Smith', 9567832190, TO_DATE('2019/08/20', 'yyyy/mm/dd'), 'staff', 03, 10);
-- INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (16, 'Emily Brown', 9321654780, TO_DATE('2020/07/01', 'yyyy/mm/dd'), 'supervisor', 03, 10);
-- INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (17, 'Mia Brown', 9323654280, TO_DATE('2020/07/01', 'yyyy/mm/dd'), 'supervisor', 03, 8);
-- -----------------

-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1122, '888 Cherry Ln', 'Santa Clara', '95051', 3, 1600.00, 'available', 3334445555);

-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1130, '284 Palm Ln', 'Santa Clara', '95051', 3, 2000.00, 'available', 3334445555);

-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1121, '666 Oak St', 'Los Angeles', '90001', 2, 1100.00, 'available', 9876543210);
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1126, '987 Old Rd', 'Los Angeles', '90001', 2, 1300.00, 'available', 8889990000);
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1127, '900 California Rd', 'Los Angeles', '90001', 2, 1300.00, 'available', 8889990000);
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1128, '904 Pine Rd', 'Los Angeles', '90001', 2, 1300.00, 'available', 8889990000);
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1129, '300 Pine Rd', 'Los Angeles', '90001', 2, 1300.00, 'available', 8889990000);


-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1120, '444 Maple Dr', 'San Francisco', '94101', 4, 2200.00, 'available', 8889990000);
-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1125, '789 Maple Dr', 'San Francisco', '94101', 4, 2500.00, 'available',3334445555);
-- --rental properties

-- INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1123, '123 Oak Ave', 'Malibu', '98101', 2, 1200.00, 'available', 8889990000);


-- -----------------
-- --lease agreement
-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1116, '555 Oak St', 'Santa Clara', '95051', 'Samntha Sander', 6543567265, 5435627876, 1500.0, 1500.0, TO_DATE('2023/06/01', 'yyyy/mm/dd'),TO_DATE('2024/05/01', 'yyyy/mm/dd'));

-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1119, '222 Pine Rd', 'Santa Clara', '95051', 'Will Mathews', 3456443211, 3425567544, 2000.0, 2000.0, TO_DATE('2019/06/01', 'yyyy/mm/dd'),TO_DATE('2020/02/20', 'yyyy/mm/dd'));

-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1121, '666 Oak St', 'Los Angeles', '90001', 'Samntha Sander', 6543567265, 5435627876, 1200.00, 1200.00, TO_DATE('2023/05/01', 'yyyy/mm/dd'),TO_DATE('2023/12/31', 'yyyy/mm/dd'));


-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1112, '456 Elm St', 'Sunnyvale', '93001', 'Henry Ford', 5436782716, 1324567891, 1300.00, 1300.00, TO_DATE('2014/07/01', 'yyyy/mm/dd'),TO_DATE('2015/01/01', 'yyyy/mm/dd'));


-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1118, '999 Oak Ave', 'Sunnyvale', '98101', 'North Kardashian', 2345671234, 5436544321, 1800.00, 1800.00, TO_DATE('2023/04/01', 'yyyy/mm/dd'),TO_DATE('2023/11/01', 'yyyy/mm/dd'));

-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1117, '777 Elm St', 'Malibu', '98101', 'North Kardashian', 2345671234, 5436544321, 950.00, 950.00, TO_DATE('2023/02/01', 'yyyy/mm/dd'),TO_DATE('2023/08/01', 'yyyy/mm/dd'));

-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1125, '789 Maple Dr', 'San Francisco', '94101', 'North Kardashian', 2345671234, 5436544321, 2500.00, 2500.00, TO_DATE('2023/01/01', 'yyyy/mm/dd'),TO_DATE('2023/07/29', 'yyyy/mm/dd'));

-- INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1113, '789 Oak Ave', 'Chicago', '60601', 'North Kardashian', 2345671234, 5436544321, 950.00, 950.00, TO_DATE('2023/02/01', 'yyyy/mm/dd'),TO_DATE('2023/08/01', 'yyyy/mm/dd'));
-- ---lease agreement rent should be modified as 950
---and rental property should keep consistency.
COMMIT;





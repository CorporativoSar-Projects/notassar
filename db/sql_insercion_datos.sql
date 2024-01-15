use notasinnsoldb;

-- Insertar datos en la tabla Users
INSERT INTO `notasinnsolDB`.`Users` (
  `US_Email`, 
  `US_Password`, 
  `US_Name`, 
  `US_Pat_Sur`, 
  `US_Mat_Sur`
) VALUES 
 ('juan.perez@example.com', SHA2('contrasena123', 256), 'Juan', 'Pérez', 'Gómez'),
  ('maria.lopez@example.com', SHA2('password456', 256), 'Maria', 'López', 'Martínez'),
  ('carlos.rodriguez@example.com', SHA2('securepass789', 256), 'Carlos', 'Rodríguez', 'García');


-- Insertar datos en la tabla Products
INSERT INTO `notasinnsolDB`.`Products` (`PR_Name`, `PR_Price`, `PR_Description`) VALUES
('Business Analysis', 150.00, 'Comprehensive business analysis and strategy development.'),
('IT consulting services', 200.00, 'IT consulting services for system optimization and efficiency.'),
('Financial advisory', 120.00, 'Financial advisory and planning for small businesses.');


-- Insertar datos en la tabla Packages
INSERT INTO `notasinnsolDB`.`Packages` (`PC_Name`, `PC_Description`) VALUES
('Notas', 'Description 1'),
('Prospeccion', 'Description 2'),
('Completo', 'Description 3');


-- Insertar datos en la tabla Themes
INSERT INTO `notasinnsolDB`.`Themes` (`TH_Name`, `TH_File_Name`) VALUES
('Turism', 'customStyle_Turism.css'),
('Tech', 'customStyle_Tech.css'),
('Sar', 'styleSAR.css');

-- Insertar datos en la tabla Companies
INSERT INTO `notasinnsolDB`.`Companies` (
  `CO_Email`, `CO_Password`, `CO_Name`, `CO_Code`, 
  `CO_Web`, `CO_Telephone`, `CO_Direction`, `CO_Logo`
) VALUES (
  'info@restaurant1.com', 'deliciouspass1', 'Tasty Bites Restaurant', 'TB1',
  'http://www.tastybites.com', '+1 (123) 456-7890', '123 Main Street, Cityville', 'logo1.png'
),
(
  'contact@pizzeria2.com', 'pizza123', 'Crusty Pizzeria', 'CP2',
  'http://www.crustypizza.com', '+1 (987) 654-3210', '456 Pizza Avenue, Townsville', 'logo2.png'
),
(
  'orders@sushishop3.com', 'sushi456', 'Sushi House', 'SH3',
  'http://www.sushihouse.com', '+1 (111) 222-3333', '789 Sushi Lane, Villagetown', 'logo3.png'
);



-- Insertar un nuevo registro en Company_Theme
INSERT INTO `notasinnsolDB`.`Company_Theme` (`CT_CO_Id`, `CT_TH_Id`)
VALUES 
  (1, 1),
  (2, 2),
  (3, 3);
  
-- Insertar un nuevo registro en User_Packages
INSERT INTO `notasinnsolDB`.`User_Packages` (`UP_US_Id`, `UP_PC_Id`)
VALUES 
  (1, 1),
  (2, 2),
  (3, 3);
  
-- Insertar datos de prueba para los clientes
-- Ejemplo 1
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Juan Pérez', 'juan@example.com', 'Calle A, Ciudad A', '123-456-7890');

-- Ejemplo 2
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('María García', 'maria@example.com', 'Calle B, Ciudad B', '987-654-3210');

-- Ejemplo 3
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Carlos Rodríguez', 'carlos@example.com', 'Calle C, Ciudad C', '555-123-4567');

-- Ejemplo 4
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Laura López', 'laura@example.com', 'Calle D, Ciudad D', '111-222-3333');

-- Ejemplo 5
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Roberto Sánchez', 'roberto@example.com', 'Calle E, Ciudad E', '999-888-7777');

-- Ejemplo 6
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Ana Martínez', 'ana@example.com', 'Calle F, Ciudad F', '444-555-6666');

-- Ejemplo 7
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Elena García', 'elena@example.com', 'Calle G, Ciudad G', '777-666-5555');

-- Ejemplo 8
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Francisco Pérez', 'francisco@example.com', 'Calle H, Ciudad H', '222-333-4444');

-- Ejemplo 9
INSERT INTO `notasinnsolDB`.`Clients` (`CL_Name`, `CL_Email`, `CL_Address`, `CL_Number`)
VALUES
('Isabel Rodríguez', 'isabel@example.com', 'Calle I, Ciudad I', '888-999-0000');

  
-- Insertar un nuevo registro en Notes
INSERT INTO `notasinnsolDB`.`Notes` (
  `NO_Folio`, `NO_Subtotal`, `NO_Init_Date`, `NO_End_Date`, 
  `NO_Iva`, `NO_Riva`, `NO_Isr`, `NO_Total`
) VALUES (
  'FOLIO001', 120.00, '2023-01-01', '2023-01-10', 
  15.00, 2.50, 3.00, 140.50
),
(
  'FOLIO002', 150.00, '2023-02-01', '2023-02-15', 
  22.50, 3.75, 4.50, 180.75
),
(
  'FOLIO003', 200.00, '2023-03-01', '2023-03-20', 
  30.00, 5.00, 6.00, 241.00
);

-- Insertar tipos de clientes de prueba
INSERT INTO `notasinnsolDB`.`TypesOfClients` (`TC_Name`, `TC_Description`)
VALUES
('Prospecto', 'persona o entidad que muestra interés o potencial interés en adquirir productos o servicios de la empresa'),
('Cliente Regular', 'Clientes habituales con compras regulares.'),
('Cliente VIP', 'Clientes de alto valor y beneficios exclusivos.');


-- Insertar datos de prueba para la tabla Client_Type
-- Asociar un cliente existente con un tipo de cliente existente
INSERT INTO `notasinnsolDB`.`Client_Type` (`CT_CL_Id`, `CT_TC_Id`)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 2),
(6, 3),
(7, 1),
(8, 2),
(9, 3);


-- Insertar datos de prueba para la tabla Client_Notes
INSERT INTO `notasinnsolDB`.`Client_Notes` (`CN_CL_Id`, `CN_NO_Id`)
VALUES
(2, 1),
(5, 2),
(8, 3);


-- Insertar datos para asociar una compañia con sus clientes
INSERT INTO `notasinnsolDB`.`Company_Clients` (`CC_CO_Id`, `CC_CL_Id`) VALUES (1, 1), (1,2),(1,3);

-- Insertar datos para asociar una compañia con sus clientes
INSERT INTO `notasinnsolDB`.`Company_Clients` (`CC_CO_Id`, `CC_CL_Id`) VALUES (2, 4), (2,5),(2,6);

-- Insertar datos para asociar una compañia con sus clientes
INSERT INTO `notasinnsolDB`.`Company_Clients` (`CC_CO_Id`, `CC_CL_Id`) VALUES (3, 7), (3,8),(3,9);



-- Insertar datos para asociar el Usuario con ID n a la Empresa con ID n
INSERT INTO `notasinnsolDB`.`Company_Users` (`CU_CO_Id`, `CU_US_Id`) VALUES (1, 1), (2,2),(3,3);


-- Insertar datos para asociar el Usuario con ID 1 a la Nota con ID 1
INSERT INTO `notasinnsolDB`.`User_Notes` (`UN_US_Id`, `UN_NO_Id`) VALUES (1, 1);

-- Insertar datos para asociar el Usuario con ID 2 a la Nota con ID 2
INSERT INTO `notasinnsolDB`.`User_Notes` (`UN_US_Id`, `UN_NO_Id`) VALUES (2, 2);

-- Insertar datos para asociar el Usuario con ID 3 a la Nota con ID 3
INSERT INTO `notasinnsolDB`.`User_Notes` (`UN_US_Id`, `UN_NO_Id`) VALUES (3, 3);


-- Insertar datos para la tabla TypesOfNotes
INSERT INTO `notasinnsolDB`.`TypesOfNotes` (`TN_Name`, `TN_Percentage`) VALUES
('sin Iva', 0.00),
('Iva', 16.00),
('Iva pf', 8.00),
('Iva pm', 0.00);


-- Insertar datos para asociar la Nota con ID 1 al Tipo con ID 1
INSERT INTO `notasinnsolDB`.`Note_Type` (`NT_NO_Id`, `NT_TY_Id`) VALUES (1, 1);

-- Insertar datos para asociar la Nota con ID 2 al Tipo con ID 2
INSERT INTO `notasinnsolDB`.`Note_Type` (`NT_NO_Id`, `NT_TY_Id`) VALUES (2, 2);

-- Insertar datos para asociar la Nota con ID 3 al Tipo con ID 3
INSERT INTO `notasinnsolDB`.`Note_Type` (`NT_NO_Id`, `NT_TY_Id`) VALUES (3, 1);


-- Insertar datos para asociar la Nota con ID 401 al Producto con ID 1
INSERT INTO `notasinnsolDB`.`Note_Products` (`NP_NO_Id`, `NP_PR_Id`, `NP_Quantity`, `NP_Amount`) VALUES (1, 3, 1,120.00);

-- Insertar datos para asociar la Nota con ID 402 al Producto con ID 2
INSERT INTO `notasinnsolDB`.`Note_Products` (`NP_NO_Id`, `NP_PR_Id`, `NP_Quantity`, `NP_Amount`) VALUES (2, 1, 1, 150.00);

-- Insertar datos para asociar la Nota con ID 403 al Producto con ID 3
INSERT INTO `notasinnsolDB`.`Note_Products` (`NP_NO_Id`, `NP_PR_Id`, `NP_Quantity`, `NP_Amount`) VALUES (3, 2, 1, 200.00);


select n.NO_Folio, p.PR_Price, p.PR_Name, np.NP_Quantity, np.NP_Amount from note_products np, notes n, products p where n.NO_Id = np.NP_NO_Id and p.PR_Id = np.NP_PR_Id ;

-- Insertar en TypesOfUsers
INSERT INTO `notasinnsolDB`.`TypesOfUsers` (`TU_Id`, `TU_Name`, `TU_Description`) 
VALUES (1, 'Administrador', 'Este tipo de usuario tiene acceso a todas las funcionalidades'),
		(2, 'Empleado', 'Este tipo de usuario tiene acceso a las funcionalidades basicas'),
        (3, 'Vendedor', 'Este tipo de usuario tiene acceso a las funcionalidades basicas mas los prospectos') ;

-- Insertar en User_Type
INSERT INTO `notasinnsolDB`.`User_Type` (`UT_US_Id`, `UT_TY_Id`) VALUES (1, 1),  (2, 2),  (3, 3);


-- Insertar en Labels
INSERT INTO `notasinnsolDB`.`Labels` (
  `LA_CO_Id`,
  `LA_Date`,
  `LA_Foil`,
  `LA_Init_Date`,
  `LA_End_Date`,
  `LA_Name_Cl`,
  `LA_Email_Cl`,
  `LA_Telephone_Cl`,
  `LA_Direction_Cl`,
  `LA_Type_Note_Cl`,
  `LA_Catalogue_Services`,
  `LA_Id_Service`,
  `LA_Service`,
  `LA_Name_Service`,
  `LA_Add_Service`,
  `LA_Delete_Service`,
  `LA_Consult`,
  `LA_Description`,
  `LA_Quantity`,
  `LA_Unit_Price`
) VALUES (
  1,
  'Fecha',
  'Folio',
  'Fecha inicial',
  'Fecha de termino',
  'Nombre del Cliente',
  'Correo del Cliente',
  'Numero telephonico del Cliente',
  'Dirección del Cliente',
  'Tipo de Nota',
  'Servicios del Catálogo',
  'Identificador del servicio',
  'Servicio',
  'Nombre del Servicio',
  'Servicio Adicional',
  'Eliminar Servicio',
  'Consulta',
  'Descripción',
  'Cantidad',
  'Precio Unitario'
),
(
  2,
  'Fecha',
  'Folio',
  'Fecha inicial',
  'Fecha de termino',
  'Nombre del Cliente',
  'Correo del Cliente',
  'Numero telephonico del Cliente',
  'Dirección del Cliente',
  'Tipo de Nota',
  'Servicios del Catálogo',
  'Identificador del servicio',
  'Servicio',
  'Nombre del Servicio',
  'Servicio Adicional',
  'Eliminar Servicio',
  'Consulta',
  'Descripción',
  'Cantidad',
  'Precio Unitario'
),
(
  3,
  'Fecha',
  'Folio',
  'Fecha inicial',
  'Fecha de termino',
  'Nombre del Cliente',
  'Correo del Cliente',
  'Numero telephonico del Cliente',
  'Dirección del Cliente',
  'Tipo de Nota',
  'Servicios del Catálogo',
  'Identificador del servicio',
  'Servicio',
  'Nombre del Servicio',
  'Servicio Adicional',
  'Eliminar Servicio',
  'Consulta',
  'Descripción',
  'Cantidad',
  'Precio Unitario'
);

-- Insertar en Company_Products
INSERT INTO `notasinnsolDB`.`Company_Products` (`CP_CO_Id`, `CP_PR_Id`) VALUES (1, 3),  (2, 1),  (3, 2);




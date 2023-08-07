Use NotasRem;
DROP DATABASE NotasInnsol
Create DATABASE NotasInnsol;
Use NotasInnsol;
Create table EmpresaC
(
	ID_Empresa char(150)Not NULL,
	CodigoE varchar(18) NOt NULL,
	Tema	text NOT NULL,
	Correo varchar(50) NOT NULL,
	personaCont varchar(50) NOT NULL,
	Pass char(255) NOT NULL,
	WebS char(100) NOT NULL,
	TelE char(15) NOT NULL,
	DireccionF varchar(300) NOT NULL,
	Primary key(ID_Empresa),
	Constraint Indentificador Unique(CodigoE)
);

INSERT INTO EmpresaC VALUES ('SAARME','SA','CSS/estilos.css', 'corpoarativosaarme@outlook.com','Luis Sanchez', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'https://corporativosaarme.com/','5546863772','Cuauhtémoc
Ciudad de México, MX');
INSERT INTO EmpresaC VALUES ('MICROSOFT','MS','CSS/estilos.css', 'Microsoft@outlook.com','Luis Sanchez', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'https://www.microsoft.com/es-mx','7474747474','jhwevfhewfhbehfbhjew');
INSERT INTO EmpresaC VALUES ('GOOGLE','GG','CSS/estilos.css', 'google@outlook.com','Luis Sanchez', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'https://www.google.com/','1234567890','whfgwefjewjk');

Create Table ServiciosProductos(
	CEmpresa varchar(18) NOT NULL,
	NombrePS char(50) NOT NULL,
	PrecioU  char(15) NOT NULL,
	DescripP	varchar(500) NOT NULL,
	Primary Key (NombrePS),
	Foreign key (CEmpresa) REFERENCES EmpresaC(CodigoE)
);

INSERT INTO ServiciosProductos values ('SA', 'Consultoria365', '15000','Desarrollo y orientacion especializada');
INSERT INTO ServiciosProductos values ('MS', 'OneDrive', '75000','Almacenamiento en servidor');
INSERT INTO ServiciosProductos values ('SA', 'MarketingD', '1000','orientacion y apoyo en Marketing digital');
INSERT INTO ServiciosProductos values ('SA', 'ConsultoriaWeb', '35000','consutoria para desarrollo web');
INSERT INTO ServiciosProductos values ('GG', 'GMAIL', '4300','Servicio de Correos Electronicos');
INSERT INTO ServiciosProductos values ('GG', 'DRIVE', '7000','servicio de almacenamiento en Nube');
INSERT INTO ServiciosProductos values ('MS', 'MicrosoftBuilding', '80000','servicio de IA');
INSERT INTO ServiciosProductos values ('MS', 'SQL SERVER', '6500','Servicio de consulta o desarrolloen SQL server');
INSERT INTO ServiciosProductos values ('MS', 'COpilot', '70867','Servicio de IA');

CREATE TABLE UsuariosS (
	NombreU char(25) NOT NULL,
	App_U char(20) NOT NULL,
	Apm_U char(20) NOT NULL,
	Tipo varchar(15) NOT NULL,
	Area char(15) NOT NULL,
	Correo varchar(50) NOT NULL,
	Pass char(255) NOT NULL,
	Id_empresa varchar(18) Not NULL,
	PRIMARY KEY (Correo),
	CHECK (NombreU NOT LIKE '%[0-9,`,~,!,@,#,$,^,&,*,(,),-,_,=,+,[,{,}.\,|,;,:,",,,<,.,>,/,?]%'),
	CHECK (App_U NOT LIKE '%[0-9,`,~,!,@,#,$,^,&,*,(,),-,_,=,+,[,{,}.\,|,;,:,",,,<,.,>,/,?]%'),
	CHECK (Apm_U NOT LIKE '%[0-9,`,~,!,@,#,$,^,&,*,(,),-,_,=,+,[,{,}.\,|,;,:,",,,<,.,>,/,?]%'),
	CHECK (Area NOT LIKE '%[0-9,`,~,!,@,#,$,^,&,*,(,),-,_,=,+,[,{,}.\,|,;,:,",,,<,.,>,/,?]%'),
	FOREIGN KEY (Id_empresa) References EmpresaC(CodigoE)
);


INSERT into UsuariosS values('Alejandro', 'Bernal', 'Flores', 'COMPLETO', 'Desarrollo', 'lolbernal1@gmail.com','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'SA');
INSERT into UsuariosS values('Alejandro', 'Perez', 'Flores', 'INNSOL', 'Desarrollo', 'lol1@gmail.com','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'MS');
INSERT into UsuariosS values('Alejandro', 'Saenz', 'Flores', 'NOTAS', 'Desarrollo', 'lolbe2@gmail.com','e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'GG');
Update UsuariosS
set Pass = '4062207243226d1b284d6a4c11bb0f8d6b296113ecea1b10fa209a623718c6ab';
CREATE TABLE ProspectosS (
	ID_u varchar(50) NOT NULL,
	Nom_Prosp char(80) NOT NULL,
	Numero numeric(10) NOT NULL,
	Domicilio char(150) NOT NULL,
	Estado_C numeric(2) NOT NULL,
	Correo_C varchar(50) NOT NULL,
	Tipo_C char(20) NOT NULL,
	PRIMARY KEY (Correo_C),	
	FOREIGN KEY (ID_u) REFERENCES UsuariosS(Correo),
	CHECK (Nom_Prosp NOT LIKE '%[0-9,`,~,!,@,#,$,^,&,*,(,),-,_,=,+,[,{,}.\,|,;,:,",,,<,.,>,/,?]%'),
	CHECK (Domicilio NOT LIKE '%[`,~,!,@,#,$,^,&,*,(,),-,_,=,+,[,{,}.\,|,;,:,",<,.,>,/,?]%')
);
INSERT INTO ProspectosS VALUES ('lolbernal1@gmail.com', 'Cabañas Maldivas', 5568156702, 'CDMX Tlahuac', 01, 'Cabañasmaldivas@outlook.com', 'Capacitación');
INSERT INTO ProspectosS VALUES ('lol1@gmail.com', 'Restaurante', 5568157364, 'CDMX Tlahuac', 03, 'Restaurante@outlook.com', 'Capacitación');
INSERT INTO ProspectosS VALUES ('lolbe2@gmail.com', 'Papeleria', 5568150129, 'CDMX Tlahuac', 07, 'Papeleria@outlook.com', 'Capacitación');

CREATE TABLE NotasS (
	CodigoE varchar(18) NOT NULL,
	IDCliente varchar(50) not null,
	ID_Us varchar(50) NOT NULL,
	FOLIO varchar (07) NOT NULL,
	NomSer varchar(120) NOT NULL,
	Cantidad varchar(12) NOT NULL,
	precio varchar(12) NOT NULL,
	importe varchar(12) NOT NULL,
	NomSer2 varchar(120) NOT NULL,
	Cantidad2 varchar(12) NOT NULL,
	precio2 varchar(12) NOT NULL,
	importe2 varchar(12) NOT NULL,
	NomSer3 varchar(120) NOT NULL,
	Cantidad3 varchar(12) NOT NULL,
	precio3 varchar(12) NOT NULL,
	importe3 varchar(12) NOT NULL,
	NomSer4 varchar(120) NOT NULL,
	Cantidad4 varchar(12) NOT NULL,
	precio4 varchar(12) NOT NULL,
	importe4 varchar(12) NOT NULL,
	subtotal varchar(18) NOT NULL,
	FechaRegistro datetime NOT NULL,
	FECHAI date NOT NULL,
	FECHAT date NOT NULL,
	IVA varchar(30) NOT NULL,
	RIVA varchar(30) NOT NULL,
	ISR varchar(30) NOT NULL,
	Total varchar(30) NOT NULL,
	NombreC varchar(20) NOT NULL,
	TipoNota varchar(30) NOT NULL,	
	FOREIGN KEY (ID_Us) REFERENCES UsuariosS(Correo),
	Foreign KEY  (IDCliente) References ProspectosS(Correo_C),
	CONSTRAINT Folios UNIQUE (FOLIO)
);

 INSERT INTO NotasS values('SA','Papeleria@outlook.com','lolbernal1@gmail.com','SA4','Consultoria365','3','15000','45000',
	'Consultoria365','3','15000','45000',
	'Consultoria365','3','15000','45000',
	'Consultoria365','3','15000','45000',
	'180000', '2023-08-03 05:08:18', '2023-08-23', '2023-08-30', '28800','3000', '54000','828282828282', 'Papeleria', 'Persona Moral'
 ),
 ('SA','Papeleria@outlook.com','lolbernal1@gmail.com','SA2','Consultoria365','3','15000','45000',
	'Consultoria365','3','15000','45000',
	'Consultoria365','3','15000','45000',
	'Consultoria365','3','15000','45000',
	'180000', '2023-08-03 04:53:18', '2023-08-23', '2023-08-30', '28800','3000', '54000','828282828282', 'Papeleria', 'Persona Moral'
 ),
 ('MC','Papeleria@outlook.com','lolbernal1@gmail.com','SA3','Consultoriasdasad365','3','15000','45000',
	'Consultorasdsadia365','3','15000','45000',
	'Consultordadasia365','3','15000','45000',
	'Consultordadia365','3','15000','45000',
	'180000', '2023-08-03 04:53:18', '2023-08-23', '2023-08-30', '28800','3000', '54000','828282828282', 'Papeleria', 'Persona Moral'
 );






CREATE TABLE ProductoS (
	ID_U varchar(50) NOT NULL,
	ID_CL varchar(50) NOT NULL,
	Tipo_Producto char(50) NOT NULL,
	FechaInicio date NOT NULL,
	FechaContrato date NOT NULL,
	FechaPago date NOT NULL,
	FechaTermino date NOT NULL,
	FOREIGN KEY (ID_CL) REFERENCES ProspectosS(Correo_C),
	FOREIGN KEY (ID_U) REFERENCES UsuariosS(Correo),
	Foreign key (Tipo_Producto) REFERENCES ServiciosProductos(NombrePS)	
);



INSERT INTO ProductoS values ( 'lolbernal1@gmail.com', 'Cabañasmaldivas@outlook.com', 'Consultoria365', '2023-07-08', '2023-07-05', '2023-07-06', '2023-08-30');
INSERT INTO ProductoS values ( 'lolbernal1@gmail.com', 'Cabañasmaldivas@outlook.com', 'COpilot', '2023-07-08', '2023-07-05', '2023-07-06', '2023-08-30');
INSERT INTO ProductoS values ( 'lol1@gmail.com', 'Restaurante@outlook.com', 'GMAIL', '2023-07-08', '2023-07-05', '2023-07-06', '2023-08-30');
INSERT INTO ProductoS values ( 'lol1@gmail.com', 'Restaurante@outlook.com', 'OneDrive', '2023-07-08', '2023-07-05', '2023-07-06', '2023-08-30');
INSERT INTO ProductoS values ( 'lolbe2@gmail.com', 'Papeleria@outlook.com', 'Consultoria365', '2023-07-08', '2023-07-05', '2023-07-06', '2023-08-30');
INSERT INTO ProductoS values ( 'lolbe2@gmail.com', 'Papeleria@outlook.com', 'MarketingD', '2023-07-08', '2023-07-05', '2023-07-06', '2023-08-30');
INSERT INTO ProductoS values ( 'lolbe2@gmail.com', 'Papeleria@outlook.com', 'COpilot', '2023-07-08', '2023-07-05', '2023-07-06', '2023-08-30');

INSERT INTO NotasS (IDCliente, ID_Us,
FOLIO, Nomser, Cantidad, precio, importe,
Nomser2, Cantidad2, precio2, importe2,
Nomser3, Cantidad3, precio3, importe3,
Nomser4, Cantidad4, precio4, importe4,
subtotal, FechaRegistro, FECHAI, FECHAT,
IVA, RIVA, ISR,Total, NombreC, TipoNota) 
Values ('$corrCliente','$correU','$folio',
'$descripcion','$cantidad','$precio','$importe',
'$descripcion2','$cantidad2','$precio2','$importe2',
'$descripcion3','$cantidad3','$precio3','$importe3',
'$descripcion4','$cantidad4','$precio4','$importe4',
'$subtotal','fechaR','fechaI','fechaT','$iva','$riva',
'$risr','$total','$nomCliente','tipoNota');

SELECT * From ProspectosS;
SELECT ProspectosS.Nom_Prosp, ProspectosS.Correo_C, ProspectosS.Numero, ProspectosS.Estado_C, UsuariosS.Correo, UsuariosS.NombreU  FROM ProspectosS JOIN UsuariosS on UsuariosS.Correo = 'lolbernal1@gmail.com' ;
select MAX(FechaInicio) as Reciente from ProductoS where ID_CL = 'Papeleria@outlook.com';
 Select * from ServiciosProductos;
 Select * from NotasS;
SELECT FOLIO
FROM NotasS
WHERE FechaRegistro = (
    SELECT MAX(FechaRegistro)
    FROM NotasS where ID_Us = 'lolbernal1@gmail.com' 
);

 Select Id_empresa from UsuariosS where Correo = 'lolbernal1@gmail.com';

CREATE DATABASE SESNA;
USE sesna;
CREATE TABLE Personas
(	
	idPersona			INT AUTO_INCREMENT PRIMARY KEY,
	nombres				VARCHAR(70) NOT NULL,
	apellidos			VARCHAR(70) NOT NULL,
	tipoDocumento		CHAR(3) DEFAULT 'DNI', -- DNI
	nroDocumento		CHAR(12) NOT NULL,
	nroCelular			CHAR(9) NOT NULL,
	email					VARCHAR(70) NOT NULL,
	CONSTRAINT ck_tipoDoc_tPersona CHECK (tipoDocumento IN('DNI','CE')),
	CONSTRAINT ck_nroDoc_tPersona UNIQUE(nroDocumento),
	CONSTRAINT ck_nroCel_tPersona UNIQUE(nroCelular),
	CONSTRAINT ck_email_tPersona UNIQUE(email)
)ENGINE = INNODB;
-- -----------------------------------------------------------------------------------
CREATE TABLE Usuarios
(
	idUsuario			INT AUTO_INCREMENT PRIMARY KEY,
	idPersona			INT NOT NULL,
	nombreUsuario		VARCHAR(50) NOT NULL,
	claveAccesso		VARCHAR(50) NOT NULL,
	rol 					CHAR(5) DEFAULT 'Host', -- Host
	estado				CHAR(8) DEFAULT 'Activo', -- Activo
	CONSTRAINT fk_idPersona_tUsuarios FOREIGN KEY(idPersona) REFERENCES Personas(idPersona),
	CONSTRAINT ck_nombreUsuario_tUsuarios UNIQUE(nombreUsuario),
	CONSTRAINT ck_rol_tUsuarios CHECK (rol IN('Admin','Host')),
	CONSTRAINT ck_estado_tUsuarios CHECK (estado IN('Activo','Inactivo'))
)ENGINE = INNODB;
-- -----------------------------------------------------------------------------------
CREATE TABLE Carrera
(
	idCarrera			INT AUTO_INCREMENT PRIMARY KEY,
	nombreCarrera		VARCHAR(70) NOT NULL,
	descripcion			VARCHAR(100) NOT NULL,
	duracion				TINYINT NOT NULL,
	ciclos				TINYINT NOT NULL,
	estado				CHAR(8) DEFAULT 'Activo', -- Activo
	CONSTRAINT ck_nombreCarrera_tCarrera UNIQUE (nombreCarrera),
	CONSTRAINT ck_estado_tCarrera CHECK (estado IN('Activo','Inactivo'))
)ENGINE = INNODB;
-- -----------------------------------------------------------------------------------
CREATE TABLE Postulante
(
	idPostulante		INT AUTO_INCREMENT PRIMARY KEY,
	idPersona			INT NOT NULL,
	idCarrera			INT NOT NULL,
	fechaPostulacion	DATE DEFAULT NOW(),
	estado				CHAR(8) DEFAULT 'Activo', -- Activo
	CONSTRAINT fk_idPersona_tPostulante FOREIGN KEY(idPersona) REFERENCES Personas(idPersona),
	CONSTRAINT fk_idCarrera_tPostulante FOREIGN KEY(idCarrera) REFERENCES Carrera(idCarrera),
	CONSTRAINT ck_estado_tPostulante CHECK (estado IN('Activo','Inactivo'))
)ENGINE = INNODB;
-- -----------------------------------------------------------------------------------
CREATE TABLE Matricula
(
	idMatricula			INT AUTO_INCREMENT PRIMARY KEY,
	idPostulante		INT NOT NULL,
	idCarrera			INT NOT NULL,
	certEstudios		CHAR(9) DEFAULT 'Pendiente',
	foto					VARCHAR(100) NULL,
	certAntPoliciales	CHAR(9) DEFAULT 'Pendiente',
	fechaMatricula		DATETIME NULL,
	precioMatricula	DECIMAL(5,2) NOT NULL,
	estado				CHAR(8) DEFAULT 'Activo',
	CONSTRAINT fk_idPostulante_tMatricula FOREIGN KEY(idPostulante) REFERENCES Postulante(idPostulante),
	CONSTRAINT fk_idCarrera_tMatricula FOREIGN KEY(idCarrera) REFERENCES Carrera(idCarrera),
	CONSTRAINT ck_certEstudios_tMatricula CHECK (certEstudios IN('Pendiente','Recibido')),
	CONSTRAINT ck_certAntPoliciales_tMatricula CHECK (certAntPoliciales IN('Pendiente','Recibido')),
	CONSTRAINT ck_estado_tMatricula CHECK (estado IN('Activo','Inactivo'))
)ENGINE = INNODB;
-- -----------------------------------------------------------------------------------
CREATE TABLE Pagos
(
	idPago				INT AUTO_INCREMENT PRIMARY KEY,
	idMatricula			INT NOT NULL,
	metodoPago			CHAR(8) DEFAULT 'Efectivo',
	fechaPago			DATETIME NULL,
	montoTotal			DECIMAL(5,2) NOT NULL,
	estado				CHAR(8) DEFAULT 'Activo',
	CONSTRAINT fk_idMatricula_tPagos FOREIGN KEY (idMatricula) REFERENCES Matricula (idMatricula),
	CONSTRAINT ck_metodoPago_tPagos CHECK (metodoPago IN ('Efectivo','Deposito','Yape','Plin')),
	CONSTRAINT ck_estado_tPagos CHECK (estado IN('Activo','Inactivo'))
)ENGINE = INNODB;
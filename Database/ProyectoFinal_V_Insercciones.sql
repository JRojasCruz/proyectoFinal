-- Inserción de personas
INSERT INTO Personas (nombres, apellidos, tipoDocumento, nroDocumento, nroCelular, email)
VALUES	('Jesus','Rojas', 'DNI','74036049','902336311','jesus.rojas.cm@gmail.com'),
		('Olivia','Casas', 'DNI','84956833','956529630','olivia@gmail.com'),
		('Luis','Puma', 'DNI','21859644','958741029','luis@gmail.com'),
		('Matias','Pomalagua', 'DNI','75869241','945812063','matias@gmail.com');
        
SELECT * FROM personas;
-- Inserción de Usuarios
INSERT INTO Usuarios (idpersona, nombreUsuario, claveAcceso,rol)
VALUES ('1','JESUS','$2y$10$jtjzJBlRRzKmcQ5YZGCTxemKXLEtI7Bxe96XeogoNXdL4jxsZOCEW','Admin');

SELECT * FROM usuarios;

-- Insercion de Carreras
INSERT INTO Carrera		(nombreCarrera, descripcion, precioInscripcion, duracion,semestres,cuotasPorSemestre,precioPorCuota)
			VALUES 		('Ingeniería de Software', 'El profesional técnico en Ingenieria de Software con Inteligencia Artificial está capacitado,para aplicar principios, técnicas, herramientas y métodos para el diseño, desarrollo, implementación, mantenimiento ,y gestión de sistemas de información con Inteligencia Artificial', 450, '3 años',6,4,308),
                        ('Mecánico automotriz', 'El profesional técnico en Mecánica Automotriz está capacitado para conducir, con autonomía, un puesto de trabajo en función a las exigencias técnicas y de calidad de servicio en el sector automotriz, teniendo en cuenta los aspectos ambientales, de seguridad y de salud.', 560, '3 años',6,4,498);

SELECT * FROM Carrera;
-- Inserción de Postulantes
INSERT INTO Postulante (idPersona, idCarrera) 
		VALUES 	(2,1),
				(3,2),
                (4,2);
                
SELECT * FROM Postulante;

INSERT INTO Matricula 	(idPostulante, certEstudios,certAntPoliciales, fechaMatricula)
			VALUES 	(1,'Pendiente', 'Pendiente', now()),
					(2,'Pendiente', 'Pendiente', now()),
                    (3,'Pendiente', 'Pendiente', now());
SELECT * FROM Matricula;

INSERT INTO Pagos(idMatricula,montoTotal)
			VALUES(3,565);
SELECT * FROM Pagos;

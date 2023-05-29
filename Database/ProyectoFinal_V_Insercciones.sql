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
			VALUES 	('Ingeniería de Software', 'El profesional técnico en Ingenieria de Software con Inteligencia Artificial está capacitado,para aplicar principios, técnicas, herramientas y métodos para el diseño, desarrollo, implementación, mantenimiento ,y gestión de sistemas de información con Inteligencia Artificial', 450, '3 años',6,4,308),
                  ('Mecánico automotriz', 'El profesional técnico en Mecánica Automotriz está capacitado para conducir, con autonomía, un puesto de trabajo en función a las exigencias técnicas y de calidad de servicio en el sector automotriz, teniendo en cuenta los aspectos ambientales, de seguridad y de salud.', 560, '3 años',6,4,498),
						('Arquitectura', 'Enfoque en el diseño y construcción de espacios habitables, considerando aspectos estéticos, funcionales y estructurales.', 600, '5 años', 10, 8, 550),
						('Ingeniería Industrial', 'Aplicación de principios científicos y matemáticos para diseñar, mejorar y optimizar sistemas de producción y operaciones.', 700, '4 años', 8, 6, 650),
						('Administración de Empresas', 'Gestión eficiente de recursos y liderazgo en organizaciones, tomando decisiones estratégicas para alcanzar objetivos empresariales.', 550, '4 años', 8, 6, 500),
						('Psicología', 'Estudio de la mente y el comportamiento humano, aplicando técnicas y terapias para promover el bienestar emocional y mental.', 450, '5 años', 10, 8, 400),
						('Diseño Gráfico', 'Creatividad y comunicación visual, utilizando herramientas digitales y técnicas de diseño para transmitir mensajes de manera efectiva.', 500, '4 años', 8, 6, 450),
						('Ingeniería Eléctrica', 'Diseño, desarrollo y mantenimiento de sistemas eléctricos, incluyendo generación, distribución y control de energía eléctrica.', 650, '5 años', 10, 8, 600),
						('Derecho', 'Estudio y aplicación de las leyes y normas jurídicas para garantizar la justicia y resolver conflictos legales en diferentes ámbitos.', 700, '5 años', 10, 8, 650),
						('Marketing', 'Planificación y ejecución de estrategias de marketing para promover productos y servicios, analizando el comportamiento del consumidor.', 550, '4 años', 8, 6, 500),
						('Enfermería', 'Atención y cuidado de pacientes, promoción de la salud y prevención de enfermedades en distintos entornos de atención médica.', 600, '5 años', 10, 8, 550),
						('Comunicación Social', 'Estudio de los procesos de comunicación y medios de difusión, abordando la creación y gestión de contenidos en diferentes plataformas.', 500, '4 años', 8, 6, 450);

SELECT * FROM Carrera;
-- Inserción de Postulantes
INSERT INTO Postulante (idPersona, idCarrera) 
		VALUES 	(2,1),
				(3,2),
                (4,2);
                
SELECT * FROM Postulante;

INSERT INTO Matricula 	(idPostulante, certEstudios,certAntPoliciales, fechaMatricula)
			VALUES 	(1,'Pendiente', 'Pendiente', NOW()),
					(2,'Pendiente', 'Pendiente', now()),
                    (3,'Pendiente', 'Pendiente', now());
SELECT * FROM Matricula;

INSERT INTO MetodoPago (idMetodoPago, metodoPago)
VALUES (1, 'Yape'),
       (2, 'Efectivo'),
       (3, 'Plin'),
       (4, 'Transferencia');
select * from metodopago;
INSERT INTO Pagos(idMatricula,idMetodoPago)
			VALUES		(1,1),
						(2,3),
						(3,4);
SELECT * FROM Pagos;


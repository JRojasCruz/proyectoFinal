-- Inserción de personas
INSERT INTO Personas (nombres, apellidos, tipoDocumento, nroDocumento, nroCelular, email)
VALUES	('Jesus','Rojas', 'DNI','74036049','902336311','jesus.rojas.cm@gmail.com'),
		('Olivia','Casas', 'DNI','84956833','956529630','olivia@gmail.com'),
		('Luis','Puma', 'DNI','21859644','958741029','luis@gmail.com'),
		('Matias','Pomalagua', 'DNI','75869241','945812063','matias@gmail.com'),
		('Carlos', 'González', 'DNI', '45678912', '987654321', 'carlos@example.com'),
		('María', 'López', 'DNI', '12345678', '555555555', 'maria@example.com'),
		('Juan', 'Martínez', 'DNI', '98765432', '123456789', 'juan@example.com'),
		('Laura', 'Gómez', 'DNI', '65432198', '999999999', 'laura@example.com'),
		('Pedro', 'Sánchez', 'DNI', '78945612', '111111111', 'pedro@example.com'),
		('Ana', 'Rodríguez', 'DNI', '85296374', '444444444', 'ana@example.com'),
		('Luis', 'Hernández', 'DNI', '36985214', '888888888', 'luis@example.com'),
		('Marta', 'Fernández', 'DNI', '14785236', '222222222', 'marta@example.com'),
		('Alejandro', 'Torres', 'DNI', '96325874', '666666666', 'alejandro@example.com'),
		('Sofía', 'Pérez', 'DNI', '25896314', '333333333', 'sofia@example.com');
        
INSERT INTO Usuarios (idpersona, nombreUsuario, claveAcceso,rol)
VALUES ('1','JESUS','$2y$10$jtjzJBlRRzKmcQ5YZGCTxemKXLEtI7Bxe96XeogoNXdL4jxsZOCEW','Admin');
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

-- Inserción de Postulantes
INSERT INTO Postulante (idPersona, idCarrera) 
		VALUES 	(2,1),
				(3,2),
				(4,3),
				(5,4),
				(6,5),
				(7,6),
				(8,7),
				(9,8),
				(10,9);
                
INSERT INTO Matricula 	(idPostulante, fechaMatricula)
			VALUES 		(1,NOW()),
							(2,NOW()),
							(3,NOW()),
							(4,NOW()),
							(5,NOW()),
							(6,NOW()),
							(7,NOW()),
							(8,NOW()),
							(9,NOW());

INSERT INTO MetodoPago (idMetodoPago, metodoPago)
VALUES (1, 'Yape'),
       (2, 'Efectivo'),
       (3, 'Plin'),
       (4, 'Transferencia');

INSERT INTO Pagos(idMatricula,idMetodoPago)
			VALUES		(1,1),
							(2,3),
							(3,2),
							(4,3),
							(5,1),
							(6,4),
							(7,3),
							(8,1),
							(9,2);


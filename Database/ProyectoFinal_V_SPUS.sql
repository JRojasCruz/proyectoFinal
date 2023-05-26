DELIMITER $$
CREATE PROCEDURE spu_user_login (IN _nombreUsuario VARCHAR(100))
BEGIN
SELECT	usuarios.idUsuario, personas.nombres, personas.apellidos,
		usuarios.nombreUsuario, usuarios.claveAcceso,personas.email,
		usuarios.rol
		FROM usuarios
		INNER JOIN personas ON personas.idPersona = usuarios.idPersona
		WHERE nombreUsuario = _nombreUsuario;
END $$
-- Procedimiento para mostrar las matriculas por carrera
DELIMITER $$
CREATE PROCEDURE spu_grafico_carreras()
BEGIN
SELECT 	carrera.idCarrera,
		carrera.nombreCarrera,
		COUNT(postulante.idPostulante) AS 'Postulantes'
	FROM carrera
		INNER JOIN postulante ON postulante.idCarrera = carrera.idCarrera
		GROUP BY carrera.idCarrera, carrera.nombreCarrera;
END $$
use sesna;
DELIMITER $$
CREATE PROCEDURE spu_grafico_estadopagos()
BEGIN
SELECT 	pagos.estadoPago, matricula.idMatricula,
		COUNT(pagos.estadoPago) AS 'Pagos'
        FROM pagos
        INNER JOIN matricula ON matricula.idMatricula = pagos.idMatricula
        GROUP BY pagos.estadoPago;
END$$
call spu_grafico_estadopagos;
-- Procedimiento para listar a los matriculados
DELIMITER $$
CREATE PROCEDURE spu_listar_matriculados()
BEGIN
SELECT personas.nroDocumento, personas.nombres, personas.apellidos,
       carrera.nombreCarrera, matricula.certEstudios, matricula.foto, matricula.certAntPoliciales,
       matricula.estado
FROM matricula
INNER JOIN postulante ON postulante.idPostulante = matricula.idPostulante
INNER JOIN personas ON personas.idPersona = postulante.idPersona
INNER JOIN carrera ON carrera.idCarrera = postulante.idCarrera;
END$$
CALL spu_listar_matriculados();

-- Procedimiento para mostrar al postulante y su carrera
	SELECT 	postulante.idPostulante, personas.nombres, personas.apellidos,
			personas.tipoDocumento, personas.nroDocumento, personas.nroCelular,
            carrera.nombreCarrera
            FROM postulante
            INNER JOIN personas ON personas.idPersona = postulante.idPostulante
            INNER JOIN carrera ON carrera.idCarrera = postulante.idCarrera;
-- Procedimiento para mostrar el estado de la matricula por Carrera

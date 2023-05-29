-- PROCEDIMIENTO PARA VALIDAR LA SESION DEL USUARIO
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

-- PROCEDIMIENTO PARA MOSTRAR EL GRAFICO DEL ESTADO DE LOS PAGOS
DELIMITER $$
CREATE PROCEDURE spu_grafico_estadopagos()
BEGIN
SELECT 	pagos.estadoPago, matricula.idMatricula,
		COUNT(pagos.estadoPago) AS 'Pagos'
        FROM pagos
        INNER JOIN matricula ON matricula.idMatricula = pagos.idMatricula
        GROUP BY pagos.estadoPago;
END$$

-- Procedimiento para listar a los matriculados
DELIMITER $$
CREATE PROCEDURE spu_listar_matriculados()
BEGIN
SELECT personas.nroDocumento, personas.nombres, personas.apellidos,
       carrera.nombreCarrera, matricula.certEstudiosEstado, matricula.fotoEstado, matricula.certAntPolicialesEstado,
       matricula.estado, pagos.estadoPago
FROM matricula
INNER JOIN postulante ON postulante.idPostulante = matricula.idPostulante
INNER JOIN personas ON personas.idPersona = postulante.idPersona
INNER JOIN carrera ON carrera.idCarrera = postulante.idCarrera
INNER JOIN pagos ON pagos.idPago = matricula.idMatricula
ORDER BY carrera.`nombreCarrera`;
END$$

-- PROCEDIMIENTO PARA REGISTRAR UNA MATRICULA:
DELIMITER $$
CREATE PROCEDURE spu_registrar_matricula(
    IN p_nombres VARCHAR(70),
    IN p_apellidos VARCHAR(70),
    IN p_tipoDocumento CHAR(3),
    IN p_nroDocumento CHAR(12),
    IN p_nroCelular CHAR(9),
    IN p_email VARCHAR(70),
    IN p_idCarrera INT,
    IN p_idMetodoPago INT
)
BEGIN
    DECLARE p_idPersona INT;
    DECLARE p_idPostulante INT;
    DECLARE p_idMatricula INT;

    -- Insertar en la tabla Personas
    INSERT INTO Personas (nombres, apellidos, tipoDocumento, nroDocumento, nroCelular, email)
    VALUES (p_nombres, p_apellidos, p_tipoDocumento, p_nroDocumento, p_nroCelular, p_email);

    SET p_idPersona = LAST_INSERT_ID();

    -- Insertar en la tabla Postulante
    INSERT INTO Postulante (idPersona, idCarrera, fechaPostulacion)
    VALUES (p_idPersona, p_idCarrera, NOW());

    SET p_idPostulante = LAST_INSERT_ID();

    -- Insertar en la tabla Matricula
    INSERT INTO Matricula (idPostulante, fechaMatricula)
    VALUES (p_idPostulante, NOW());

    SET p_idMatricula = LAST_INSERT_ID();

    -- Insertar en la tabla Pagos
    INSERT INTO Pagos (idMatricula, idMetodoPago, fechaPago, estadoPago)
    VALUES (p_idMatricula, p_idMetodoPago, NOW(), 'Pendiente');

END $$
DELIMITER ;
-- Probar SPU
-- CALL spu_registrar_matricula('John', 'Doe', 'DNI', '1234567890', '987654321', 'john.doe@example.com',1,3);

-- Procedimiento para registrar los PAGOS
DROP PROCEDURE IF EXISTS spu_procesar_pago;
DELIMITER $$
CREATE PROCEDURE spu_procesar_pago(IN p_nroDocumento INT, IN p_nuevoEstadoPago VARCHAR(50), IN p_nuevoEstadoMatricula VARCHAR(50))
BEGIN
    DECLARE v_certEstudiosEstado CHAR(9);
    DECLARE v_fotoEstado CHAR(9);
    DECLARE v_certAntPolicialesEstado CHAR(9);
    
    SELECT certEstudiosEstado, fotoEstado, certAntPolicialesEstado
    INTO v_certEstudiosEstado, v_fotoEstado, v_certAntPolicialesEstado
    FROM Matricula
    INNER JOIN Postulante ON Matricula.idPostulante = Postulante.idPostulante
    INNER JOIN Personas ON Postulante.idPersona = Personas.idPersona
    WHERE Personas.nroDocumento = p_nroDocumento;
    
    IF v_certEstudiosEstado = 'Recibido' AND v_fotoEstado = 'Recibido' AND v_certAntPolicialesEstado = 'Recibido' THEN
        UPDATE Pagos
        INNER JOIN Matricula ON Pagos.idMatricula = Matricula.idMatricula
        INNER JOIN Postulante ON Matricula.idPostulante = Postulante.idPostulante
        INNER JOIN Personas ON Postulante.idPersona = Personas.idPersona
        SET Pagos.estadoPago = p_nuevoEstadoPago,
            Matricula.estado = p_nuevoEstadoMatricula
        WHERE Personas.nroDocumento = p_nroDocumento;
        
        IF p_nuevoEstadoPago = 'Cancelado' THEN
            UPDATE Matricula
            INNER JOIN Postulante ON Matricula.idPostulante = Postulante.idPostulante
            INNER JOIN Personas ON Postulante.idPersona = Personas.idPersona
            SET Matricula.estado = 'Aceptada'
            WHERE Personas.nroDocumento = p_nroDocumento;
        END IF;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No se puede procesar el pago. Los documentos no están en estado "Recibido".';
    END IF;
END$$
DELIMITER ;
-- Probar SPU
-- CALL spu_procesar_pago('75869241','Cancelado','Aceptada');

-- PROCEDIMIENTO PARA BUSCAR EL POSTULANTE
DELIMITER $$
CREATE PROCEDURE spu_buscar_postulante(IN p_nroDocumento CHAR(12))
BEGIN
    SELECT p.nombres, p.apellidos
    FROM Personas p
    INNER JOIN Postulante po ON p.idPersona = po.idPersona
    WHERE p.nroDocumento = p_nroDocumento;
END$$
DELIMITER ;
-- PROBAR SPU
CALL spu_buscar_postulante(21859644);

SELECT * FROM personas;
SELECT * FROM postulante;
SELECT * FROM matricula;
CALL spu_listar_matriculados;
SELECT * FROM pagos;
DELETE FROM postulante WHERE idPostulante= 7;
DELETE FROM matricula WHERE idMatricula= 5;
DELETE FROM personas WHERE idPersona= 6;












-- Procedimiento para mostrar al postulante y su carrera
	SELECT 	postulante.idPostulante, personas.nombres, personas.apellidos,
			personas.tipoDocumento, personas.nroDocumento, personas.nroCelular,
            carrera.nombreCarrera
            FROM postulante
            INNER JOIN personas ON personas.idPersona = postulante.idPostulante
            INNER JOIN carrera ON carrera.idCarrera = postulante.idCarrera;
-- Procedimiento para mostrar el estado de la matricula por Carrera

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
			INNER JOIN matricula ON postulante.idPostulante = matricula.idPostulante
			WHERE matricula.estado IN('Pendiente', 'Aceptada')
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
        WHERE matricula.estado IN('Pendiente', 'Aceptada')
        GROUP BY pagos.estadoPago;
END$$
-- Procedimiento para listar a los matriculados
DELIMITER $$
CREATE PROCEDURE spu_listar_matriculados()
BEGIN
SELECT matricula.idMatricula,personas.nroDocumento, personas.nombres, personas.apellidos,
       carrera.nombreCarrera, matricula.certEstudiosEstado, matricula.fotoEstado, matricula.certAntPolicialesEstado,
       matricula.estado, matricula.fechaMatricula,pagos.estadoPago
FROM matricula
INNER JOIN postulante ON postulante.idPostulante = matricula.idPostulante
INNER JOIN personas ON personas.idPersona = postulante.idPersona
INNER JOIN carrera ON carrera.idCarrera = postulante.idCarrera
INNER JOIN pagos ON pagos.idPago = matricula.idMatricula
WHERE matricula.estado IN ('Pendiente', 'Aceptada')
ORDER BY matricula.idMatricula DESC;
END$$


DELIMITER $$
CREATE PROCEDURE spu_registrar_matricula(
    IN p_nombres VARCHAR(70),
    IN p_apellidos VARCHAR(70),
    IN p_tipoDocumento CHAR(3),
    IN p_nroDocumento CHAR(12),
    IN p_nroCelular CHAR(9),
    IN p_email VARCHAR(70),
    IN p_idCarrera INT,
    IN p_MetodoPago CHAR(15)
)
BEGIN
    DECLARE p_idPersona INT;
    DECLARE p_idPostulante INT;
    DECLARE p_idMatricula INT;
    DECLARE p_result INT;
    DECLARE p_resultExists INT;
    -- Verificar si la persona ya existe en la tabla Personas
    SELECT idPersona INTO p_idPersona FROM Personas WHERE nroDocumento = p_nroDocumento LIMIT 1;
    IF p_idPersona IS NULL THEN
        -- La persona no existe, insertar en la tabla Personas
        INSERT INTO Personas (nombres, apellidos, tipoDocumento, nroDocumento, nroCelular, email)
        VALUES (p_nombres, p_apellidos, p_tipoDocumento, p_nroDocumento, p_nroCelular, p_email);

        SET p_idPersona = LAST_INSERT_ID();
    END IF;
    -- Verificar si la persona ha alcanzado el límite de carreras permitidas
    SELECT COUNT(*) INTO p_result FROM Postulante WHERE idPersona = p_idPersona AND estado='Activo';
    IF p_result < 2 THEN
    -- Verificar si la persona ya esta matricula en una misma carrera
    SELECT COUNT(*) INTO p_resultExists FROM matricula
		INNER JOIN postulante on postulante.idPostulante = matricula.idPostulante
		INNER JOIN personas on personas.idPersona = postulante.idPersona
		WHERE personas.nroDocumento = p_nroDocumento AND postulante.idCarrera = p_idCarrera AND matricula.estado='Pendiente';
        IF p_resultExists < 1 THEN
        -- Insertar en la tabla Postulante
        INSERT INTO Postulante (idPersona, idCarrera, fechaPostulacion)
        VALUES (p_idPersona, p_idCarrera, NOW());
        SET p_idPostulante = LAST_INSERT_ID();
        -- Insertar en la tabla Matricula
        INSERT INTO Matricula (idPostulante, fechaMatricula)
        VALUES (p_idPostulante, NOW());
        SET p_idMatricula = LAST_INSERT_ID();
        -- Insertar en la tabla Pagos
        INSERT INTO Pagos (idMatricula, metodoPago, estadoPago)
        VALUES (p_idMatricula, p_MetodoPago, 'Pendiente');
		END IF;
    END IF;
    SELECT p_result;
END $$
DELIMITER ;
-- CALL spu_registrar_matricula('Carlos','Moran','DNI','98765400','951222666','moran@gmail.com',1,'Plin');

-- PROCEDIMIENTO PARA ACTULIZAR LOS REQUISITOS Y SUS ESTADOS
DELIMITER $$
CREATE PROCEDURE spu_adjuntar_requisitos(
    IN p_idMatricula INT,
    IN p_cert_estudios VARCHAR(100),
    IN p_foto VARCHAR(100),
    IN p_cert_ant_policiales VARCHAR(100)
)
BEGIN
        UPDATE Matricula
        SET certEstudios = p_cert_estudios,
            foto = p_foto,
            certAntPoliciales = p_cert_ant_policiales,
            certEstudiosEstado = 'Recibido',
            fotoEstado = 'Recibido',
            certAntPolicialesEstado = 'Recibido'
        WHERE idMatricula = p_idMatricula;
END$$
DELIMITER ;


-- Procedimiento para registrar los PAGOS
DROP PROCEDURE IF EXISTS spu_procesar_pago;
DELIMITER $$
CREATE PROCEDURE spu_procesar_pago(IN p_nroDocumento INT)
BEGIN
    DECLARE uno CHAR(9);
    DECLARE dos CHAR(9);
    DECLARE tres CHAR(9);

    SELECT certEstudiosEstado, fotoEstado, certAntPolicialesEstado
    INTO uno, dos, tres
    FROM Matricula
    INNER JOIN Postulante ON Matricula.idPostulante = Postulante.idPostulante
    INNER JOIN Personas ON Postulante.idPersona = Personas.idPersona
    WHERE Personas.nroDocumento = p_nroDocumento;

    IF uno = 'Recibido' AND dos = 'Recibido' AND tres = 'Recibido' THEN
        UPDATE Pagos
        INNER JOIN Matricula ON Pagos.idMatricula = Matricula.idMatricula
        INNER JOIN Postulante ON Matricula.idPostulante = Postulante.idPostulante
        INNER JOIN Personas ON Postulante.idPersona = Personas.idPersona
        SET Pagos.estadoPago = 'Cancelado',
            Pagos.fechaPago = NOW()
        WHERE Personas.nroDocumento = p_nroDocumento;

        IF ROW_COUNT() > 0 THEN
            UPDATE Matricula
            INNER JOIN Postulante ON Matricula.idPostulante = Postulante.idPostulante
            INNER JOIN Personas ON Postulante.idPersona = Personas.idPersona
            SET Matricula.estado = 'Aceptada'
            WHERE Personas.nroDocumento = p_nroDocumento;
        END IF;
    END IF;
END$$
DELIMITER ;

-- ELIMINAR MATRÍCULA POR IDMATRICULA
DELIMITER $$
CREATE PROCEDURE spu_eliminar_matricula(IN _idMatricula INT)
BEGIN
	UPDATE Matricula
		INNER JOIN Postulante ON postulante.idPostulante = matricula.idPostulante
        INNER JOIN Pagos ON pagos.idMatricula = matricula.idMatricula 
		SET matricula.estado = 'Anulada', postulante.estado = 'Inactivo', pagos.estadoPago = 'Anulado'
		WHERE Matricula.idMatricula = _idMatricula;
END$$
-- REPORTES PDF 1
DELIMITER $$
CREATE PROCEDURE spu_listar_matriculas_por_carrera(IN _idCarrera INT)
BEGIN 
	SELECT carrera.idCarrera, carrera.nombreCarrera,personas.nombres, personas.apellidos,matricula.estado,pagos.estadoPago
	FROM matricula
		INNER JOIN postulante ON postulante.idPostulante = matricula.idPostulante
		INNER JOIN personas ON personas.idPersona = postulante.idPersona
		INNER JOIN carrera ON carrera.idCarrera = postulante.idCarrera
		INNER JOIN pagos ON pagos.idPago = matricula.idMatricula
		WHERE carrera.idCarrera = _idCarrera
		ORDER BY personas.nombres;
END$$

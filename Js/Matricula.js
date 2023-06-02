document.addEventListener("DOMContentLoaded", () => {
  const tablaMatriculados = document.querySelector("#tbMatriculas tbody");
  const nombres = document.getElementById("r-nombres");
  const apellidos = document.getElementById("r-apellidos");
  const tipoDocumento = document.getElementById("r-tipodoc");
  const numDocumento = document.getElementById("r-numdoc");
  const numCelular = document.getElementById("r-numcel");
  const email = document.getElementById("r-email");
  const btRegistrar = document.getElementById("btnRegistrarMatricula");
  const btBuscarPostulante = document.getElementById("btnBuscarPostulante");
  const btBuscarEliminarPostulante = document.getElementById(
    "em-buscarPostulante"
  );
  const btAdjuntarRequisitos = document.getElementById("btnAdjuntarRequisitos");
  const btnProcesarPago = document.getElementById("btnProcesarPago");
  const btEliminarMatricula = document.getElementById("btnEliminarMatricula");
  let numDocumentoPago = null;
  let idMatricula = null;
  let requisitos = null;
  const arnumDoc = document.getElementById("ar-numdocumento");
  const arPostulante = document.getElementById("ar-postulante");
  const emnumDoc = document.getElementById("em-nrodocumento");
  const emPostulante = document.getElementById("em-Postulante");
  const arCertestudios = document.getElementById("ar-certestudios");
  const arFoto = document.getElementById("ar-foto");
  const antPoliciales = document.getElementById("ar-antpoliciales");
  const listarCarreras = document.querySelector("#r-carreras");
  const listarMetodoPago = document.querySelector("#r-metodopago");
  const formRegistrar = document.getElementById("formRegistrarMatricula");
  const formAdjuntarRequisitos = document.getElementById(
    "formAdjuntarRequisitos"
  );
  const modalRegistrar = new bootstrap.Modal(
    document.getElementById("modalMatricula")
  );
  const modalRequisitos = new bootstrap.Modal(
    document.getElementById("modalRequisitos")
  );
  const modalEliminar = new bootstrap.Modal(
    document.getElementById("modalEliminar")
  );
  const modalPago = new bootstrap.Modal(
    document.getElementById("modalPago")
    );

  function obtenerMatriculados() {
    const data = new URLSearchParams(); //Permite manipular y extraer información de los parametros de una url
    data.append("operacion", "listar"); //Append agrega un nuevo parametro con la clave y valor especificado
    fetch("../Controllers/Matriculas.Controller.php", {
      //Realizamos la solicitud al servidor
      method: "POST",
      body: data,
    })
      .then((res) => res.json()) //Convertimos la respuesta a JSON
      .then((datos) => {
        tablaMatriculados.innerHTML = ``; //Vacia el contenido para asegurar que se limpie la tb antes de agregar nuevos datos
        datos.forEach((element) => {
          const validarEstados = [
            element.certEstudiosEstado,
            element.fotoEstado,
            element.certAntPolicialesEstado,
          ].every((estado) => estado == "Recibido");
          const validarEstadoPago =
            element.estadoPago !== "Cancelado" && validarEstados;
          //Iteramos sobre los datos y generamos una fila en la tabla por cada elemento en datos
          let fila = `
      <tr>
        <td>${element.nroDocumento}</td>
        <td>${element.nombres} ${element.apellidos}</td>
        <td>${element.nombreCarrera}</td>
        <td>${element.certEstudiosEstado}</td>
        <td>${element.fotoEstado}</td>
        <td>${element.certAntPolicialesEstado}</td>
        <td>${element.estado}</td>
        <td>${element.estadoPago}</td>
        <td>
          <button class="eliminar-matricula" data-matricula=${element.idMatricula}><i class="bi bi-trash"></i></button>
          <button class="adjuntar-requisitos" data-requisitos=${element.idMatricula}><i class="bi bi-file-earmark-zip"></i></button>
          <button class="cambiar-estado" data-dni='${element.nroDocumento}' ${
            !validarEstadoPago ? "disabled" : ""
          }><i class="bi bi-currency-dollar" ></i></button>
          </td>
        </tr>
        
        `;
          tablaMatriculados.innerHTML += fila; // Agregamos la fila generada
        });
      });
  }
  tablaMatriculados.addEventListener("click", (e) => {
    
    const btCambiarEstado = e.target.closest(".cambiar-estado");
    const btEliminar = e.target.closest(".eliminar-matricula")
    const btRequisitos = e.target.closest(".adjuntar-requisitos");
    
    if (btCambiarEstado) {
      console.log(btCambiarEstado.disabled);
      if (!btCambiarEstado.disabled) {
        modalPago.toggle();
        numDocumentoPago = btCambiarEstado.dataset.dni;
      }
    }
    if (btEliminar) {
      console.log(btEliminar.dataset.matricula)
      modalEliminar.toggle();
      idMatricula = btEliminar.dataset.matricula;
    }
    if (btRequisitos) {
      console.log(btRequisitos.dataset.requisitos)
      modalRequisitos.toggle();
      requisitos = btRequisitos.dataset.requisitos;
    }
  });
  function obtenerCarreras() {
    const data = new URLSearchParams();
    data.append("operacion", "listarCarreras");
    fetch("../Controllers/Matriculas.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => res.json())
      .then((datos) => {
        datos.forEach((element) => {
          const optionTag = document.createElement("option");
          optionTag.value = element.idCarrera;
          optionTag.text = element.nombreCarrera;
          listarCarreras.appendChild(optionTag);
        });
      });
  }
  function obtenerMetodoPago() {
    const data = new URLSearchParams();
    data.append("operacion", "listarMetodoPago");
    fetch("../Controllers/Matriculas.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => res.json())
      .then((datos) => {
        datos.forEach((element) => {
          const optionTag = document.createElement("option");
          optionTag.value = element.idMetodoPago;
          optionTag.text = element.metodoPago;
          listarMetodoPago.appendChild(optionTag);
        });
      });
  }
  function validarFormulario() {
    // Obtener los valores de los campos del formulario
    const nombresvalue = nombres.value;
    const apellidosvalue = apellidos.value;
    const tipoDocumentovalue = tipoDocumento.value;
    const numDocumentovalue = numDocumento.value;
    const numCelularvalue = numCelular.value;
    const emailvalue = email.value;
    const carrerasvalue = listarCarreras.value;
    const metodopagovalue = listarMetodoPago.value;

    // Realizar validaciones
    if (
      !nombresvalue ||
      !apellidosvalue ||
      !tipoDocumentovalue ||
      !numDocumentovalue ||
      !numCelularvalue ||
      !emailvalue ||
      !carrerasvalue ||
      !metodopagovalue
    ) {
      // Verificar que todos los campos estén completos
      alert("Por favor, complete todos los campos del formulario.");
      return false; // Los campos no son válidos
    }
    return true; // Los campos son válidos
  }
  function registrarMatricula() {
    // Validar campos del formulario
    if (!validarFormulario()) {
      return; // Detener el proceso de registro si los campos no son válidos
    }
    if (confirm("¿Estás seguro de registrar la matrícula?")) {
      const fd = new FormData();
      fd.append("operacion", "registrarMatricula");
      fd.append("r-nombres", nombres.value);
      fd.append("r-apellidos", apellidos.value);
      fd.append("r-tipodoc", tipoDocumento.value);
      fd.append("r-numdoc", numDocumento.value);
      fd.append("r-numcel", numCelular.value);
      fd.append("r-email", email.value);
      fd.append("r-carreras", listarCarreras.value);
      fd.append("r-metodopago", listarMetodoPago.value);

      fetch("../Controllers/Matriculas.Controller.php", {
        method: "POST",
        body: fd,
      })
        .then((res) => res.json())
        .then((data) => {
          console.log(data)
          if (data.errorCode === 1) {
            // La persona ha alcanzado el límite de carreras permitidas
            alert("La persona ha alcanzado el límite de carreras permitidas.");
          } else if (data.errorCode===0) {
            // La matrícula se registró exitosamente
            formRegistrar.reset(); // se reinicia el formulario
            modalRegistrar.toggle(); // se cierra el modal
            obtenerMatriculados(); // se recarga la tabla
            alert("Matrícula registrada exitosamente.");
          } else {
            // Error detectado
            alert("Error al registrar la matrícula.");
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("Error en la solicitud.");
        });
    }
  }
  function validarFormularioRequisitos() {
    const arCertestudiosValue = arCertestudios.value;
    const arFotoValue = arFoto.value;
    const antPolicialesValue = antPoliciales.value;
    if (!arCertestudiosValue || !arFotoValue || !antPolicialesValue) {
      // Verificar que todos los campos estén completos
      alert("Por favor, complete todos los campos del formulario.");
      return false; // Los campos no son válidos
    }
    return true; // Los campos son válidos
  }
  function adjuntarRequisitos() {
    if (!validarFormularioRequisitos()) {
      return; // Detener el proceso de registro si los campos no son válidos
    }
    const data = new FormData();
    data.append("operacion", "adjuntarRequisitos");
    data.append("idMatricula", requisitos);
    data.append("ar-certestudios", arCertestudios.files[0]);
    data.append("ar-foto", arFoto.files[0]);
    data.append("ar-antpoliciales", antPoliciales.files[0]);
    fetch("../Controllers/Requisitos.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => res.json())
      .then((datos) => {
        if (datos.status) {
          alert("Datos adjuntados correctamente")
          formAdjuntarRequisitos.reset();
          modalRequisitos.toggle();
          obtenerMatriculados();
        } else {
          console.log("Holis");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
  function eliminarMatricula() {
    if (confirm("¿Estás seguro de eliminar ésta matrícula?")) {
      const data = new URLSearchParams();
      data.append("operacion", "eliminarMatricula");
      data.append("idMatricula", idMatricula);
      fetch("../Controllers/Matriculas.Controller.php", {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((datos) => {
          obtenerMatriculados();
          modalEliminar.toggle();
        });
    }
  }

  function pagar() {
    const data = new FormData();
    data.append("operacion", "procesarPago");
    data.append("ar-numdocumento", numDocumentoPago);
    fetch("../Controllers/Matriculas.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => res.json())
      .then((datos) => {
        numDocumentoPago = null;
        modalPago.toggle();
        obtenerMatriculados();
      });
  }

  btRegistrar.addEventListener("click", registrarMatricula);
  btAdjuntarRequisitos.addEventListener("click", adjuntarRequisitos);
  btnProcesarPago.addEventListener("click", pagar);
  btEliminarMatricula.addEventListener("click", eliminarMatricula);

  obtenerMatriculados();
  obtenerCarreras();
  obtenerMetodoPago();
});

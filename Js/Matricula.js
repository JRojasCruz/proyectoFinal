document.addEventListener("DOMContentLoaded", () => {
  const tablaMatriculados = document.querySelector("#tbMatriculas tbody");
  const nombres = document.getElementById("r-nombres");
  const apellidos = document.getElementById("r-apellidos");
  const tipoDocumento = document.getElementById("r-tipodoc");
  const numDocumento = document.getElementById("r-numdoc");
  const numCelular = document.getElementById("r-numcel");
  const email = document.getElementById("r-email");
  const btRegistrar = document.getElementById("btnRegistrarMatricula");
  const listarCarreras = document.querySelector("#r-carreras");
  const listarMetodoPago = document.querySelector("#r-metodopago");
  const formRegistrar = document.getElementById("formRegistrarMatricula");
  const modalRegistrar = new bootstrap.Modal(
    document.getElementById("modalMatricula")
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
          //Iteramos sobre los datos y generamos una fila en la tabla por cada elemento en datos
          let fila = `
      <tr>
        <td>${element.nroDocumento}</td>
        <td>${element.nombres} ${element.apellidos}</td>
        <td>${element.nombreCarrera}</td>
        <td>${element.certEstudios}</td>
        <td>${element.foto}</td>
        <td>${element.certAntPoliciales}</td>
        <td>${element.estado}</td>
        <td>${element.estadoPago}</td>
        <td><i class="bi bi-currency-dollar" type="button"></i></td>
        </tr>
        `;
          tablaMatriculados.innerHTML += fila; // Agregamos la fila generada
        });
      });
  }
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
      // Verificar los datos recopilados antes de enviar la solicitud
      // for (const pair of fd.entries()) {
      //   console.log(pair[0] + ": " + pair[1]);
      // }
      fetch("../Controllers/Matriculas.Controller.php", {
        method: "POST",
        body: fd,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status) {//Si status es true, se registro exitosamente
            formRegistrar.reset(); // se reinicia el formulario
            modalRegistrar.toggle(); //se cierra el modal
            obtenerMatriculados(); //Se recarga la tabla
          } else {
            //Error detectado
            console.log(error);
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    }
  }
  function adjuntarRequisitos(){
    
  }
  function eliminarMatricula(){
    
  }
  function pagar(){

  }
  btRegistrar.addEventListener("click", registrarMatricula);
  obtenerMatriculados();
  obtenerCarreras();
  obtenerMetodoPago();
});

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
  function obtenerMatriculados() {
    const data = new URLSearchParams();
    data.append("operacion", "listar");
    fetch("../Controllers/Matriculas.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => res.json())
      .then((datos) => {
        tablaMatriculados.innerHTML = ``;
        datos.forEach((element) => {
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
        <td><i class="bi bi-pencil-square" type="button"></i></td>
        </tr>
        `;
          tablaMatriculados.innerHTML += fila;
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
  function registrarMatricula() {
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
          if (data.status){
            document.getElementById("formRegistrarMatricula").reset();
            formRegistrar.reset();
          }else{
            //Error detectado
            console.log(error)
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    }
  }
  btRegistrar.addEventListener("click", registrarMatricula);
  obtenerMatriculados();
  obtenerCarreras();
  obtenerMetodoPago();
});

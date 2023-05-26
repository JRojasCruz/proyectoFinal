document.addEventListener("DOMContentLoaded",()=>{
const tablaMatriculados = document.querySelector("#tbMatriculas tbody");
function obtenerMatriculados() {
    const data = new URLSearchParams();
    data.append("operacion", "listar");
    fetch("../Controllers/Matriculas.Controller.php", {
      method: "POST",
      body: data
    })
      .then((res) => res.json())
      .then((datos) => {
        console.log(datos)
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
        <td><i class="bi bi-pencil-square" type="button"></i></td>
        </tr>
        `;
        tablaMatriculados.innerHTML += fila;
        });
      });
  }
  obtenerMatriculados()
})
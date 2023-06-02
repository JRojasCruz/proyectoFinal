document.addEventListener("DOMContentLoaded", () => {
  const listCarreras = document.querySelector("#listaCarreras");
  const tbFiltroCarreras = document.querySelector("#tbReporte1 tbody");
  const btExportarPDF = document.getElementById("exportPDF");
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
          listCarreras.appendChild(optionTag);
        });
      });
  }
  function renderData() {
    const data = new URLSearchParams();
    data.append("operacion", "listarMatriculadosPorCarrera");
    data.append("idCarrera", parseInt(listCarreras.value));
  
    fetch("../Controllers/Reportes.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => {
        if (res.ok) {
          return res.json();
        } else {
          throw new Error("Error en la solicitud: " + res.status);
        }
      })
      .then((datos) => {
          tbFiltroCarreras.innerHTML = "";
          datos.forEach((element) => {
            let fila = `
              <tr>
                <td>${element.idCarrera}</td>
                <td>${element.nombreCarrera}</td>
                <td>${element.nombres} ${element.apellidos}</td>
                <td>${element.estado}</td>
                <td>${element.estadoPago}</td>
              </tr>
            `;
            tbFiltroCarreras.innerHTML += fila;
          });
        })
      .catch(() => {
        alert("No se encontraron datos");
      });
  }
  function generatePDF() {
    const pm = new URLSearchParams();
    pm.append("idCarrera", parseInt(listCarreras.value));
    pm.append("nombreCarrera", listCarreras.options[listCarreras.selectedIndex].text);
    window.open(`../Reports/Report01.report.php?${pm}`, "_blank");
  }
  
  listCarreras.addEventListener("change",renderData);
  btExportarPDF.addEventListener("click", generatePDF);
  obtenerCarreras();
});

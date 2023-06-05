document.addEventListener("DOMContentLoaded", () => {
    const listCarrerasPdf2 = document.querySelector("#listaCarrerasPdf2");
    const btFiltro = document.getElementById("filtro");
    const tbMetodoPago = document.querySelector("#tbReporte2 tbody");
    const btExportPdf = document.getElementById("exportPDF2");
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
            listCarrerasPdf2.appendChild(optionTag);
          });
        });
    }
    function renderData() {
      const data = new URLSearchParams();
      data.append("operacion", "listarPorMetodoPago");
      data.append("idCarrera", parseInt(listCarrerasPdf2.value));
      data.append("metodopago", document.querySelector("#metodopago").value)
    
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
            tbMetodoPago.innerHTML = "";
            datos.forEach((element) => {
              let fila = `
                <tr>
                  <td>${element.idCarrera}</td>
                  <td>${element.nombres} ${element.apellidos}</td>
                  <td>${element.nombreCarrera}</td>
                  <td>${element.estadoPago}</td>
                  <td>${element.metodoPago}</td>
                </tr>
              `;
              tbMetodoPago.innerHTML += fila;
            });
          })
        .catch(() => {
          alert("No se encontraron datos");
        });
    }
  
    function generatePDF() {
      const pm = new URLSearchParams();
      pm.append("idCarrera", parseInt(listCarrerasPdf2.value));
      pm.append("metodopago", metodopago.options[metodopago.selectedIndex].text);
      pm.append("nombreCarrera", listCarrerasPdf2.options[listCarrerasPdf2.selectedIndex].text);
      window.open(`../Reports/Report02.report.php?${pm}`, "_blank");
    }
    
    btFiltro.addEventListener("click",renderData);
    btExportPdf.addEventListener("click", generatePDF);
    obtenerCarreras();
  });
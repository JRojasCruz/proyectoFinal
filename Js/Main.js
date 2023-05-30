document.addEventListener("DOMContentLoaded",()=>{
  const filtrarCarrera = document.getElementById("filtrarCarrera");
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
          filtrarCarrera.appendChild(optionTag);
        });
      });
  }
  obtenerCarreras()
})
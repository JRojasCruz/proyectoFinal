document.addEventListener("DOMContentLoaded", () => {
  const graficoCarreras = document.querySelector("#graficoCarreras");
  const graficoMatriculas = document.querySelector("#graficoMatriculas");
  function graficarCarreras() {
    const data = new URLSearchParams();
    data.append("operacion", "graficar");
    fetch("../Controllers/Graficos.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => res.json())
      .then((datos) => {
        console.log(datos);
        const carreras = datos.map((obj) => obj.nombreCarrera);
        const postulantes = datos.map((obj) => obj.Postulantes);
        graficoBarras = new Chart(graficoCarreras, {
          type: "pie",
          data: {
            labels: carreras,
            datasets: [
              {
                backgroundColor: ["#EAE186", "#F09D58","#5896F0","#4EA77D"],
                label: "Postulantes",
                data: postulantes,
              },
            ],
          },
        });
      });
  }
  function graficarMatriculas() {
    const data = new URLSearchParams();
    data.append("operacion", "graficarPagos");
    fetch("../Controllers/Graficos.Controller.php", {
      method: "POST",
      body: data,
    })
      .then((res) => res.json())
      .then((datos) => {
        console.log(datos);
        const estadoPago = datos.map((obj) => obj.estadoPago);
        const pagos = datos.map((obj) => obj.Pagos);
        graficoBarras = new Chart(graficoMatriculas, {
          type: "pie",
          data: {
            labels: estadoPago,
            datasets: [
              {
                backgroundColor: ["#2E86C1", "#1D8348"],
                label: "Postulantes",
                data: pagos,
              },
            ],
          },
        });
      });
  }
  graficarCarreras();
  graficarMatriculas();
});

document.addEventListener("DOMContentLoaded",()=>{
  const user = document.getElementById("username");
  const password = document.getElementById("password");
  const btLogin = document.getElementById("logIn");
  const btLogout = document.getElementById("logOut");
  function logIn() {
    const login = new URLSearchParams();
    login.append("operation", "login");
    login.append("username", user.value);
    login.append("password", password.value);
    fetch("./Controllers/LogIn.Controller.php", {
      method: "POST",
      body: login,
    })
      .then((res) => res.json())
      .then((datos) => {
        if (datos.login) {
          location.href = "./Views/main.php";
        }
      });
  }
  btLogin.addEventListener("click", logIn)
})


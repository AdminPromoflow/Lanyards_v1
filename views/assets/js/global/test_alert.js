const email_text_website = document.getElementById("email_text_website");
const password_text_website = document.getElementById("password_text_website");
const enter_text_website = document.getElementById("enter_text_website");
const inicio_sesion =document.getElementById("inicio_sesion");

const users = [
    ["ian@kan-do-it.com", "testing123"],
    ["catrina@kan-do-it.com", "testing123"],
    ["darrenpbaker@btinternet.com", "testing123"],
    ["alerozochiquiza@gmail.com", "testing123"],
    [".", "."]
  ];
enter_text_website.addEventListener("click", function(){

  validateUser(email_text_website.value, password_text_website.value);
});
  function validateUser(email, password) {
    // Buscar si el email y la contraseña coinciden con algún elemento del array
    const userExists = users.some(([userEmail, userPassword]) =>
      userEmail === email && userPassword === password
    );

    // Mostrar alert de acuerdo al resultado
    if (userExists) {
    //  alert("Welcome");
      inicio_sesion.style.display = "none";
    } else {
      alert("Unsatisfactory: Username or password incorrect.");
    }

  }

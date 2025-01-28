
class RecoveryPassword {
    constructor() {
    }

    // Métodos vacíos
    init() {
      if (buttonPasswordRecovery) {
         buttonPasswordRecovery.addEventListener('click', (event) => this.handleButtonClick(event));
     }
    }

    validatePasswords() {
        // Método para validar contraseñas
    }

    sendRequest() {
        const password = passwordRecovery.value;

        // Recuperar el token y email de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token'); // Obtener el token desde la URL
        const email = urlParams.get('email'); // Obtener el email desde la URL

        // Crear un objeto con los datos a enviar
        const data = {
          token: token,
          email: email,
          password: password,
          action: 'updatePassword' // Añadir el campo 'action' con valor 'updatePassword'
      };

      // Realizar la solicitud AJAX utilizando fetch
        fetch('../../controller/users/password-forgotten.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),  // Convertir los datos a JSON
        })
        .then(response => response.json())  // Analizar la respuesta como JSON
        .then(data => {
            console.log(data); // Muestra la respuesta de la solicitud en consola

            // Verificar el resultado y mostrar el mensaje correspondiente
            if (data.success) {
                alert('Password recovery successful!');
                // Redirigir o realizar alguna acción después de la recuperación exitosa
                // window.location.href = 'https://lanyardsforyou.com/success-page';
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error during the request:', error);
            alert('An error occurred during the request.');
        });

    }

    validatePasswords() {
        const password = passwordRecovery.value;
        const confirmPassword = passwordConfirmRecovery.value;

        if (password === '' || confirmPassword === '') {
            alert('Both password fields must be filled out.');
            return false;
        }

        if (password.length <= 6) {
            alert('Passwords must be longer than 6 characters.');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return false;
        }

        return true;
    }

    handleButtonClick(event) {
       event.preventDefault(); // Evita la acción predeterminada del botón

       if (this.validatePasswords()) {
           this.sendRequest();
       }
   }
}


// Captura los elementos del DOM
const passwordRecovery = document.getElementById('password_recovery');
const passwordConfirmRecovery = document.getElementById('password_confirm_recovery');
const buttonPasswordRecovery = document.getElementById('button_passwrod_recovery');

const recoveryPasswordClass = new RecoveryPassword();
recoveryPasswordClass.init();

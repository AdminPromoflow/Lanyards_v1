<section id="login" class="login">
  <div id="containerLogin"  class="containerLogin">
    <div class="headLogin">
      <div class="headLoginContaner">
          <h1>Login</h1>
      </div>
      <img id="closeLogin" src="../assets/img/global/login/close.png" alt="">
    </div>
    <div class="bodyLogin">
      <label for="emailLogin">Please enter your login details:</label>
      <input id="emailLogin" type="text" name="" value="" placeholder="Please provide your email">
      <input id="passwordLogin" type="password" name="" value="" placeholder="and your password">
      <button id="loginButton" type="button" name="button"><strong class="fontWeightButtonLogin">Login</strong></button>
    </div>
    <div class="footerLogin">
      <h3>or login with:</h3>
      <div class="footerLoginOptionsContainer">
        <div id="loginWithGoogle1" class="footerLoginOptions">
          <img src="../../views/assets/img/global/login/google-icon.png" alt="">
        </div>

      <button id="logoutButton">Logout</button>


      <!-- Load the JS SDK asynchronously -->
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
        <div id="loginWithFacebook1" class="footerLoginOptions">
          <img src="../../views/assets/img/global/login/facebook-icon.png" alt="">
        </div>
      </div>
      <h4 id="openRegisterFromLogin">No account yet? Register here.</h4>
    </div>
  </div>
</section>
<script>

function statusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);

  if (response.status === 'connected') {
    testAPI();
  } else {
    document.getElementById('status').innerHTML = 'Please log into this webpage.';
  }
}

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

window.fbAsyncInit = function() {
  FB.init({
    appId      : '615665997605768',
    cookie     : true,
    xfbml      : true,
    version    : 'v6.0'
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
};

function testAPI() {
  console.log('Welcome! Fetching your information.... ');
  FB.api('/me', function(response) {
    console.log('Successful login for: ' + response.name);
    document.getElementById('status').innerHTML =
      'Thanks for logging in, ' + response.name + '!';
  });
}

// Función para cerrar sesión
function logout() {
  FB.logout(function(response) {
    // Maneja la respuesta del logout
    console.log('User logged out.');
    document.getElementById('status').innerHTML = 'You have logged out.';
  });
}


</script>

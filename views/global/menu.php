<!-- Link to the CSS file for styling the menu -->
<link rel="stylesheet" href="../assets/css/global/menu.css?v=<?php echo filemtime('../assets/css/global/menu.css'); ?>">

<!-- Define a section for the menu -->
<section id="menu" class="menu">

  <!-- Logo container with an image -->
  <div id="logo_img" class="logo">
    <img src="../assets/img/global/menu/Logo.png" alt=""> <!-- Displays the logo image -->
  </div>

  <!-- Container for the main menu items -->
  <div class="containerItems">
    <a href="../../views/home/index.php"><h3 class="transparentLeftLine">Home</h3></a>
    <a href="../../views/about_us/index.php"><h3>About us</h3></a>
    <a href="../../views/about_us/index.php"><h3>Lanyards</h3></a>
    <a href="../../views/contact_us/index.php"><h3>Contact us</h3></a>
  </div>

  <!-- Container for secondary menu items -->
  <div class="containerItems2">
    <h3 class="openSignup openLogin showItemsMenuLoginFalse">Sign up</h3> <!-- Register, visible when logged out -->
    <h3 class="openLogin showItemsMenuLoginFalse">Login</h3> <!-- Login button, visible when logged out -->
    <img class="showItemsMenuLoginTrue openLogout border_right_menu" src="../assets/img/global/menu/checkout.png" alt=""> <!-- Checkout icon, visible when logged in -->
    <img id="showLogout" class="showItemsMenuLoginTrue openLogout logoutButtons" src="../../views/assets/img/global/menu/user_icon.png" alt=""> <!-- User icon, visible when logged in -->
  </div>

  <div id="container_logout" class="container_logout">
    <h3 id="openLogout">Logout</h3>
  </div>

  <!-- Container for mobile menu icons -->
  <div class="containerItems3">
    <img id="openMenuMobile" src="../assets/img/global/menu/menu.png" alt=""> <!-- Menu icon for opening the mobile menu -->
    <img id="closeMenuMobile" src="../assets/img/global/menu/close.png" alt=""> <!-- Close icon for closing the mobile menu -->
  </div>

  <!-- Mobile menu section with duplicated menu items for small screen navigation -->
  <section id="menuMobile" class="menuMobile">
    <h3>Home</h3>
    <h3>About us</h3>
    <h3>Contact us</h3>
    <h3 class="openLogin showItemsMenuLoginFalse">Login</h3>
    <h3 class="openSignup showItemsMenuLoginFalse">Sign up</h3>
    <h3 class="openLogout transparentBottonLine showItemsMenuLoginTrue">Checkout</h3>
    <h3 class="openLogout showItemsMenuLoginTrue">Logout</h3>
  </section>

</section>

<!-- Link to the JavaScript file for handling menu behavior and interactions -->
<script src="../assets/js/global/menu.js?v=<?php echo filemtime('../assets/js/global/menu.js'); ?>"></script>

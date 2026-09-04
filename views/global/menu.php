<!-- Link to the CSS file for styling the menu -->
<link rel="stylesheet" href="../assets/css/global/menu.css?v=<?php echo filemtime('../assets/css/global/menu.css'); ?>">

<header id="menu" class="menu">
  <a id="logo_img" class="logo" href="../../views/home/index.php" aria-label="Lanyards For You home">
    <img src="../assets/img/global/menu/Logo.png" alt="Lanyards For You">
    <span class="brand-name">Lanyards For You</span>
  </a>

  <nav class="containerItems" aria-label="Primary navigation">
    <a class="nav-link is-current" href="../../views/home/index.php" aria-current="page">Home</a>
    <a class="nav-link" href="../../views/about_us/index.php">About us</a>
    <a class="nav-link openLogout" href="../../views/my_lanyards/index.php">My lanyards</a>
    <a class="nav-link" href="../../views/contact_us/index.php">Contact</a>
  </nav>

  <div class="containerItems2">
    <button class="nav-action nav-action-secondary openLogin showItemsMenuLoginFalse" type="button">Log in</button>
    <button class="nav-action nav-action-primary openSignup showItemsMenuLoginFalse" type="button">Create account</button>
    <a class="icon-action showItemsMenuLoginTrue openLogout" href="../../views/shopping_cart/index.php" aria-label="Open shopping basket">
      <img src="../assets/img/global/menu/checkout.png" alt="">
    </a>
    <button id="showLogout" class="icon-action showItemsMenuLoginTrue openLogout logoutButtons" type="button" aria-label="Open account menu" aria-haspopup="true">
      <img src="../../views/assets/img/global/menu/user_icon.png" alt="">
    </button>
  </div>

  <div id="container_logout" class="container_logout" role="menu">
    <button id="openLogout" type="button" role="menuitem">Log out</button>
  </div>

  <div class="containerItems3">
    <button id="openMenuMobile" type="button" aria-label="Open navigation" aria-controls="menuMobile" aria-expanded="false">
      <img src="../assets/img/global/menu/menu.png" alt="">
    </button>
    <button id="closeMenuMobile" type="button" aria-label="Close navigation" aria-controls="menuMobile" aria-expanded="true">
      <img src="../assets/img/global/menu/close.png" alt="">
    </button>
  </div>

  <nav id="menuMobile" class="menuMobile" aria-label="Mobile navigation" aria-hidden="true">
    <a href="../../views/home/index.php" aria-current="page">Home</a>
    <a href="../../views/about_us/index.php">About us</a>
    <a href="../../views/contact_us/index.php">Contact</a>
    <a class="openLogout" href="../../views/my_lanyards/index.php">My lanyards</a>
    <button class="openLogin showItemsMenuLoginFalse" type="button">Log in</button>
    <button class="openSignup showItemsMenuLoginFalse" type="button">Create account</button>
    <a class="openLogout showItemsMenuLoginTrue" href="../../views/shopping_cart/index.php">Shopping basket</a>
    <button class="openLogout showItemsMenuLoginTrue mobileLogout" type="button">Log out</button>
  </nav>
</header>

<!-- Link to the JavaScript file for handling menu behavior and interactions -->
<script src="../assets/js/global/menu.js?v=<?php echo filemtime('../assets/js/global/menu.js'); ?>"></script>

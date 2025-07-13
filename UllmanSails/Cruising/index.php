<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body>
    <style media="screen">
      body{
        margin: 0px;
        padding: 0px;
        font-family: 'Poppins', sans-serif;
        background-color: #111C42;
        font-size: 15px;
      }
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      p {
        font-size: 0.9em;
      }

      h2 {
        color: #111C42;
        font-size: 2em;
      }
      h3 {
        color: #F2F2F2;
        font-size: 1.6em;
        font-weight: 500;
      }
      h4 {
        color: #111C42;
        font-size: 1em;
        font-weight: 500;
      }

      button {
        background-color: #111C42;
        padding: 15px;
        font-weight: bold;
        border: none;
        color: #F2F2F2;
      }
      button:hover {
        background-color: #F2F2F2;
        color: #111C42;
      }


      header {
        padding: 50px;
        background-color: aquamarine;
        text-align: center;
      }

      nav {
        display: flex;
        flex-direction: row;
        background-color:
      }

      nav a {
        color: white;
        padding: 14px 20px;
        text-decoration: none;
      }


    </style>
    <?php include "../General/Menu/Menu.php" ?>
    <div id="searchHide" class="searchHide">
    <?php include "1.Slider/Slider.php" ?>
    <?php include "2.Services/Services.php" ?>
    </div>
    <?php include "../General/Charging/charging.php"; ?>

    <div id="searchContent" class="searchContent">
    </div>
    <?php include "../General/Footer/Footer.php" ?>
    <script type="text/javascript">
    // Función para manejar el scroll suave y respuesta rápida
        let isScrolling = false;
        let velocity = 0;
        let previousY = 0;

        function handleScroll() {
        if (!isScrolling) {
          requestAnimationFrame(() => {
            const currentY = window.scrollY;
            const deltaY = currentY - previousY;

            // Agregar aceleración
            velocity += deltaY * 0.05;
            // Aplicar desaceleración gradual
            velocity *= 0.0;

            window.scrollBy(0, velocity);

            previousY = currentY;
            isScrolling = false;
          });
        }
        }
    </script>


  </body>

</html>

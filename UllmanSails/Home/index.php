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
  <body id="container_accessories_home">
    <style media="screen">
      body{
        margin: 0px;
        padding: 0px;
        font-family: 'Poppins', sans-serif;
        background-color: #F8F8FA;
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
        cursor:

      }
      h4 {
        color: #111C42;
        font-size: 1em;
        font-weight: 500;

      }
      button {
        background-color: #005598;
        padding: 15px;
        font-weight: bold;
        border: none;
        color: #F2F2F2;
        cursor: pointer;
      }
      button:hover {
        background-color: #F2F2F2;
        color: #111C42;
        transition: .6s;
      }

      header {
        padding: 50px;
        background-color: aquamarine;
        text-align: center;
      }
      nav a {
        color: white;
        padding: 14px 20px;
        text-decoration: none;
      }

      .img_arrow_bottom{
        position:fixed;
        height: 40px;
        width: 60px;
        left: 50%;
        bottom: 3%;
        z-index: 100;
        display: none;
      }
        .img_arrow_bottom img{
          position: relative;
          width: 100%;
          height: 100%;
          z-index: 10;
        }
        .img_arrow_top{
          position:fixed;
          height: 40px;
          width: 60px;
          left: 50%;
          top: 10%;
          z-index: 100;
          display: none;
        }
        .img_arrow_top img{
          position: relative;
          width: 100%;
          height: 100%;
          z-index: 10;
        }

    </style>
    <div class="img_arrow_top arrows">
      <img src="../Home/arrow_top.png" alt="">
    </div>
    <div class="img_arrow_bottom arrows">
      <img src="../Home/arrow_bottom.png" alt="">
    </div>

    <div id="searchHide" class="searchHide">
    <?php include "../General/Menu/Menu.php" ?>
    <?php include "../Home/1.Slider/Slider.php" ?>
    <?php include "../Home/buttom/buttom.php" ?>
    <?php include "2.Services/Services.php" ?>
    <?php include "../Home/Picture/Picture.php" ?>
    <?php include "5.Video/Video.php" ?>
    <?php include "4.News/News.php" ?>
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
        class HomeClass {
          constructor() {

            for (let i = 0; i < arrows.length; i++) {
              arrows[i].addEventListener("click", function(){
                homeClass.addArrowsEvent();
              })
            }

          }
           addArrowsEvent() {
            const container_accessories_home = document.getElementById("container_accessories_home");

            if (arrows.length < 2) {
                console.error("At least two arrows are required.");
                return;
            }

            // Cantidad a hacer scroll por clic (ajusta si es necesario)
            const scrollStep = 350;

            // Flecha hacia arriba
            arrows[0].addEventListener("click", () => {
                container_accessories_home.scrollBy({ top: -scrollStep, behavior: "smooth" });
            });

            // Flecha hacia abajo
            arrows[1].addEventListener("click", () => {
                container_accessories_home.scrollBy({ top: scrollStep, behavior: "smooth" });
            });

            // Verificación después del scroll
            arrows.forEach(button => {
                button.addEventListener("click", () => {
                    setTimeout(() => {
                        this.checkScrollPosition(container_accessories_home, arrows);
                    }, 300);
                });
            });

            // Verificación inicial al cargar
            this.checkScrollPosition(container_accessories_home, arrows);

            // También al hacer scroll manual
            container_accessories_home.addEventListener("scroll", () => {
                this.checkScrollPosition(container_accessories_home, arrows);
            });
        }

         checkScrollPosition(container, arrows) {
            const scrollTop = container.scrollTop;
            const maxScrollTop = container.scrollHeight - container.clientHeight;

            if (scrollTop <= 0) {
                // Está arriba del todo: Oculta flecha arriba, muestra flecha abajo
                arrows[0].style.display = "none";
                arrows[1].style.display = "block";
            } else if (scrollTop >= maxScrollTop - 1) {
                // Está al final: Muestra flecha arriba, oculta flecha abajo
                arrows[0].style.display = "block";
                arrows[1].style.display = "none";
            } else {
                // En el medio: Muestra ambas flechas
                arrows[0].style.display = "block";
                arrows[1].style.display = "block";
            }
        }
        }
    const arrows = document.querySelectorAll(".arrows");
    const homeClass = new HomeClass();






    </script>

  </body>

</html>

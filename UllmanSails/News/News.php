<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body>
    <style media="screen">
    body{
      margin: 0px;
      padding: 0px;
      font-family: 'Poppins', sans-serif;
      background-color:#F8F8FA;
      font-size: 1em;
    }
      .news{
      position: relative;
      width: 100vw;
      background-color: #F8F8FA;

      display: flex;
      justify-content: center;
      flex-wrap: nowrap;
      }
      .content {
        -ms-overflow-style: none;  /* Internet Explorer 10+ */
        scrollbar-width: none;  /* Firefox */
      }
      .content::-webkit-scrollbar {
          display: none;  /* Safari and Chrome */
      }

      .content {
        position: flex;
        top: 0px;
        left: 50%;
        height: 100vh;
        overflow-y: scroll;
        background-color: white;
        width: 60%;
      }
      .leftPanel{
        position: flex;
        top: 0px;
        height: 100vh;
        overflow-y: scroll;
        background-color: #005598;
        width: 30%;
        min-width: 231px;
        z-index: 10;
      }
      .rightPanel{
        position: flex;
        top: 0px;
        height: 100vh;
        overflow-y: scroll;
        background-color: #202E52;
        width: 30%;
        min-width: 320px;

      }
      .IconMenuNews{
        position: absolute;
        z-index: 2;
        display: none;
        left: 15px;
        top: 15px;
        height: 20px;
        width: 25px;
        cursor: pointer;
      }
      .IconCloseMenuNews{
        position: relative;
        z-index: 11;
        display: none;
        left: calc(100% - 35px);
        top: 15px;
        height: 20px;
        width: 25px;
        cursor: pointer;
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

      @media screen and (max-width: 1130px) {
        .content{
          width: 70%;
        }
        .leftPanel{
          width: 30%;
        }
        .rightPanel{
          display: none;
        }
      }
     @media screen and (max-width: 574px) {
       .content{
         width: 100%;
       }
        .leftPanel{
          display: none;
        }
        .IconMenuNews{
          display: block;
        }

        .IconCloseMenuNews{
          display: block;
        }

      }




    </style>
    <section class="news">

    <img id="IconMenuNews" class="IconMenuNews" src="../News/Images/Menu.png" alt="">

    <section id="leftPanel" class="leftPanel">

      <?php  include "LeftPanel/LeftPanel.php" ?>
      <script type="text/javascript">
          IconMenuNews = document.getElementById('IconMenuNews');
          IconCloseMenuNews = document.getElementById('IconCloseMenuNews');
          leftPanel = document.getElementById('leftPanel');

          IconMenuNews.addEventListener("click", function(){
          leftPanel.style.display = "block";
          })

          IconCloseMenuNews.addEventListener("click", function(){
          leftPanel.style.display = "none";
          })
      </script>
    </section>


    <section class="content">
      <?php  include "Content/Content.php" ?>
    </section>
    <section class="rightPanel">
      <?php  include "RightPanel/RightPanel.php" ?>
    </section>
    <?php include "../General/Charging/charging.php"; ?>

</section>

<script type="text/javascript">
const contentSections = document.querySelectorAll(".contentSections");
const itemsLeftPanel = document.querySelectorAll(".itemsLeftPanel");

leftPanel = document.getElementById('leftPanel');


var contentSectionsOn = 0;


for (let i = 0; i < itemsLeftPanel.length; i++) {

  contentSections[i].style.display = "none";
  contentSections[0].style.display = "block";

  itemsLeftPanel[i].addEventListener("click", function(){
    if (  window.innerWidth <= 768) {
      leftPanel.style.display = "none";
    }
    if (contentSections[i].style.display == "none" ){
      contentSectionsOn  = i;
      contentSections[i].style.display = "block";
      turnOffOtherContentSections();
    }
  })
}

function turnOffOtherContentSections(){
  for (let i = 0; i < itemsLeftPanel.length; i++) {
    if (i != contentSectionsOn) {
      contentSections[i].style.display = "none";
    }
  }
}
</script>

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

    // Agregar respuesta rápida al scroll
    window.addEventListener('scroll', handleScroll);

    // Eventos de mouse para inicio y finalización del scroll
    window.addEventListener('mousedown', () => {
    isScrolling = true;
    velocity = 0;
    });

    window.addEventListener('mouseup', () => {
    isScrolling = false;
    });
</script>
  </body>

</html>

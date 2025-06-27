<style media="screen">
  /* === CONTENEDOR PRINCIPAL === */
  .text {
    position: relative;
    background-color: #FDF6F8;
    padding: 4vw 6vw;
    overflow: hidden;

    /* Centrado vertical y horizontal */
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }

  /* === TÍTULO PRINCIPAL === */
  .text h1 {
    color: #005598;
    padding-bottom: 2vw;
    font-size: 2.3em;
    text-align: center;
  }

  /* === PÁRRAFOS === */
  .text p {
    text-align: justify;
    padding-left: 1vw;
    margin: 10px 0;
    font-size: 1.2em;
  }

  /* === ENLACE DE REGRESO (ARRIBA) === */
  .link_a {
    all: unset;
    margin-left: 100px;
    color: #202E52;
    font-weight: 600;
    font-size: 1.1em;
    cursor: pointer;
    text-align: left;
    width: 100vw;
  }

  .link_a:hover {
    text-decoration: underline;
  }

  /* === BOTÓN "Contact Us" === */
  .buttonTitle {
    position: relative;
    width: 200px;
    background-color: #005598;
    padding: 14px 0;
    cursor: pointer;
    border: 1px solid #202E52;
  }

  .buttonTitle:hover {
    background-color: #202E52;
  }

  .buttonTitle h3 {
    text-align: center;
    font-size: 1.3em;
    font-weight: 500;
    color: #F2F2F2;
  }

  /* === CONTENEDOR DE BOTONES === */
  .Container_bottom {
    position: relative;
    width: 100%;
    padding: 10px 0;
    margin: 20px 0;

    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row;
    flex-wrap: wrap;
  }

  /* === ENLACE GENERAL DE BOTONES === */
  .link_quote {
    all: unset;
    margin: 0 10px;
  }

  /* === BOTONES GENERALES === */
  .button_quote {
    position: relative;
    width: 200px;
    padding: 14px 0;
    cursor: pointer;
    border: 1px solid #202E52;
    margin: auto;
  }

  /* === ESTILO DE BOTÓN "New Sail Quote" === */
  .button_quote1 {
    background-color: #005596;
  }

  .button_quote1:hover {
    background-color: #245580;
  }

  /* === ESTILO DE BOTÓN "Sail Repair Quote" === */
  .button_quote2 {
    background-color: #D21241;
  }

  .button_quote2:hover {
    background-color: #b92c28;
  }

  .button_quote h3 {
    text-align: center;
    font-size: 1.3em;
    font-weight: 500;
    color: #F2F2F2;
  }

  /* === RESPONSIVE PARA MÓVILES === */
  @media (max-width: 750px) {
    .Container_bottom {
      flex-direction: column;
      gap: 20px;
    }
  }
</style>

<!-- === CONTENIDO DE LA PÁGINA === -->
<section class="text">
  <!-- Enlace de regreso a Racing Sails -->
  <a class="link_a" href="../Racing/index.php">&lt; Racing Sails</a>

  <!-- Título de la página -->
  <h1>Fiberpath Regatta</h1>

  <!-- Contenido informativo -->
  <p>Sailcloth is the material used to make the sails of a boat. It is typically made from a woven fabric that is designed to be lightweight, strong, and durable, while also having properties that allow it to perform well in the wind.</p>

  <p>FiberPath Regatta is a type of sailcloth material that is known for its high performance and durability. It is made from a blend of high-strength fibers, including carbon, aramid, and Dyneema. These fibers are woven together in a specific pattern to create a strong and lightweight fabric.</p>

  <p>One of the key benefits of FiberPath Regatta is its low stretch properties. This means that the sail will maintain its shape and performance characteristics even when under heavy load. This makes it an ideal choice for racing sails, where speed and agility are critical to success. FiberPath Regatta is also highly resistant to UV damage, which is important for sails that are frequently exposed to sunlight. The material is typically available in a range of weights and configurations to suit different types of sails and boats.</p>

  <p>In addition to FiberPath Regatta, there are many other types of sailcloth materials available on the market. These include laminated sailcloth, woven Dacron, and Mylar film. Each type of material has its own unique properties and advantages, and the choice of material will depend on a variety of factors, such as the type of boat, the sailing conditions, and the sailor's preferences and budget.</p>

  <!-- Botones de acción -->
  <div class="Container_bottom">
    <a class="link_quote" href="../New_Sail_Quote/index.php">
      <div class="button_quote button_quote1">
        <h3>New Sail Quote</h3>
      </div>
    </a>
    <a class="link_quote" href="../New_Repair_Quote/index.php">
      <div class="button_quote button_quote2">
        <h3>Sail Repair Quote</h3>
      </div>
    </a>
    <a class="link_quote" href="../ContactUs/index.php">
      <div class="buttonTitle">
        <h3>Contact us</h3>
      </div>
    </a>
  </div>
</section>

<script type="text/javascript">
  // Aquí puedes agregar funcionalidades JS si es necesario
</script>

<style media="screen">
  /* === Sección principal del contenido === */
  .text {
    position: relative;
    background-color:#F8F8FA;
    padding: 4vw 6vw;
    overflow: hidden;
    margin: 0;

    /* Centrado con flexbox */
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }

  /* Título principal */
  .text h1 {
    color: #005598;
    padding-bottom: 2vw;
    font-size: 2.3em;
    text-align: center;
  }

  /* Párrafos del contenido */
  .text p {
    text-align: justify;
    padding-left: 1vw;
    margin: 10px 0;
    font-size: 1.2em;
  }

  /* Enlace superior para regresar */
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

  /* Botón: Contact us */
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

  /* Contenedor de los tres botones inferiores */
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

  /* Enlace envoltorio de botones */
  .link_quote {
    all: unset;
    margin: 0 10px;
  }

  /* Botón base */
  .button_quote {
    position: relative;
    width: 200px;
    padding: 14px 0;
    cursor: pointer;
    border: 1px solid #202E52;
    margin: auto;
  }

  /* Botón: New Sail Quote */
  .button_quote1 {
    background-color: #005596;
  }

  .button_quote1:hover {
    background-color: #245580;
  }

  /* Botón: Sail Repair Quote */
  .button_quote2 {
    background-color: #D21241;
  }

  .button_quote2:hover {
    background-color: #b92c28;
  }

  /* Texto dentro de los botones */
  .button_quote h3 {
    text-align: center;
    font-size: 1.3em;
    font-weight: 500;
    color: #F2F2F2;
  }

  /* Responsive: cuando la pantalla es menor de 750px */
  @media (max-width: 750px) {
    .Container_bottom {
      flex-direction: column;
      gap: 20px; /* Espacio entre botones */
    }
  }
</style>

<!-- === Contenido de la sección de producto === -->
<section class="text">
  <!-- Enlace de regreso -->
  <a class="link_a" href="../Racing/index.php">&lt; Racing Sails</a>

  <!-- Título del producto -->
  <h1>Fiberpath GP</h1>

  <!-- Descripción del producto -->
  <p>FiberPath GP is a type of high-performance sailcloth material that is designed for use in cruising sails. It is typically made from a blend of high-strength fibers, including carbon, aramid, and Dyneema, which are woven together to create a strong and lightweight fabric.</p>

  <p>One of the key features of FiberPath GP is its low stretch properties. This allows the sail to hold its shape and maintain its performance characteristics even under heavy load. This is particularly important for cruising sails that need to perform well in a variety of wind conditions.</p>

  <p>FiberPath GP is also highly resistant to UV damage, which is important for sails that are frequently exposed to sunlight. This helps to extend the life of the sail and maintain its performance over time.</p>

  <p>Compared to other high-performance sailcloth materials, such as laminated sailcloth or Mylar film, FiberPath GP is typically more affordable and is designed with cruising sailors in mind. It offers a good balance of durability, performance, and value that make it a popular choice for many cruising sailors around the world.</p>

  <p>The specific construction and panel layout of the sail will depend on the sailmaker's design and the intended use of the sail. In general, cruising sails made from FiberPath GP are designed to be reliable and easy to handle, while still providing good performance and speed on the water.</p>

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

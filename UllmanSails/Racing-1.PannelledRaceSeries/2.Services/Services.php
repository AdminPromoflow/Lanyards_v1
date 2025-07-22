<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Panelled Race Series</title>
  <style media="screen">
    /* === CONTENEDOR PRINCIPAL DE TEXTO === */
    .text {
      position: relative;
      background-color: #F8F8FA;
      padding: 4vw 6vw;
      overflow: hidden;

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

    /* === PÁRRAFOS DE TEXTO === */
    .text p {
      text-align: justify;
      padding-left: 1vw;
      margin: 10px 0;
      font-size: 1.2em;
    }

    /* === ENLACE DE REGRESO (Racing Sails) === */
    .link_a {
      all: unset;
      position: relative;
      margin-left: 100px;
      color: #202E52;
      font-weight: 600;
      font-size: 1.1em;
      cursor: pointer;
      width: 100vw;
      text-align: left;
    }

    .link_a:hover {
      text-decoration: underline;
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
    }

    /* === ENLACE DE CADA BOTÓN === */
    .link_quote {
      all: unset;
      position: relative;
      margin: 0 10px;
      text-decoration: none;
    }

    /* === ESTILO GENERAL DE BOTONES === */
    .button_quote {
      position: relative;
      width: 200px;
      padding: 14px 0;
      cursor: pointer;
      border: 1px solid #202E52;
    }

    .button_quote h3,
    .buttonTitle h3 {
      text-align: center;
      font-size: 1.3em;
      font-weight: 500;
      color: #F2F2F2;
    }

    /* === BOTÓN "New Sail Quote" === */
    .button_quote1 {
      background-color: #005596;
    }

    .button_quote1:hover {
      background-color: #245580;
    }

    /* === BOTÓN "Sail Repair Quote" === */
    .button_quote2 {
      background-color: #D21241;
    }

    .button_quote2:hover {
      background-color: #b92c28;
    }

    /* === BOTÓN "Contact us" === */
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

    /* === RESPONSIVE: COLUMNA EN PANTALLAS PEQUEÑAS === */
    @media (max-width: 700px) {
      .Container_bottom {
        flex-direction: column;
        gap: 20px;
      }
    }
  </style>
</head>
<body>

  <section class="text">
    <!-- Enlace para regresar -->
    <a class="link_a" href="../Racing/index.php">&lt; Racing Sails</a>

    <!-- Título de la página -->
    <h1>Panelled Race Series</h1>

    <!-- Contenido informativo -->
    <p>Panelled race sails are a type of sail construction commonly used in racing. This method involves stitching together several panels of sailcloth to form a larger sail shape. The panels are usually cut from different parts of the sailcloth to optimise strength, stretch, and weight, resulting in a sail that is both strong and lightweight.</p>

    <p>These sails are often made from high-performance materials, such as FibrePath Regatta, laminated sailcloth, or Mylar film. These fabrics are selected for their strength, low stretch, and resistance to UV damage. The specific construction and layout depend on the sailmaker’s design and the sail’s intended use.</p>

    <p>Panelled race sails are popular across many racing classes because they offer excellent performance at a relatively affordable cost. They’re typically used on boats ranging from small dinghies to larger keelboats, providing maximum speed and efficiency in various wind conditions.</p>

    <p>There are also many other types of sail constructions available, including fully battened, partially battened, and furling sails. The right choice depends on the boat type, sailing conditions, and the sailor’s preferences and budget.</p>

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
          <h3>Contact Us</h3>
        </div>
      </a>
    </div>
  </section>

</body>
</html>

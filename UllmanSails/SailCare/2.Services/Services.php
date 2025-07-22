<style media="screen">
/* Contenedor principal de texto */
.text {
  position: relative;
  background-color: #F8F8FA;
  padding: 4vw 6vw;
  overflow: hidden;
  display: flex;
  justify-content: center;
  flex-direction: column;
}

/* Título principal */
.text h1 {
  color: #005598;
  padding: 0 0 2vw 0;
  font-size: 2.3em;
  text-align: center;
}

/* Párrafos del contenido */
.text p {
  position: relative;
  text-align: justify;
  font-size: 1.2em;
  margin: 1vw 0;
}

/* Listas dentro del contenedor */
.text ul {
  width: 100%;
  font-size: 1.2em;
  margin: 0 0 0 25px;
  text-align: left;
}

/* Enlace de regreso (Home) */
.link_a {
  all: unset;
  position: relative;
  margin-left: -20px;
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

/* Enlace de contacto (botón completo con estilo personalizado) */
.link_contact_us {
  all: unset;
  position: relative;
  text-decoration: none;
}

/* Caja de servicio (no se usa en este bloque pero lo mantengo si es parte global) */
.box-services {
  position: relative;
  width: 300px;
  height: 200px;
  min-width: 300px;
  min-height: 200px;
  margin: 10px 0;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Botón de contacto */
.buttonTitle {
  position: relative;
  width: 200px;
  background-color: #005598;
  padding: 14px 0;
  cursor: pointer;
  margin: 50px auto 0 auto;
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
</style>

<section class="text">
  <a class="link_a" href="../Home/index.php">&lt; Home</a>
  <h1>Sail Care</h1>
  <p>Sun, salt water, and high humidity are all enemies of the materials in your
    sails. Clearly, normal use will expose your sails to the elements, but good
    sail care practices can minimise the effects of this exposure. Similarly,
    good sail care is key to ensuring sail longevity – practices such as luffing,
    flapping or flogging, leech flutter, and crushing sails into bags will all
    contribute to a shorter sail life and should be avoided.</p>
  <p>Ullman Sails provides a comprehensive list of best practices for sail care
    to maintain the quality of your sail. They are not substitutes for sail care
    but can help you maintain your sails and help minimise unexpected or major
    repairs. As with a car or any other long-term use equipment, Ullman Sails
    recommends regular service check-ups for your sails at your local loft.</p>


  <a class="link_contact_us" href="../ContactUs/index.php">
    <div class="buttonTitle">
      <h3>Contact us</h3>
    </div>
  </a>
</section>

<!-- Script reservado para futuras funcionalidades -->
<script type="text/javascript">
  // No se utiliza JS en este bloque, puedes agregar lógica aquí si se necesita
</script>

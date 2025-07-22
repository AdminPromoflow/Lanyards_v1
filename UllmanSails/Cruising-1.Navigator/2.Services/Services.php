<style media="screen">
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

.text h1 {
  color: #005598;
  padding: 0 0 2vw 0;
  font-size: 2.3em;
  text-align: center;
}

.text h2 {
  color: #005598;
  text-align: left;
  width: 100%;
  padding: 2vw 0 0 0;
  margin-bottom: 10px;
  font-weight: 400;
}

.text p {
  text-align: justify;
  padding-left: 1vw;
  margin: 10px 0;
  font-size: 1.2em;
  width: 100%;
}

.text ul {
  width: 100%;
  font-size: 1.2em;
  margin: 0 0 0 25px;
  text-align: left;
}

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

.link_contact_us {
  position: relative;
  text-decoration: none;
  all: unset;
}

.box-services {
  position: relative;
  width: 300px;
  height: 200px;
  min-width: 300px;
  min-height: 200px;
  margin: 10px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.buttonTitle {
  position: relative;
  width: 200px;
  background-color: #005598;
  padding: 14px 0;
  cursor: pointer
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

/****************** Contenedor bottom **********************/
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
  gap:20px;
}

/****************** Botón **********************/
.link_quote {
  all: unset;
  text-decoration: none;
  margin: 0 10px;
}

.button_quote {
  position: relative;
  width: 200px;
  padding: 14px 0;
  cursor: pointer;
  border: 1px solid #202E52;
  margin: auto;
}

.button_quote1 {
  background-color: #005596;
}

.button_quote1:hover {
  background-color: #245580;
}

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
/* === RESPONSIVE: COLUMNA EN PANTALLAS PEQUEÑAS === */
@media (max-width: 800px) {
  .Container_bottom {
    flex-direction: column;
    gap: 20px;
  }
}
</style>

<section class="text">
  <a class="link_a" href="../Cruising/index.php">&lt; Cruising Sails</a>
  <h1>Navigator Series</h1>

  <p>The Navigator Series offers cruising sailors affordable, durable sails for day sailing and coastal cruising. While some sailmakers offer a standard stock line of inexpensive cruising sails, every Ullman Sails Navigator sail is custom designed to match your exact boat specifications and sailing style.</p>

  <h2>Sail Cloth Selection Matters</h2>

  <p>All Ullman Sails products are built using dependable brand-name cloth that ensures greater consistency in quality, shape-retention and durability than off-brand cloth. This means your sails will not only last longer, but also provide a safer and more comfortable cruising experience.</p>

  <p>Navigator Series sails are built using a cross-cut construction with quality, tightly woven Dacron – the most durable material available when considering sail longevity. Dacron withstands exposure to the elements and high-wind flogging better than any other sail material.</p>

  <h2>Performance and Handling</h2>

  <p>Every Navigator Series sail is custom-designed by an Ullman Sails designer to ensure a high-quality performance sail shape. Efficient sail shape makes it easier to trim your sails through a wide range of conditions and helps to reduce heel. Our sailmakers will also customize your sail with the appropriate hardware and finishing details to ensure the sail will fit your furling unit or other handling systems.</p>

  <h2>Design</h2>

  <p>A sail’s design and shape are just as important in cruising as in racing. Our design team, equipped with decades of experience and SMAR Azure® sail design software, design cruising sails to make the boat easier to sail and control through changing conditions. Each designer accurately addresses the loads each sail will endure to simplify sail handling and effectively increase a sail’s reliability, longevity, and performance.</p>

  <h2>Standard Specifications</h2>
  <ul>
    <li>Triple-Step Stitching on Every Seam</li>
    <li>Stainless Steel Rings</li>
    <li>Aluminum Headboards for Mainsails</li>
    <li>Standard Battened Mainsails</li>
    <li>Fiberglass Battens</li>
    <li>Reinforced Batten Pockets</li>
    <li>Hanks or Slides</li>
    <li>Telltales on Headsails</li>
  </ul>

  <h2>Available Options</h2>
  <ul>
    <li>Additional reefs for Mainsails</li>
    <li>Roller Reef Patch</li>
    <li>Foam Luff for Headsails</li>
    <li>U.V. Covers / Treatment for Furling Sails</li>
    <li>Sail Numbers & Draft Stripes</li>
    <li>Full Battens</li>
  </ul>

  <br><br>

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
</script>

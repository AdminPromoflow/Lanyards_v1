<style media="screen">
.text {
  position: relative;
  background-color: #FDF6F8;
  padding: 4vw 6vw;
  overflow: hidden;
  display: flex;
  justify-content: center;
  flex-direction: column;
}

.text h1 {
  color: #005598;
  padding: 0 0 2vw 0;
  font-size: 2.3em;
  text-align: center;
}

.text p {
  position: relative;
  text-align: justify;
  font-size: 1.2em;
  margin: 1vw 0;
}

.text ul {
  width: 100%;
  font-size: 1.2em;
  margin-left: 25px;
  text-align: left;
}

.link_a {
  all: unset;
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

.link_contact_us {
  all: unset;
  cursor: pointer;
}

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
  <a class="link_a" href="../Services/index.php">&lt; Services</a>
  <h1>Experience Enhanced Sailing with Advanced Hardware Upgrades</h1>
  <p>
    At Ullman Sails, we specialise in elevating your sailing endeavours through advanced hardware upgrades.
    Our dedicated team is passionate about equipping your vessel with the latest advancements in maritime technology.
  </p>
  <p>
    From modern rigging solutions to state-of-the-art navigation systems, we offer a diverse range of upgrades designed to improve both performance and safety on the water.
    With our expertise and commitment to quality, we ensure your sailing experience is taken to an entirely new level.
    Discover the possibilities of enhanced seafaring with Ullman Sails—where each upgrade represents a step towards smoother, more efficient voyages.
  </p>

  <a class="link_contact_us" href="../ContactUs/index.php">
    <div class="buttonTitle">
      <h3>Contact us</h3>
    </div>
  </a>
</section>

<script type="text/javascript">
const buttonTitle = document.querySelectorAll(".OpenContactUs");

for (let i = 0; i < buttonTitle.length; i++) {
  buttonTitle[i].addEventListener("click", function () {
    window.open("../ContactUs/index.php", "_self");
  });
}
</script>

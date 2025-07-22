<style media="screen">
/* Container section */
.text {
  position: relative;
  background-color: #F8F8FA;
  padding: 4vw 6vw;
  overflow: hidden;
  display: flex;
  justify-content: center;
  flex-direction: column;
}

/* Heading */
.text h1 {
  color: #005598;
  padding: 0 0 2vw 0;
  font-size: 2.3em;
  text-align: center;
}

/* Paragraph text */
.text p {
  position: relative;
  text-align: justify;
  font-size: 1.2em;
  margin: 1vw 0;
}

/* List styling */
.text ul {
  width: 100%;
  font-size: 1.2em;
  margin-left: 25px;
  text-align: left;
}

/* Link: Back to services */
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

/* Contact button link */
.link_contact_us {
  all: unset;
  cursor: pointer;
}

/* Optional image box (not used here, but available) */
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

/* Contact button styling */
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
  <h1>Sails and Canvas Cleaning: Renewing Your Nautical Assets</h1>
  <p>
    At Ullman Sails, we understand the importance of well-maintained sails and canvas for your maritime pursuits.
    Our specialised cleaning services offer a fresh start for your equipment, removing the marks of salt, grime, and time.
  </p>
  <p>
    With a focus on preserving the integrity of fabrics and materials, we meticulously cleanse and rejuvenate,
    ensuring your sails catch the wind optimally and your canvas withstands the elements.
    Experience revitalisation as your sailing essentials are brought back to life, ready to accompany you on countless new adventures.
  </p>
  <a class="link_contact_us" href="../ContactUs/index.php">
    <div class="buttonTitle">
      <h3>Contact us</h3>
    </div>
  </a>
</section>

<script type="text/javascript">
// Handles optional .OpenContactUs buttons elsewhere
const buttonTitle = document.querySelectorAll(".OpenContactUs");

for (let i = 0; i < buttonTitle.length; i++) {
  buttonTitle[i].addEventListener("click", function () {
    window.open("../ContactUs/index.php", "_self");
  });
}
</script>

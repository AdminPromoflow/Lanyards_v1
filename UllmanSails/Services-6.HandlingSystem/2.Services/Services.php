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
  <h1>Transform Your Sailing Experience with Cutting-Edge Sail Handling Systems</h1>
  <p>
    Ullman Sails is your premier destination for revolutionary sail handling systems that redefine the way you navigate the seas. Our innovative solutions provide effortless sail adjustments, seamless reefing, and smooth transitions — all with exceptional control.
  </p>
  <p>
    Whether you are enjoying a relaxed cruise or competing in a high-stakes regatta, our expertly engineered systems deliver unmatched performance and precision. Elevate your sailing experience with Ullman Sails, where advanced technology meets superior craftsmanship for a truly transformative journey.
  </p>
  <a class="link_contact_us" href="../ContactUs/index.php">
    <div class="buttonTitle">
      <h3>Contact us</h3>
    </div>
  </a>
</section>

<script type="text/javascript">
const buttonTitle = document.querySelectorAll(".OpenContactUs");

buttonTitle.forEach(button => {
  button.addEventListener("click", () => {
    window.open("../ContactUs/index.php", "_self");
  });
});
</script>

<style media="screen">
/* Section container */
.text {
  background-color: #F8F8FA;
  padding: 4vw 6vw;
  overflow: hidden;
  display: flex;
  justify-content: center;
  flex-direction: column;
}

/* Main heading */
.text h1 {
  color: #005598;
  padding-bottom: 2vw;
  font-size: 2.3em;
  text-align: center;
}

/* Paragraphs */
.text p {
  text-align: justify;
  font-size: 1.2em;
  margin: 1vw 0;
}

/* Unordered list */
.text ul {
  width: 100%;
  font-size: 1.2em;
  margin-left: 25px;
  text-align: left;
}

/* Back link */
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

/* Styled button container */
.buttonTitle {
  width: 200px;
  background-color: #005598;
  padding: 14px 0;
  cursor: pointer;
  margin: 50px auto 0 auto;
  border: 1px solid #202E52;
  text-align: center;
}

.buttonTitle:hover {
  background-color: #202E52;
}

/* Button title text */
.buttonTitle h3 {
  font-size: 1.3em;
  font-weight: 500;
  color: #F2F2F2;
}

/* Optional image box */
.box-services {
  width: 300px;
  height: 200px;
  margin: 10px 0;
  background-position: centre;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

<section class="text">
  <a class="link_a" href="../Services/index.php">&lt; Services</a>
  <h1>Expert Sail Repair Services for Optimal Performance</h1>
  <p>
    Welcome to your trusted destination for comprehensive sail repair solutions.
    Our team of skilled sailmakers and technicians is dedicated to giving new life to your sails,
    ensuring they perform at their peak on every voyage.
  </p>
  <p>
    From minor repairs to major overhauls, we specialise in addressing a wide range of sail issues —
    including tears, stitching, UV damage, and more. With a commitment to quality craftsmanship and attention to detail,
    we take pride in extending the lifespan of your sails and maximising your sailing experience.
  </p>
  <p>
    Choose us for reliable, expert sail repairs that keep you sailing confidently — whatever the conditions.
  </p>
  <a class="link_contact_us" href="../ContactUs/index.php">
    <div class="buttonTitle">
      <h3>Contact us</h3>
    </div>
  </a>
</section>

<script type="text/javascript">
  // Optional handler for dynamically added buttons
  const buttonTitle = document.querySelectorAll(".OpenContactUs");

  buttonTitle.forEach(button => {
    button.addEventListener("click", function () {
      window.open("../ContactUs/index.php", "_self");
    });
  });
</script>

<style media="screen">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

footer {
  position: relative;
  background-color: #005598;
  color: #F2F2F2;
  font-family: 'Poppins', sans-serif;
  font-size: 0.9em;
  padding: 50px 0;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 5px;
  margin: 0;

}

footer a {
  text-decoration: none;
  color: white;
  transition: color 0.3s ease;
}
footer a:hover {
  color: black;
}

footer h3 {
  font-size: 1.8em;
  font-weight: 600;
}

footer li {
  font-size: 1.1em;
  font-weight: 300;
  margin: 5px 0;
}

footer img {
  width: 40px;
}

.contain_footer {
  position: relative;
  min-width: 200px;
  padding: 10px;
}
.contain_footer:nth-child(1) {
  min-width: 300px;
  width: 500px;
}

.footer__headline {
  font-weight: bold;
}

.footer__list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.TermsAndConditions {
  position: absolute;
  bottom: 15px;
  width: 100%;
  text-align: center;
  font-size: 1em;
  font-weight: 400;
  cursor: pointer;
  padding-top: 10px;
}


</style>

<footer>
  <div class="contain_footer">
    <h3 class="footer__headline">Contact – United Kingdom</h3>
    <ul class="footer__list">
      <li><strong>Plymouth</strong> (South West) – 01752 337 131</li>
      <li><strong>Hamble</strong> (South) – 02380 457711</li>
    </ul>
  </div>

  <div class="contain_footer">
    <h3 class="footer__headline">Ullman Sails</h3>
    <ul class="footer__list">
      <li><a href="../Home/index.php">Home</a></li>
      <li><a href="../SailCare/index.php">Sail Care</a></li>
      <li><a href="../SailCare/index.php">Canvas</a></li>
      <li><a href="../Services/index.php">Services</a></li>
      <li><a href="../AboutUs/index.php">About Us</a></li>
      <li><a href="../News/News.php">News</a></li>
      <li><a href="../ContactUs/index.php">Contact Us</a></li>
    </ul>
  </div>

  <div class="contain_footer">
    <h3 class="footer__headline">Sail Types</h3>
    <ul class="footer__list">
      <li><a href="../Racing/index.php">Racing</a></li>
      <li><a href="../Cruising/index.php">Cruising</a></li>
    </ul>
  </div>

  <div class="contain_footer">
    <h3 class="footer__headline">Social Media</h3>
    <ul class="footer__list">
      <li><a href="https://www.facebook.com/ullmansails.co.uk/" target="_blank">Facebook</a></li>
      <li><a href="https://www.instagram.com/ullmansailsuk/" target="_blank">Instagram</a></li>
      <li><a href="https://twitter.com/ullmansailsuk" target="_blank">Twitter</a></li>
      <li><a href="https://www.youtube.com/user/UllmanSailsTV" target="_blank">YouTube</a></li>
    </ul>
  </div>

  <h3 id="TermsAndConditions" class="TermsAndConditions">Terms & Conditions</h3>
</footer>

<script type="text/javascript">
  document.getElementById('TermsAndConditions').addEventListener("click", function () {
    window.open("../General/TermsAndConditions/TermsAndConditions.php", "_blank");
  });
</script>

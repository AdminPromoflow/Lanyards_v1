<style media="screen">
/* Footer */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

footer {
  position: relative;
  background-color:  #005598;
  color: #F2F2F2;
  font-size: 0.8em;
  padding: 50px 0;
  min-width: 100vw;
  margin: 15px 0 0 0;
  font-family: 'Poppins', sans-serif;

  display: flex;
  justify-content: center;
  flex-direction: row;
  flex-wrap: wrap;
  gap:5px;
  }

  footer li{
    font-size: 1.5em;
    font-weight: 300;
  }

  footer img {
    width: 40px;
  }
  footer a {
    text-decoration: none;
    color: white;
    font-size: 0.9em;
  }
  footer a:hover {
    color: #2645A2;
  }
  footer h3{
    font-size: 1.8em;
  }
.contain_footer{
  position: relative;
  min-width: 200px;
  padding: 10px;
}
.contain_footer:nth-child(1){
  min-width: 300px;
  width: 500px;
}
  .footer__headline {
    font-weight: bold;
    font-family: 'Helvetica';
  }

  .footer__list {
    font-family: 'Helvetica';
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .TermsAndConditions{
    position: absolute;
    text-align: center;
    bottom: 15px;
    font-size: 1.2em;
    font-weight: 400;
    cursor: pointer;
    margin: 0px;
    padding: 10px 0 0 0;
  }
  @media(max-width: 850px){

      footer {
        max-width: 600px;
        margin: 0 auto;
      }

  }

</style>
<footer>
  <div class="contain_footer">
    <h3 class="footer__headline"> CONTACT – United Kingdom</h3>
    <br>
    <ul class="footer__list">
    <!--  <img src="assets/imgs/Logo.png" alt=""> -->
      <li> <strong>Plymouth</strong>  (South West) – 01752 337 131</li>
      <li> <strong>Hamble</strong>  (South) - 02380 457711</li>
    </ul>
  </div>

  <div class="contain_footer">
    <h3 class="footer__headline"> Ullman sails: </h3>
    <ul class="footer__list">
      <li> <a href="../Home/index.php">Home</a> </li>
      <li> <a href="../SailCare/index.php">Sail care</a> </li>
      <li> <a href="../SailCare/index.php">Canvas</a> </li>
      <li> <a href="../Services/index.php">Services</a> </li>
      <li> <a href="../AboutUs/index.php">About us</a> </li>
      <li> <a href="../News/News.php">News</a> </li>
      <li> <a href="../ContactUs/index.php">Contact Us</a> </li>
    </ul>
  </div>

  <div class="contain_footer">
    <h3 class="footer__headline"> Sail Types: </h3>
    <ul class="footer__list">
      <li> <a href="../Racing/index.php">Racing</a> </li>
      <li> <a href="../Cruising/index.php">Cruising</a> </li>
    </ul>
  </div>

  <div class="contain_footer">
    <h3 class="footer__headline"> Social Media: </h3>
    <ul class="footer__list">
      <li> <a href="https://www.facebook.com/ullmansails.co.uk/?_rdc=2&_rdr" "_black">Facebook</a> </li>
      <li> <a href="https://www.instagram.com/ullmansailsuk/" "_black">Instagram</a> </li>
      <li> <a href="https://twitter.com/ullmansailsuk" "_black">Twitter</a> </li>
      <li> <a href="https://www.youtube.com/user/UllmanSailsTV" "_black">Youtube</a> </li>
    <!--  <li> <a href="#">Terms & Conditions</a> </li> -->
    </ul>
  </div>

  <h3 id="TermsAndConditions" class="TermsAndConditions">Terms & Conditions</h3>
</footer>
<script type="text/javascript">

   var TermsAndConditions = document.getElementById('TermsAndConditions');

   TermsAndConditions.addEventListener("click", function(){
     var url = "../General/TermsAndConditions/TermsAndConditions.php";
     var ventanaNueva = window.open(url, "_blank");
   })
</script>

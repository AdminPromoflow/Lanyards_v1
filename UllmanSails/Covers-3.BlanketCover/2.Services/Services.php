<style media="screen">
.services{
  position: relative;
  padding: 0;
  margin: 0;
  border: 0;
  overflow: hidden;
}
.text{
  position: relative;
  background-color: #FDF6F8;
  padding: 4vw 6vw  4vw 6vw;

  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.link_a{
  position: relative;
  all: unset ;
  margin-left: 100px;
  color: #202E52 ;
  font-weight: 600 ;
  font-size: 1.1em ;
  cursor: pointer ;
  text-align: left ;
  width: 100vw ;
}
.link_a:hover{
  text-decoration: underline;
}

.text h1{
  color: #005598;
  padding: 0vw 0 2vw 0;
  font-size: 2.3em;
  text-align: center;
}
.text p{
  position: relative;
  text-align:justify;
  padding-left: 1vw;
  font-size: 1.2em;
  left: 0px;
  width: 100%;
  margin: 1vw 0 1vw 0;
}
.link_contact_us{
  position: relative;
  background-color: red;
  text-decoration: none;
  all: unset;
}
.buttonTitle{
   position: relative;
   width: 200px;
   background-color: #005598;
   padding: 14px 0px;
   cursor: pointer;
   border: 1px solid #202E52;
 }
 .buttonTitle:hover{
   background-color: #202E52;
 }
 .buttonTitle h3{
   text-align: center;
   font-size: 1.3em;
   font-weight: 500;
   color: #F2F2F2;
 }

</style>
<section class="services">

  <div class="text">
    <a class="link_a"  href="../Covers/index.php">&lt; Boat Covers</a>
  <h1>Blanket Cover</h1>
 <p>Perfect for short stays or weekends afloat, a blanket cover offers quick,
   effective protection for your mainsail when it’s left on the boom. Made from
   durable acrylic canvas and secured underneath, it’s easy to fit and remove.
   Add your boat name on either side to make it your own.<br><br>
</p>
<a class="link_contact_us" href="../ContactUs/index.php">
  <div class="buttonTitle">
    <h3 >Contact us</h3>
  </div>
</a>
</div>

</section>

<script type="text/javascript">
const buttonTitle = document.querySelectorAll(".OpenContactUs");

for (let i = 0; i < buttonTitle.length; i++) {
 buttonTitle[i].addEventListener("click", function(){
    window.open("../ContactUs/index.php", "_self");
 })
}




</script>

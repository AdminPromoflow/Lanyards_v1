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
  <h1>Bimini</h1>
  <p>
    A Bimini is a lightweight, open-front shade cover mounted over the cockpit or helm
    area of a cruising sailboat. Built with a rigid frame and marine-grade canvas, it
    offers vital sunshade while still allowing ventilation and visibility. The UV
    protection helps prevent sunburns and keeps the cockpit cooler during long days
    under sail. Most Biminis are foldable, letting you retract them when not needed
    or during strong winds. With a proper mounting system and strong support poles,
    a Bimini provides reliable, stable cover. It’s a favourite for sailors seeking
    comfort and protection.<br><br>

    Cruisers love the Bimini because it creates a shaded zone without compromising
    space or mobility. Whether anchored or under way, it shields crew and guests
    from harmful UV rays and glare. The canvas used is often waterproof and mildew-resistant,
    ensuring durability in saltwater conditions. You can also find models with extension
    panels to increase coverage for larger cockpits. The frame is usually stainless steel
    or aluminium for long-lasting use. A quality Bimini is a simple but essential upgrade
    for leisure sailing.<br><br>

    Many Bimini tops are now designed with modular features, allowing sailors to zip on
    side panels or connect with a dodger or sprayhood for more protection. This enhances
    both weather resistance and privacy on board. Custom-fit mounting brackets ensure the
    Bimini stays secure even during rough conditions. With the right support poles, it can
    withstand gusty winds and offer a safe haven from midday heat. Foldable designs allow
    for quick removal or stowage when you need clear overhead space for sails. It’s an all-season ally.<br><br>

    Fun fact: Some high-end Bimini systems now come equipped with solar panels integrated
    into the canvas, combining shade cover and renewable energy in one smart design.<br><br>

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

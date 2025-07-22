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
  background-color: #F8F8FA;
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
  <h1>Winter Cover</h1>
  <p>
    A winter cover is a vital piece of equipment for boat owners preparing for storage during
    the cold season. Designed for full protection, it shields your cruising sailboat from snow,
    ice, rain, and freezing winds. These heavy-duty, cold-resistant covers are made from waterproof
    marine-grade fabric, ensuring durability throughout the harshest winter months. Proper
    ventilation flaps help prevent condensation from forming underneath. This is key for mould
    prevention, preserving your deck, canvas, and rigging. Investing in a quality winter cover
    can significantly reduce spring maintenance work. <br><br>

    Cruising sailors often leave their boats idle during winter, making complete storage
    protection essential. A winter cover protects not only the deck but also sensitive
    areas like hatches, winches, and cockpit gear. Its full protection design often extends
    down the hull sides, creating a barrier against freezing conditions and UV degradation
    alike. Snow accumulation on exposed decks can add stress to structural elements,
    especially on older boats. Cold-resistant materials help ensure the cover remains
    flexible and doesn’t crack or tear. It's a simple step that offers long-term boat
    care benefits.<br><br>

    Many winter covers are now custom-fitted to each boat model, providing an exact,
    tight fit that prevents flapping and water ingress. Elastic hems, straps, and
    reinforced stitching are common on these heavy-duty models. While the exterior
    repels snow and ice, interior ventilation helps maintain airflow, keeping mildew
    and dampness at bay. For sailors who store their vessels outdoors, especially in northern
    climates, a winter cover can be as crucial as antifreeze. It’s about protecting your
    investment during long periods of inactivity.<br><br>

    Fun fact: Well-ventilated winter covers with mildew control systems are even used in
    Scandinavian countries where boats are stored under metres of snow—proof of their
    importance in extreme conditions.<br><br>

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

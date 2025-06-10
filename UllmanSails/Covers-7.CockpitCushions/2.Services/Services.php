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
  <h1>Cockpit Cushions</h1>
  <p>
    Cockpit cushions bring a new level of comfort to your sailing experience, transforming
    hard seating into inviting relaxation zones. Crafted from high-density foam and covered
    in marine fabric, these cushions are designed for long-lasting durability in the harshest
    sea environments. Whether you're cruising long distances or enjoying a quiet evening in port,
    good cushions make a huge difference. The materials used are typically UV resistant and
    waterproof, ensuring that the colours and quality remain intact over time. This
    means they won’t fade or degrade under strong sun or salt spray. Every serious cruiser knows
    that seating comfort is essential. <br><br>

    One of the key features is the non-slip backing, which keeps the cushions in place even when
    the boat is heeling or rocking. This adds not only convenience but safety when moving around
    the cockpit. Many modern cockpit cushions also come with removable covers, making them easy
    to clean after salty or wet adventures. Designed to match the boat’s aesthetics, they also
    enhance the style of your vessel. Whether in port or under sail, they create a welcoming
    outdoor space for dining, lounging, or planning your next leg. Functional and stylish,
    they are more than a luxury — they’re practical gear.<br><br>

    These cushions are not just for show — they provide durable, ergonomic support for those
    long hours on the helm or lounging under the sprayhood. Thanks to high-quality foam,
    they hold their shape over time and resist flattening. Some even feature dual-density
    foam for added support and softness in the right areas. The marine fabric is mildew-resistant
    and quick-drying, perfect for wet weather or salty conditions. A good set of cockpit cushions
    can turn your boat into a floating living room. And when not in use, they’re easy to stack and stow.<br><br>

    Fun fact: The concept of cockpit cushions was inspired by classic yacht lounges — early sailors
    stitched wool and cotton by hand before waterproof, UV-resistant materials revolutionised their
    use. Now, even custom-stitched embroidery is common for cruisers who want comfort with a touch of
    personal flair.<br><br>
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

<style media="screen">
.text{
  position: relative;
  background-color: #FDF6F8;
  padding: 4vw 6vw  4vw 6vw;
  overflow: hidden;

  display: flex;
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
  font-size: 1.2em;
  margin: 1vw 0 1vw 0;

}
.text  ul{
  width: 100%;
  font-size: 1.2em;
  margin: 0 0 0 25px;
  text-align: left;
}
.link_a{
  position: relative;
  all: unset ;
  margin-left: -20px;
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
.link_a:hover{
  text-decoration: underline;
}
.link_contact_us{
  position: relative;
  background-color: red;
  text-decoration: none;
  all: unset;
}

.box-services{
  position: relative;
  width: 300px;
  height: 200px;
  min-width: 300px;
  min-height: 200px;
  margin: 10px 0;

  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;  /* Resize the background image to cover the entire container */
}
.buttonTitle{
   position: relative;
   width: 200px;
   background-color: #005598;
   padding: 14px 0px;
   cursor: pointer;
   margin: 50px  auto 0px auto;

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

<section class="text">
  <a class="link_a"href="../Services/index.php">&lt; Services</a>
    <h1>Expert Sail Repair Services for Optimal Performance</h1>
    <p>Welcome, your trusted destination for comprehensive sail repair solutions. Our team of skilled sailmakers and technicians is dedicated to breathing new life into your sails, ensuring they perform at their peak on every voyage. From minor fixes to major overhauls, we specialize in addressing a wide range of sail issues, including tears, stitching, UV damage, and more. With a commitment to quality craftsmanship and attention to detail, we take pride in extending the lifespan of your sails and maximizing your sailing experiences. Choose us for reliable, expert sail repairs that keep you sailing confidently, no matter the conditions.</p>
    <a class="link_contact_us" href="../ContactUs/index.php">
      <div class="buttonTitle">
        <h3 >Contact us</h3>
      </div>
    </a>

</section>

<script type="text/javascript">
const buttonTitle = document.querySelectorAll(".OpenContactUs");

for (let i = 0; i < buttonTitle.length; i++) {
 buttonTitle[i].addEventListener("click", function(){
    window.open("../ContactUs/index.php", "_self");
 })
}




</script>

<style media="screen">

.text{
  position: relative;
  background-color: #FDF6F8;
  padding: 4vw 6vw  4vw 6vw;

}
.text h1{
  color: #005598;
  padding: 0vw 0 2vw 0;
  font-size: 2.3em;
  text-align: center;

}
.text h2{
  color: #202E52;
  text-align: left;
  width: 100%;
  padding: 2vw 0 0vw 0;
  margin-bottom: 10px;
  font-weight: 400;
  color: #005598;
}
.text p{
  position: relative;
  text-align:;justify;
  padding-left: 1vw;
  font-size: 1.2em;
  left: 0px;
  margin: 1vw 0 1vw 0;
}
.text  ul{
  width: 100%;
  padding-left: 35px;
  padding-bottom: 10px;
  font-size: 1.2em;
}

.services{
  position: relative;
  padding: 2vw 6vw;
  width: 100vw;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  background-color: #FDF6F8;
}
.services a{
   all: unset;
   color:#202E52;
}
.smallFont{
  position: absolute!important;
  transform: translateY(-147%)!important;

}
.smallFont2{
  position: absolute!important;
  font-size: 2;
  left: 1px!important;
}
.box-services{
  position: relative;
  width: 300px;
  height: 200px;
  min-width: 300px;
  min-height: 200px;
  margin: 10px;

  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;

  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}
.wrap-box-services{
  position: relative;
  padding: 7px 14px;
  background-color: rgba(197, 35, 74, .1);
  height: 70%;
  width: 70%;
  top: 50%;
  transform: translateY(-50%);
}

.wrap-box-services:hover{
  background-color: rgba(197, 35, 74, .3);
}


.wrap-box-services h3{
  position: relative;
  top: calc(6em);
  transform: translateY(-200%);
  text-align: center;
  color: white;
  font-weight: 500;
  font-size: 1.9em;
  text-shadow: 1px 1px 1px black;
  cursor: pointer;
}
.wrap-box-services h4{
  position: relative;
  top: calc(4.8em);
  transform: translateY(-200%);
  text-align: center;
  font-weight: 200;
  font-size: 1.1em;
  color: white;
  text-shadow: 1px 1px 1px black;
  opacity: 0;
  transition: .4s;
  cursor: pointer;
}
.wrap-box-services:hover h4{
  text-decoration: underline;
  opacity: 1;
}
.pictureCruising1{
  background-image: url("../Services/2.Services/RepairSails.jpg");
}
.pictureCruising2{
  background-image: url("../Services/2.Services/CanvasCleaning.jpg");
}
.pictureCruising3{
  background-image: url("../Services/2.Services/CanvasRepairs.jpg");
}
.pictureCruising4{
  background-image: url("../Services/2.Services/HadwareUpgrades.jpg");
}
.pictureCruising5{
  background-image: url("../Services/2.Services/FurlingSystemInstallation.jpg");
}
.pictureCruising6{
  background-image: url("../Services/2.Services/HandlingSystem.jpg");
}
.comeBack {
  all: unset !important;
  color: #202E52 !important;
  font-weight: 600 !important;
  font-size: 1.1em !important;
  cursor: pointer !important;
  text-align: left !important;
  width: 100vw !important;
}
.comeBack:hover{
  text-decoration: underline !important;
}
</style>
<section class="services">
  <div class="text">
    <a class="comeBack"href="../Home/index.php">&lt; Home</a>
    <h1>Services</h1>
    <p>Ullman Sails offers a variety of services to help you maintain the quality
      of your current sail inventory. We apply our extensive knowledge and experience
      to make sure you ..... details. The answer isn't always a brand new sail.
      We'll find the right solution that meets your goals and your budget. </p>

</div>
<a href="../Services-1.SailsRepair/index.php">
  <div class="box-services pictureCruising1">
    <div class="wrap-box-services">
      <h3>All Sail Repairs</h3>
    </div>
  </div>
</a>
<a href="../Services-2.SailsCleaning/index.php">
  <div class="box-services pictureCruising2">
    <div class="wrap-box-services">
      <h3 class="smallFont">Sail and Canvas Cleaning</h3>
    </div>
  </div>
</a>
<a href="../Services-3.CanvasRepair/index.php">
  <div class="box-services pictureCruising3">
    <div class="wrap-box-services">
      <h3>Canvas Repairs</h3>
    </div>
  </div>
</a>
<!--<a href="../Services-4.HarwareUpgrades/index.php">
  <div class="box-services pictureCruising4">
    <div class="wrap-box-services">
      <h3>Hardware Upgrades</h3>
    </div>
  </div>
</a>
<a href="../Services-5.FurlingSystem/index.php">
  <div class="box-services pictureCruising5">
    <div class="wrap-box-services">
      <h3 class="smallFont">Furling System Installation </h3>
    </div>
  </div>
</a>
<a href="../Services-6.HandlingSystem/index.php">
  <div class="box-services pictureCruising6">
    <div class="wrap-box-services">
      <h3 class="smallFont2">Sail Handling System  </h3>
    </div>
  </div>
</a>-->
</section>

<script type="text/javascript">
const buttonTitle = document.querySelectorAll(".OpenContactUs");

for (let i = 0; i < buttonTitle.length; i++) {
 buttonTitle[i].addEventListener("click", function(){
    window.open("../ContactUs/index.php", "_self");
 })
}




</script>

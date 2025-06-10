<style media="screen">
.services{
  position: relative;
  width: 100vw;
  min-width: 300px;
  margin: 25px 0 0 0;
  padding: 20px 30px;
  font-size: 16px;
  font-family: 'Poppins', sans-serif;

  display: flex;
  align-items: center;
  justify-content: center;
  flex-flow: row wrap;
  background-color: #F8F8FA;
  gap: 30px;
}
.services a{
 position: relative;
 all: unset;
 text-decoration: none;
 height: 650px;
 min-width: 300px;
 min-height: 500px;
 padding: 5px;

 display: flex;
 flex: 1 1 350px;
 margin: auto;
}
.other_box{
  position: absolute;
  width: 70vw;
  background-color: #202E52;
  padding: 60px;

  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);

  z-index: 3;
  border: 1px solid black;
  border-radius: 16px;

  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: row;
  flex-wrap: wrap;
  gap: 20px;
}
.other_box img{
  position: absolute;
  right: 0;
  top: 0;
  width: 30px;
  height: auto;
  margin: 20px;
  cursor: pointer;
}
.other_box h1{
  position: relative;
  width: 100%;
  color: #ffff;
  padding:  5px 0;

  text-align: center;
  font-weight: 500;
  font-size: 2rem;
}
.other_box p{
  position: relative;
  width: 90%;
  color: #ffff;
  padding:  15px;
  text-align: justify;
  font-weight: 300;
  font-size: 1rem;
}
.items_other_box{
  position: relative;
  background-color: blue;
  padding: 10px 0;
  min-width: 150px;
  height: 30vh;
  border: 1px solid black;
  border-radius: 16px;

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.items_other_box:nth-child(4){
  background-image: url("../Home/2.Services/Image/imgcrusing2.jpg");
}
.items_other_box:nth-child(5){
  background-image: url("../Home/2.Services/Image/imgcrusing1.jpg");
}
.items_other_box:nth-child(6){
  background-image: url("../Home/2.Services/Image/OneDesign.jpg");
}
.items_other_box:nth-child(7){
  background-image: url("../Home/2.Services/Image/DaveUllman.jpg");
}

.box-services{
  position: relative;
  width: 100%;
  height: 100%;

  display: flex;
  text-align: center;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  border: 1px solid black;
}
.pictureServicesHome1  {
  background-image: url("../Home/2.Services/Image/imgcrusing2.jpg"); /* The image used */
}
.pictureServicesHome2 {
  background-image: url("../Home/2.Services/Image/imgcrusing1.jpg"); /* The image used */
}
.pictureServicesHome3 {
  background-image: url("../Home/2.Services/Image/Racing.jpg"); /* The image used */
}
.wrap-box-services{
  position: relative;
  padding: 7px 14px;
  height: 100%;
  width: 100%;

  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.wrap-box-services:hover{
  background-color: rgba(197, 35, 74, .13);
}
.wrap-box-services h3{
  position: relative;
  text-align: center;
  color: white;
  font-weight: 500;
  font-size: clamp(1.2em, 2vw + 1em, 1.9em);
  text-shadow: 1px 1px 1px black;
  cursor: pointer;
}
.wrap-box-services h4{
  position: relative;
  text-align: center;
  font-weight: 200;
  font-size: 1.1em;
  color: white;
  text-shadow: 1px 1px 1px black;
  opacity: 0;
  transition: .3s;
  cursor: pointer;
}
.wrap-box-services:hover h4{
  text-decoration: underline;
  opacity: 1;
}
</style>
<section class="services">
  <div class="other_box">
    <img src="../Home/2.Services/Image/close.png" alt="">
    <h1>TITLE</h1>
    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
         Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
         eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
         sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <div class="items_other_box">

    </div>
    <div class="items_other_box">

    </div>
    <div class="items_other_box">

    </div>
    <div class="items_other_box">

    </div>
  </div>
  <a href="../Cruising/index.php">
    <div class="box-services pictureServicesHome1">
      <div class="wrap-box-services">
        <h3>Cruising Sails</h3>
        <h4>See more</h4>
      </div>
    </div>
  </a>
  <a href="../Cruising/index.php">
    <div class="box-services pictureServicesHome2">
      <div class="wrap-box-services">
        <h3>Cruising Sails</h3>
        <h3>Blue Line Spinnakers</h3>

        <h4>See more</h4>
      </div>
    </div>
  </a>
  <a href="../Racing/index.php">
    <div class="box-services pictureServicesHome3">
      <div class="wrap-box-services ">
        <h3>Racing Sails</h3>
        <h4>See more</h4>
      </div>
    </div>
  </a>
</section>
<script type="text/javascript">
</script>

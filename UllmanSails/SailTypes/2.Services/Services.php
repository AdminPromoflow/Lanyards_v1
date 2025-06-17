<style media="screen">
.text{
  position: relative;
  background-color: #FDF6F8;
  padding: 4vw 6vw  1vw 6vw;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
}
.text h1{
  color: #005598;
  padding: 0vw 0 2vw 0;
  font-size: 2.3em;

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
  text-align: justify;
  padding-left: 1vw;
  margin: 10px 0;
  font-size: 1.2em;
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
      margin: auto;
    }
    .wrap-box-services:hover{
      background-color: rgba(197, 35, 74, .3);
    }


    .wrap-box-services h3{
      position: relative;
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

  .pictureServicesHome1 {
    background-image: url("../Home/2.Services/Image/Cruising.jpg"); /* The image used */
  }
  .pictureServicesHome2 {
    background-image: url("../Home/2.Services/Image/Racing.jpg"); /* The image used */
  }
  .comeBack {
    all: unset;
    color: #202E52;
    font-weight: 600;
    font-size: 1.1em;
    cursor: pointer;
    text-align: left;
    width: 100vw;
  }
  .comeBack:hover{
    text-decoration: underline;
  }

</style>
<section class="text">
  <a class="comeBack"href="../Home/index.php">&lt; Home</a>
  <h1>Sails Types</h1>
  <br><br><br>
  <p>Whether you're a competitive sailor or a leisurely cruiser, choosing the right sails is essential for maximizing your time on the water. Racing sails are the thoroughbreds of the sailing world, meticulously designed and crafted to achieve maximum speed and performance. They are typically made from high-tech materials like carbon fiber and Kevlar, with a specialized shape that allows the boat to sail efficiently both upwind and downwind. If you're looking to win races and push the limits of what's possible on the water, racing sails are the way to go.</p>
  <p>For those seeking a more relaxed sailing experience, cruising sails offer a perfect balance of comfort and functionality. They are built for durability and ease of use, with a design that prioritizes stability and ease of handling over raw speed. Cruising sails are typically made from heavier, more durable materials like Dacron or polyester, which can withstand a variety of weather conditions and offer a longer lifespan. Whether you're planning a weekend getaway or a long-term voyage, cruising sails are the ideal choice for those who want to enjoy the freedom of the open sea without sacrificing comfort or reliability.</p>
</section>

<section class="services">
  <a href="../Cruising/index.php">
    <div class="box-services pictureServicesHome1">
      <div class="wrap-box-services">
        <h3>Cruising Sails</h3>
        <h4>See more</h4>
      </div>
    </div>
  </a>
  <a href="../Racing/index.php">
    <div class="box-services pictureServicesHome2">
      <div class="wrap-box-services ">
        <h3>Racing Sails</h3>
        <h4>See more</h4>
      </div>
    </div>
  </a>

</section>

<script type="text/javascript">

</script>

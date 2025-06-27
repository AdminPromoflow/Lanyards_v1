<style media="screen">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

.services {
  position: relative;
  width: 100vw;
  min-width: 300px;
  margin-top: 25px;
  padding: 20px 30px;
  font-size: 16px;
  font-family: 'Poppins', sans-serif;

  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  background-color: #F8F8FA;
  gap: 30px;
}

.services a {
  all: unset;
  display: flex;
  text-decoration: none;
  height: 60vh;
  width: 350px;
  min-width: 300px;
  min-height: 500px;
  padding: 5px;
  cursor: pointer;
}

.box-services {
  position: relative;
  width: 100%;
  height: 100%;
  border: 1px solid black;
  display: flex;
  text-align: center;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.pictureServicesHome1 {
  background-image: url("../Cruising/1.Slider/Topcrusingsails.jpg");
}
.pictureServicesHome2 {
  background-image: url("../Cruising-5.BlueLineSpinnakers/1.Slider/SlideHome.jpg");
}
.pictureServicesHome3 {
  background-image: url("../Racing/1.Slider/SlideHome.jpg");
  background-position: left;
}

.wrap-box-services {
  position: relative;
  width: 100%;
  height: 100%;
  padding: 7px 14px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.wrap-box-services:hover {
  background-color: rgba(197, 35, 74, 0.13);
}

.wrap-box-services h3 {
  color: white;
  font-weight: 500;
  font-size: clamp(1.2em, 2vw + 1em, 1.9em);
  text-align: center;
  text-shadow: 1px 1px 1px black;
  margin: 0;
}

.wrap-box-services h4 {
  color: white;
  font-weight: 200;
  font-size: 1.1em;
  text-align: center;
  text-shadow: 1px 1px 1px black;
  opacity: 0;
  transition: 0.3s;
  margin-top: 10px;
}

.wrap-box-services:hover h4 {
  opacity: 1;
  text-decoration: underline;
}
/* Responsive */

</style>

<section class="services">
  <a href="../Cruising/index.php">
    <div class="box-services pictureServicesHome1">
      <div class="wrap-box-services">
        <h3>Cruising Sails</h3>
        <h4>See more</h4>
      </div>
    </div>
  </a>

  <a href="../Cuising-6.BlueLineSpinnakers-Customize/index.php">
    <div class="box-services pictureServicesHome2">
      <div class="wrap-box-services">
        <h3>Blue Line Spinnakers</h3>
        <h4>See more</h4>
      </div>
    </div>
  </a>

  <a href="../Racing/index.php">
    <div class="box-services pictureServicesHome3">
      <div class="wrap-box-services">
        <h3>Racing Sails</h3>
        <h4>See more</h4>
      </div>
    </div>
  </a>
</section>

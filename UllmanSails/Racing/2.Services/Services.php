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
.box-container-raicing{
  position: relative;
  padding:0;
  width: 100%;
  min-width: 300px;

  display: flex;
  justify-content: center;
  flex-direction: row;
  flex-wrap: wrap;
  gap: 30px;
  background-color: #FDF6F8;
}
.box-container-raicing a{
  text-decoration: none;
  position: relative;
  height: 200px;
  min-height: 200px;
  padding: 5px;

  display: flex;
  min-width: 350px;
  justify-content: center;
  align-items: center;
  flex-direction: row;
}
.box-services{
  position: relative;
  width: 100%;
  height: 100%;

  display: flex;
  justify-content: center;
  text-align: center;
  background-position: top; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}
.wrap-box-services{
  position: relative;
  padding: 7px 2px;
  background-color: rgba(197, 35, 74, .1);
  height: 70%;
  width: 85%;
  margin: auto;
  display: flex;
  flex-direction: column;
}
.wrap-box-services:hover{
  background-color: rgba(197, 35, 74, .3);
}
.wrap-box-services h3{
  position: relative;
  text-align: center;
  margin: auto;
  color: white;
  font-weight: 500;
  font-size: 1.9em;
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
  margin: auto;
  transition: .4s;
  cursor: pointer;
}
.wrap-box-services:hover h4{
  text-decoration: underline;
  opacity: 1;
  cursor: pointer;
}
  .pictureCruising1{
    background-image: url("../Racing/2.Services/Image/Pannelled_race_series.jpg");
  }
  .pictureCruising2{
    background-image: url("../Racing/2.Services/Image/Regatta.jpeg");
  }
  .pictureCruising3{
    background-image: url("../Racing/2.Services/Image/FiberpathGP.jpg");
  }
  .pictureCruising4{
    background-image: url("../Racing/2.Services/Image/Redlinespinaker.jpg");
  }
</style>

<section class="text">
  <a class="link_a"href="../SailTypes/index.php">&lt; Sail types</a>
  <h1>Racing Sails</h1>
  <br><br><br>
  <p>Racing sails are optimized for both upwind and downwind sailing. Upwind racing sails, such as the Pannelled Race Series and Fiberpath Regatta, are designed to generate maximum lift and minimize drag. These sails are typically made from high-tech materials like carbon or aramid fibers, which offer superior shape retention and performance in a wide range of wind conditions. Downwind racing sails like the "Red Line Spinnaker" are designed to capture as much wind as possible and provide maximum downwind speed. These sails are typically made from lightweight materials like nylon or polyester, which offer stability and ease of handling.</p>
  <p>When it comes to racing sails, speed is everything. There are several different types of racing sails available, including the Pannelled Race Series, Fiberpath Regatta, and Fiberpath GP. These sails are designed for maximum speed and performance in a wide range of wind conditions. The "Red Line Spinnaker" is a popular choice for downwind racing, as it is designed to capture as much wind as possible and provide maximum speed. Racing sails are typically made from high-tech materials like carbon or aramid fibers, which offer superior shape retention and performance. Choose racing sails to ensure your boat is optimized for speed and performance on the water.</p>
  <div class="box-container-raicing">
    <a href="../Racing-1.PannelledRaceSeries/index.php">
      <div class="box-services pictureCruising1">
        <div class="wrap-box-services">
          <h3>Pannelled Race Series</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>
    <a href="../Racing-2.FiberpathRegatta/index.php">
      <div class="box-services pictureCruising2">
        <div class="wrap-box-services">
          <h3>Fiberpath Regatta</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>
    <a href="../Racing-3.FiberpathGP/index.php">
      <div class="box-services pictureCruising3">
        <div class="wrap-box-services">
          <h3>Fiberpath GP</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>
    <a href="../Racing-4.RedLineSpinnakers/index.php">
      <div class="box-services pictureCruising4">
        <div class="wrap-box-services">
          <h3>Red Line Spinnaker</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>
  </div>
  </section>
<script type="text/javascript">
</script>

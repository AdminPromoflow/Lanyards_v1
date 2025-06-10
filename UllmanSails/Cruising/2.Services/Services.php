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

.box-container-cruising{
  position: relative;
  padding:0;
  width: 95%;
  min-width: 300px;

  display: flex;
  justify-content: center;
  flex-direction: row;
  flex-wrap: wrap;
  flex-flow: row wrap;
  gap: 30px;
  background-color: #FDF6F8;

}
.box-container-cruising a{
  text-decoration: none;
  position: relative;
  height: 200px;
  min-height: 200px;
  padding: 5px;

  display: flex;
  flex: 1 1 320px;
  justify-content: center;
  align-items: center;
  flex-direction: row;
}
.box-services{
  position: relative;
  width: 100%;
  height: 100%;

  display: flex;
  text-align: center;
  background-position: center; /* Center the image */
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
}
.wrap-box-services:hover{
  background-color: rgba(197, 35, 74, .3);
}
.wrap-box-services h3{
  position: relative;
  text-align: center;
  top: 30%;
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
  top: 30%;
  transition: .4s;
  cursor: pointer;
}
.wrap-box-services:hover h4{
  text-decoration: underline;
  opacity: 1;
}

.pictureCruising1{
  background-image: url("../Cruising/2.Services/Image/NavigatorSeries.jpg");
}
.pictureCruising2{
  background-image: url("../Cruising/2.Services/Image/EnduranceSeries.jpg");
}
.pictureCruising3{
  background-image: url("../Cruising/2.Services/Image/VoyagerSeries.png");
}
.pictureCruising4{
  background-image: url("../Cruising/2.Services/Image/Expedition.jpg");
}
.pictureCruising5{
  background-image: url("../Cruising/2.Services/Image/BlueLineSpinnakers.jpg");
}

</style>

<section class="text">
  <a class="link_a"href="../SailTypes/index.php">&lt; Sail types</a>
  <h1>Cruising Sails</h1>
  <br><br><br>
  <p>When it comes to cruising sails, durability and ease of use are key. The Navigator Series, Endurance Series, Voyager Series, and Expedition Series are all popular choices for cruisers, each with their own unique features and benefits. The Navigator Series is designed for easy handling and excellent performance in a wide range of wind conditions, making it a great all-around cruising sail. The Endurance Series is built to last, with extra reinforcement in high-stress areas to ensure a long lifespan. The Voyager Series is designed for long-distance sailing, with a focus on stability and ease of handling. And the Expedition Series is built for the most challenging sailing conditions, with rugged construction and excellent windward performance. No matter which series you choose, you can be confident that your cruising sails will be easy to use and built to last.</p>
  <p>Blue Line Spinnakers are a popular choice for cruisers looking for maximum downwind performance. These cruising spinnakers are designed to capture as much wind as possible and provide a smooth ride in all conditions. They are typically made from lightweight materials like nylon or polyester, which offer stability and ease of handling. Blue Line Spinnakers are available in a wide range of sizes and styles, so you can choose the perfect sail for your boat and your sailing needs. Whether you're cruising along the coast or crossing oceans, a Blue Line Spinnaker is the perfect choice for downwind sailing.</p>
  <div class="box-container-cruising">
    <a href="../Cruising-1.Navigator/index.php">
      <div class="box-services pictureCruising1">
        <div class="wrap-box-services">
          <h3>Navigator Series</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>
    <a href="../Cruising-2.Endurance/index.php">
      <div class="box-services pictureCruising2">
        <div class="wrap-box-services">
          <h3>Endurance Series</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>

    <a href="../Cruising-3.Voyager/index.php">
      <div class="box-services pictureCruising3">
        <div class="wrap-box-services">
          <h3>Voyager Series</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>

    <a href="../Cruising-4.Expedition/index.php">
      <div class="box-services pictureCruising4">
        <div class="wrap-box-services">
          <h3>Expedition Series</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>

    <a href="../Cruising-5.BlueLineSpinnakers/index.php">
      <div class="box-services pictureCruising5">
        <div class="wrap-box-services">
          <h3>Blue Line Spinnakers</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>
  </div>
</section>


<script type="text/javascript">

</script>

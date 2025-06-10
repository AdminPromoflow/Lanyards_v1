<style media="screen">
.picture{
   position: relative;
   width: 100vw;
   height: 80vh;
   margin: 50px 0px;
   background-color: blue;
   padding: 0;
   font-family: 'Poppins', sans-serif;
   overflow: hidden;

   display: flex;
   align-items: center;
   justify-content: center;

   background-image:url("../Home/Picture/Powerboat_enclosure.jpg");
   background-attachment:fixed;
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
}
.sectionPicture{
  position: relative;
  height: 100%;
  width: 100%;
  padding: 20vh 35vw;
  background-color: rgba( 0, 0, 0, 0.2);

  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.sectionPicture:hover{
  background-color: rgba(0,0,0,.3);
}
.picture p{
  position: relative;
  font-size: clamp(1.5rem, 1.7vw, 2rem);
  color: white;
  width: 80%;
  text-align: center;
  font-weight: 300;
  text-shadow: 1px 1px 0px black;
}
.picture h1{
  position: relative;
  font-size: clamp(2em, 6vw, 7em);
  color: white  ;
  text-align: center;
  font-weight: 400;
  text-shadow: 1px 1px 0px black;
}
.picture a{
   all: unset;
}
.sectionPicture button{
  position: relative;
  width: 25%;
  min-width: 150px;
  background-color:#005598;
  padding: 8px 0px;
  margin: 10px 0 0 0;
  color: white;
  cursor: pointer;
  border: 1px solid #202E52;
  box-shadow: 3px 3px 0px black;

  text-align: center;
  font-size: clamp(1.2rem, 1.6vw, 1.8rem);
  font-weight: 500;
}
.sectionPicture button:hover{
  background-color: #5E6771;
  color: white;
}
</style>
<section class="picture">
  <a href="../Covers/index.php">
    <div class="sectionPicture">
      <h1>Covers</h1>
      <button type="button" name="button">See more</button>
    </div>
  </a>

</section>
<script type="text/javascript">

</script>

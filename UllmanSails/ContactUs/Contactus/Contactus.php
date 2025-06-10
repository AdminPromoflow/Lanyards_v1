<style media="screen">
  .contactUs{
    padding: 50px 2vw;
    position: relative;
    background: rgb(247,247,247);
  }
  .contactUsTitle{
    position: relative;
    text-align: center;
    font-size: calc(1.3vw + 1.6em);
    font-weight: 400;
    color: #005598;
  }
  .contactUsContainer{
    position: relative;
    display: flex;
    flex-wrap:wrap-reverse;
    justify-content: center;
    width: 95vw;
    left: 50%;
    transform: translateX(-50%);
    margin-top : 60px;
  }
  .contactUsBox{
    position: relative;
    width: 50%;
    padding: 50px 30px;
  }
  .contactUsBox input{
    position: relative;
    height: 35px;
    width: 100%;
    font-size: 1.4em;
    padding-left: 10px;
    margin: 10px 0;
  }
  .contactUsBox textarea {
    position: relative;
    width: 100%;
    font-size: 1.4em;
    padding: 5px 10px;
    margin: 10px 0;
    border: none;
    border-bottom: 1px solid lightgrey;
  }
  .contactUsBox h3{
    position: relative;
    font-weight: 300;
    font-size: 1.4em;
    margin: 0px 0 10px 0;
  }
  .contactUsBox button{
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    cursor: pointer;
  }
  @media screen and (max-width: 1024px){
    .contactUsBox{
      position: relative;
      width: 100%;
      padding: 10px 30px;
    }
  }
  #map {
    height: 300px;
    z-index: 1;
   }

  .containerTable{
    position: relative;
    max-width: 75%;
    overflow-x: scroll;
    left: 50%;
    transform: translateX(-50%);
   }
  table{
    position: relative;

  }
   th{
    background-color: #005598;
    color: white;
    padding: 7px;
  }
   td{
    border: 1px solid black;
    background-color: rgba(210, 220, 234,1);
    padding: 4px 7px;
  }
  .whiter{
    background-color:  #FFFFFF;
  }
  .darker{
    background-color: #B0B3AF;
  }

  .buttonTitle{
    position: relative;
    background-color: #005598;
    cursor: pointer;
    border: 1px solid #202E52;
    padding: 5px 7px;
    width: 100px;
  }
  .buttonTitle:hover{
    background-color: rgb(36, 46, 77);
  }
  .buttonTitle h3{
    text-align: center;
    font-size: 1.2em;
    font-weight: 200;
    color: white;
    margin: 0;
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
<section class="contactUs">
  <a class="comeBack"href="../Home/index.php">&lt; Home</a>
  <h1 class="contactUsTitle">Contact us</h1>
  <div class="contactUsContainer">
    <div class="contactUsBox">
      <h3>Your contact info</h3>
      <input id="contactName" type="text" name="" placeholder="Name" value="">
      <input id="contactNumber" type="text" name="" placeholder="Contact number" value="">
      <input id="contactLocation" type="text" name="" placeholder="Location of Vessel (?)" value="">
      <input id="contactEmail" type="text" name="" placeholder="Email address" value="">
      <label for="pdf_file">Select a PDF file:</label>
      <input type="file" id="pdf_file" name="pdf_file" accept=".pdf">
      <textarea name="name" placeholder="Please share your experiences" rows="3" cols="80"></textarea>
      <div id="btnContactUs" class="buttonTitle">
        <h3 class="openContactUs">Submit</h3>
      </div>
    </div>
    <div class="contactUsBox">
      <div id="map"></div>
    </div>
  </div>


  <div class="containerTable">
    <table>
        <thead>
          <tr>
            <th>Site</th>
            <th>Plymouth</th>
            <th>Hamble</th>
            <th>ADMIN OFFICE</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="whiter">Telephone</td>
            <td class="whiter">01752 337 131</td>
            <td class="whiter">02380 457 711</td>
            <td class="whiter">02780 456 611</td>

          </tr>
          <tr>
            <td>Address</td>
            <td>Unit 23a, 10 Bell Close
              Plymouth
              Devon
              PL7 4FD</td>
            <td>15 Compass Point
              Ensign Way, Hamble
              Southampton S031 4RA</td>
            <td></td>

          </tr>
          <tr>
            <td class="whiter">Email</td>
            <td class="whiter">sales@ullmansails.co.uk</td>
            <td class="whiter">sales@ullmansails.co.uk</td>
            <td class="whiter">catrina@ullmansails.co.uk</td>

          </tr>
          <tr>
            <td>Out of Hours</td>
            <td>07979 591 999</td>
            <td>07753 131 903</td>
            <td></td>

          </tr>
          <tr>
            <td class="whiter">Head of Loft</td>
            <td class="whiter">Jon Pegg</td>
            <td class="whiter">Rob Larke</td>
            <td class="whiter">Catrina Southworth</td>

          </tr>
          <tr>
            <td>Opening Hours</td>
            <td>08:00 - 17:00</td>
            <td>08:30 - 17:30</td>
            <td></td>
          </tr>
        </tbody>
      </table>
  </div>

</section>

<script type="text/javascript">
  var map = L.map('map').setView([50.859644, -2.320230], 7);




  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attributionControl: false,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'your.mapbox.access.token'
  }).addTo(map);



  var marker = L.marker([50.39603448075243, -4.041274087411246]).addTo(map);
  var marker = L.marker([50.841011546296706, -1.3502185309655552]).addTo(map);

</script>
<script type="text/javascript">
  var btnContactUs = document.getElementById('btnContactUs');
  var contactName = document.getElementById('contactName');
  var contactNumber = document.getElementById('contactNumber');
  var contactLocation = document.getElementById('contactLocation');
  var contactEmail = document.getElementById('contactEmail');





  btnContactUs.addEventListener("click",function(){
    var fileInput = document.getElementById('pdf_file');
    var formData = new FormData();


    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];

      formData.append('file', file);
      formData.append('module', 'sendEmail');

    }
    else  {
      formData.append('module', 'sendEmail');

    }

    $.ajax( "../App/Controller/Controller2.php", {
    type: 'post',
    processData: false,
    contentType: false,
    async: false,
    data: formData,

    success: function(data){
      alert(data);

    }

  }
)


/*$.ajax({
      type: 'post',
      url: '../../controller/consultarDatos.php',
      processData: false,
      data: data,
      contentType: false,
      async: false,
      success: function(data) {

      }
    })*/




  });
</script>

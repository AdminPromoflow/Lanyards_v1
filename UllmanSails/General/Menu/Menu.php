<style media="screen">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

  .menuContainer{
    font-family: 'Poppins', sans-serif;
    position: relative;
    width: 100vw;
    height: 70px;
    z-index: 40;
    color: white;
    margin: 0;
    padding: 0;
  }
  .menuContainer a{
    all: unset;
  }
  .menu{
    position: fixed;
    top: 0px;
    left: 0px;
    height: 70px;
    width: 100vw;
    margin: 0;
    padding: 0;
    background: rgba(	0,	85,	152, 1);
    box-shadow: 1px 1px 100px rgba( 0, 0, 0, .5);
    cursor: pointer;

  }
  .logo, .logoMobile{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 20px;
    height: 70%;
    cursor: pointer;
  }
  .logoMobile{
    display: none;
  }
  .openMenuMobile{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 30px;
    height: 40%;
    display: none;
  }
  .closeMenuMobile{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 30px;
    height: 40%;
    display: none;
  }

  .itemsMenu{
    position: absolute;
    width: 75%;
    height: 100%;
    right: 40px;
    display: flex;
    justify-content: flex-end;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: center;
  }
  .itemsMenu h3{
    position: relative;
    padding: 0px 8px;
    font-size: 1.1em;
    font-weight: 400;
    cursor: pointer;
  }
  .searchContainer input{
    height: 35px;
    margin: 0 5px;
    font-size: 1.2em;
    padding-left: 0px;
    opacity: .5;
    transition: .4s;
  }
  .searchContainer input:hover{
    height: 35px;
    margin: 0 5px;
    font-size: 1.2em;
    padding-left: 0px;
    opacity: .7;
  }
  .searchContainer button{
    font-size: 1em;
    height: 35px;
    text-align: center;
    padding: 8px 8px;
  }
  .searchContainer img{
    position: relative;
    height: 35%;
    transition: .4s;
  }
  .searchContainer img:hover{
    position: relative;
    height: 35%;
    filter: drop-shadow(0px 0px 1px black);
    padding-left: 15px;
  }
  .searchContainer{
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  /*--------------------------------------------------------------------------*/
  /*----------------------------  Menu mobile  -------------------------------*/
  /*--------------------------------------------------------------------------*/

  .menuMobile{
    position: fixed;
    top: 71px;
    right: 1px;
    height: calc(100vh - 71px);
    width: 300px;
    background: rgba(0, 85, 152, 0.9);
    display: none;
  }
  .itemsMenuMobile{
    position: absolute;
    top: 10px;
    width: 100%;
    margin: 0 auto;
  }
  .itemsMenuMobile h3{
    position: relative;
    padding: 8px;
    margin-left: 15px;
    margin-right: 15px;
    font-size: 1.2em;
    font-weight: 400;
    cursor: pointer;
  }
  .itemsMenuMobile h3:nth-child(odd){
    background-color: #00467C;
  }
  .itemsMenuMobile h3:nth-child(odd):hover{
    background-color: #003E6F;
  }
  .itemsMenuMobile h3:nth-child(even):hover{
    background-color: #1764A1;
  }
  .menuMobileBackground{
    position: fixed;
    top: 71px;
    left: 0px;
    height: calc(100vh - 71px);
    width: calc(100vw - 300px);
    display: none;
  }




/*--------------------------------------------------------------------------*/
/*---------------------------  subItemsvMenu   -----------------------------*/
/*--------------------------------------------------------------------------*/


  .subItemsMenu{
    position: absolute;
    background:  rgba(0, 85, 152, 0.9);
    top: 183%;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px;
    /*border-top: 1px solid white;
    border-bottom: 1px solid white;*/
    z-index: 200;
  }
  .subItemsMenu h3{
    position: relative;
    padding: 8px;
    font-size: 0.9em;
    font-weight: 400;
    cursor: pointer;
    width: 150px;
    text-align: center;
  }
  .subItemsMenu h3:nth-child(odd){
    background-color: #00467C;
  }
  .subItemsMenu h3:nth-child(even){
    background-color: #1764A1;
  }
  .subItemsMenu h3:nth-child(odd):hover{
    background-color: #003E6F;
  }
  .subItemsMenu h3:nth-child(even):hover{
    background-color: #4683B4;
  }
  @media screen and (max-width: 1234px){
    .logo{
      display: none;
    }
    .logoMobile{
      display: block;
    }
    .openMenuMobile{
      display: block;
    }
    .itemsMenu{
      display: none;
    }
  }
</style>
<style media="screen">
  .searchContent{
    position: relative;
    background-color: #FEFAFA;
    min-height: 0vh;
    padding: 0;
  }
  .searchContentItem{
    position: relative;
    padding: 2vw 0vw;
    margin: 3vw 0vw;
    border-bottom: 5px solid #005598;
    width: 60vw;
    min-width: 280px;
    left: 50%;
    transform: translateX(-50%);
  }
  .searchContentItem a {
    all: unset;

  }
  .searchContentItem h2{
    margin-bottom: 0.9vw;
    color: #005598;
    font-size: 2.2em;
  }
  .searchContentItem h2:hover{
    text-decoration: underline;
  }
  .searchContent h1{
    margin-bottom: 0.9vw;
    color: #005598;
    font-size: 2.5em;
    text-align: center;

  }

  .searchContentItem p{
    font-size: 1.1em;
  }
  .comeBackSeach {
    all: unset !important;
    color: #202E52 !important;
    font-weight: 600 !important;
    font-size: 1.1em !important;
    cursor: pointer !important;
    text-align: left !important;
    width: 100vw !important;
  }
  .comeBackSeach:hover{
    text-decoration: underline !important;
  }

</style>
<section class="menuContainer" >
  <div class="menu">

    <img class="logo" id="logoOpenHome" src="../General/Menu/Logo.png" alt="">
    <img class="logoMobile" id="logoOpenHomeMobile" src="../General/Menu/LogoMobile.png" alt="">
    <img class="openMenuMobile" id="openMenuMobile" src="../General/Menu/menu.png" alt="">
    <img class="closeMenuMobile" id="closeMenuMobile" src="../General/Menu/close.png" alt="">
    <div class="itemsMenu">

      <h3><a href="../Home/index.php">Home</a></h3>
      <h3 id="openSubItemsMenu"><a href="../SailTypes/index.php">Sail Types</a>
        <div class="subItemsMenu" id="subItemsMenu">
          <h3><a href="../Cruising/index.php">Cruising Sails</a></h3>
          <h3><a href="../Racing/index.php">Racing Sails</a></h3>
        </div>
      </h3>

      <h3><a href="../Covers/index.php">Boat covers</a></h3>


      <h3><a href="../SailCare/index.php">SailCare</a></h3>
      <h3><a href="../Services/index.php">Services</a></h3>

      <h3><a href="../News/News.php">News</a></h3>
      <h3><a href="../AboutUs/index.php">About Us</a></h3>
      <h3><a href="../ContactUs/index.php">Contact Us</a></h3>
      <div id="searchContainer" class="searchContainer">
        <input id="searchInput" type="text" name="" value="">
        <button id="searchButton" type="button" name="button">Search</button>
        <img id="searchImg" src="../General/Menu/search.png" alt="">
      </div>

    </div>
  </div>
  <div class="menuMobile" id="menuMobile">
    <div class="itemsMenuMobile">
      <h3><a href="../Home/index.php">Home</a></h3>
      <h3><a href="../SailTypes/index.php">Sail Types</a></h3>
      <h3><a href="../Covers/index.php">Boat covers</a></h3>
      <h3><a href="../SailCare/index.php">SailCare</a></h3>
      <h3><a href="../Services/index.php">Services</a></h3>
      <h3><a href="../News/News.php">News</a></h3>
      <h3><a href="../AboutUs/index.php">About Us</a></h3>
      <h3><a href="../ContactUs/index.php">Contact Us</a></h3>
    </div>

  </div>
  <div class="menuMobileBackground" id="menuMobileBackground">

  </div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
  var menuMobileBackground = document.getElementById('menuMobileBackground');
  var menuMobile = document.getElementById('menuMobile');

  menuMobileBackground.addEventListener("click", function () {
    menuMobileBackground.style.display = "none";
    menuMobile.style.display = "none";

    closeMenuMobile.style.display = "none";
    openMenuMobile.style.display = "block";

  })
  var openMenuMobile = document.getElementById('openMenuMobile');
  var closeMenuMobile = document.getElementById('closeMenuMobile');


  openMenuMobile.addEventListener("click", function () {
    menuMobileBackground.style.display = "block";
    menuMobile.style.display = "block";

    closeMenuMobile.style.display = "block";
    openMenuMobile.style.display = "none";
  })
  var closeMenuMobile = document.getElementById('closeMenuMobile');

  closeMenuMobile.addEventListener("click", function () {
    menuMobileBackground.style.display = "none";
    menuMobile.style.display = "none";

    closeMenuMobile.style.display = "none";
    openMenuMobile.style.display = "block";
  })
  var logoOpenHome = document.getElementById('logoOpenHome');
  logoOpenHome.addEventListener("click", function (){
    window.open("../Home/index.php", "_self");
   })
  //----------------------------------------------//------------------------
   var logoOpenHomeMobile = document.getElementById('logoOpenHomeMobile');

   logoOpenHomeMobile.addEventListener("click", function (event){
     window.open("../Home/index.php", "_self");
   })
     //----------------------------------------------//------------------------
 var openSubItemsMenu = document.getElementById('openSubItemsMenu');
 var subItemsMenu = document.getElementById('subItemsMenu');
 var subItemsMenuActive = false;

     subItemsMenu.style.display = "none";

     openSubItemsMenu.addEventListener("mouseenter", function (event){
      // alert("mouseenter" + subItemsMenu.style.display);
       if (!subItemsMenuActive) {
         subItemsMenu.style.display = "block";
         subItemsMenuActive = true;
       }
     })
     subItemsMenu.addEventListener("mouseleave", function(event){
       if (subItemsMenuActive) {
         subItemsMenu.style.display = "none";
         subItemsMenuActive = false;
       }
     })

     var searchContainer = document.getElementById("searchContainer");
     var searchInput = document.getElementById("searchInput");
     var searchButton = document.getElementById("searchButton");
     var searchImg = document.getElementById("searchImg");

     searchImg.style.display = "block";
     searchButton.style.display = "none";
     searchInput.style.display = "none";
     searchContainer.addEventListener("click", function(){
       if (searchImg.style.display == "block") {
         if (searchButton.style.display == "none") {
           if (searchInput.style.display == "none") {
             searchImg.style.display = "none";
             searchButton.style.display = "block";
             searchInput.style.display = "block";
           }
         }
       }
     })

     document.addEventListener("click", function (event){
       if (!openSubItemsMenu.contains(event.target)) {
         if (subItemsMenuActive) {
           subItemsMenu.style.display = "none";
           subItemsMenuActive = false;
         }
       }
       if (!searchContainer.contains(event.target)) {
         if (searchImg.style.display == "none") {
           if (searchButton.style.display == "block") {
             if (searchInput.style.display == "block") {
               searchImg.style.display = "block";
               searchButton.style.display = "none";
               searchInput.style.display = "none";
             }
           }
         }
       }

     })
     var searchContent = document.getElementById("searchContent");

     searchButton.addEventListener("click",function (){

         var searchContent = document.getElementById("searchContent");
         var searchHide = document.getElementById("searchHide");

               $.ajax( "../App/Controller/Controller2.php", {
               type: 'post',
               async: false,
               data: {
                 module: "seach",
                 word: searchInput.value
               },
               success: function(data){


                 searchContent.style.display = "block";
                 searchContent.style.minHeight = "70vh";
                 searchContent.style.padding = "2vw";

                 searchHide.style.display = "none";

                 searchContent.innerHTML =
                '<h3 onclick="comeBack()" class="comeBackSeach" >&lt; Back </h3>' +
                  '<h1>Search Results for: '+ searchInput.value +'</h1>';



                 var data = jQuery.parseJSON(data);
                 for (var i = 0; i < data.length; i++) {
                   createSearchContent(data[i]);
                 }

               }
             }
           )


     })


     searchButton.addEventListener("keydown",function (event){
       if (event.key === 'Enter') {

         var searchContent = document.getElementById("searchContent");
         var searchHide = document.getElementById("searchHide");

               $.ajax( "../App/Controller/Controller2.php", {
               type: 'post',
               async: false,
               data: {
                 module: "seach",
                 word: searchInput.value
               },
               success: function(data){


                 alert(data);/*
                 searchContent.style.display = "block";
                 searchContent.style.minHeight = "70vh";
                 searchContent.style.padding = "2vw";

                 searchHide.style.display = "none";

                 searchContent.innerHTML =
                '<h3 onclick="comeBack()" class="comeBackSeach" >&lt; Back </h3>' +
                  '<h1>Search Results for: '+ searchInput.value +'</h1>';



                 var data = jQuery.parseJSON(data);
                 for (var i = 0; i < data.length; i++) {
                   createSearchContent(data[i]);
                 }*/

               }
             }
           )

         }
     })


     function comeBack(){
       var searchContent = document.getElementById("searchContent");
       var searchHide = document.getElementById("searchHide");

       searchContent.style.display = "none";
       searchContent.style.minHeight = "0vh";
       searchContent.style.padding = "0vw";
       searchHide.style.display = "block";
     }
     function createSearchContent(data){
        var searchContent = document.getElementById("searchContent");
        var text2 = getContextAroundText(data["text"],searchInput.value);

        searchContent.innerHTML +=
        '<div class="searchContentItem">' +
          '<h2> <a href="'+data["link"]+'">'+data["title"]+'</a> </h2>' +
          '<p>'+text2+'</p>' +
        '</div>' +
        "";
     }

     function getContextAroundText(text, targetText) {
        const words = text.split(/\s+/);
        const sentences = text.split(/[.!?]/);
        const lowercaseTargetText = targetText.toLowerCase();

        const wordIndex = words.findIndex(word => word.toLowerCase().includes(lowercaseTargetText));
        const sentenceIndex = sentences.findIndex(sentence => sentence.toLowerCase().includes(lowercaseTargetText));

        if (wordIndex !== -1 || sentenceIndex !== -1) {
          const wordContext = wordIndex !== -1 ? getWordContext(words, wordIndex) : "";
          const sentenceContext = sentenceIndex !== -1 ? getSentenceContext(sentences, sentenceIndex) : "";

          return `${wordContext}\n${sentenceContext}`.trim();
        } else {
          return "Texto no encontrado en el texto.";
        }
      }

      function getWordContext(words, targetIndex) {
        const startIndex = Math.max(0, targetIndex - 35);
        const endIndex = Math.min(words.length, targetIndex + 36);
        return words.slice(startIndex, endIndex).join(' ');
      }

      function getSentenceContext(sentences, targetIndex) {
        const startIndex = Math.max(0, targetIndex - 1);
        const endIndex = Math.min(sentences.length, targetIndex + 2);
        return sentences.slice(startIndex, endIndex).join(' ');
      }
</script>

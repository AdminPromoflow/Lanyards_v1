<style media="screen">
/* News */
.News-row {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  text-align: center;
  height: 100%;
  font-family: 'Poppins', sans-serif;
}
  .News-row p {
    color: #838383;
    font-size: 1em;
    text-align: justify;
  }

.News-L {
  display: flex;
  flex: 60%;
  flex-direction: column;
  justify-content: center;
  background-color: #F8F8FA;
  text-align: center;
  align-items: center;


}
  .L-Top {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
  }
    .L-Top h2 {
      margin-bottom: 30px;
      font-size: 2.5em;
      font-weight: 400;
      color: #202E52;
    }

  .L-Bot {
    position: relative;
    display: flex;
    flex-direction: row;
    justify-content: center;
    flex-wrap: wrap;
    max-width: 100%;
  }
  .Group-Card{
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;
  }


  .News-Card {
      width: 250px;
      margin: 20px;
      text-align: left;
  }
  .News-Card h4 {
    margin: 5px 0;
    font-size: 1.3em;
    color: #005598;
  }
    .News-Card > img {
      width: 100%;
      height: 55%;
    }

  .News-Card span {
    cursor: pointer;
  }




.News-R {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0 auto;
  background-color: #202E52;
  min-width: 300px;
}
.News-R h3 {
  margin: 20px 0;
  color: white;
}
  .r-NewsCards {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    overflow-y: scroll;
    max-height: 650px;
    max-width: 280px;
  }
    .rNews-Card {
      background-color: #F2F2F2;
      padding: 10px;
      margin: 15px;
      width: 380px;
    }
    .rNews-Card p {
      text-align: center;
    }
    .rNews-Card > img {
      height: 190px;
      border-radius: 2.5px;
      margin: 10px 0;
    }
    .SeeMoreNews:hover{
      text-decoration: underline;
    }

    .newsFacebook{
      position: relative;

      left: 50%;
      transform: translateX(-50%);
      border: none;
      background-color: white;
      margin: 15px 0;
    }

    @media screen and (max-width: 1300px ) {

        .rNews-Card {
            max-width: 700px;
            padding: 30px;
            width: 80%;
            margin: 15px auto;
        }
    }

    @media screen and (max-width: 880px ) {

        .L-Bot {
          max-width: 580px;
          justify-content: center;
        }

    }

    @media screen and (max-width: 600px ) {

        .L-Bot {
          max-width: 280px;
        }

    }

</style>
<section class="News-row">
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0" nonce="breXIHsZ"></script>
  <!-- News Left -->
  <div class="News-L">

    <div class="L-Top">
      <h2> News </h2>

      <div class="Tabs">
        <button class="Tabs-button" type="button"> 1 </button>
        <button class="Tabs-button" type="button"> 2 </button>
        <button class="Tabs-button" type="button"> 3 </button>
        <button class="Tabs-button" type="button"> 4 </button>
      </div>
    </div>

    <div class="L-Bot">



      <div class="Group-Card">
        <div class="News-Card">
          <img src="4.News/Images/1.jpg " alt="">
          <h4> Ullman Sails support RC1000 </h4>
          <p> RC1000 race series is a brand new racing class based in Plymouth and the south west, aiming for close performance across the  ..
            <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
        </div>

        <div class="News-Card">
          <img src="4.News/Images/2.jpg " alt="">
          <h4> Ullman Sails Inshore & Offshore Race Series </h4>
          <p> Ullman Sails are pleased to announce the dates for our inshore
            and offshore points races series for 2020. We are getting  ..
            <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
        </div>

        <div class="News-Card">
          <img src="4.News/Images/3.jpg" alt="">
          <h4> Victory in the Quarter Ton Cup </h4>
          <p> Ullman Sails customer John Santy recently cruised to victory at
             the Quarter Ton Cup. Read his amusing account of how he and ..
             <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
        </div>
      </div>

      <div class="Group-Card">
           <div class="News-Card">
             <img src="4.News/Images/4.jpg " alt="">
             <h4> Loft Updates </h4>
             <p> 2018 has seen the loft in Plymouth grow in all aspects –
               we are now sporting over 115 square meters of floor space to build
               , service and repair sails.In August   ...
               <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
           </div>

           <div class="News-Card">
             <img src="4.News/Images/5.jpg " alt="">
             <h4> Customer Updates </h4>
             <p> This year loft regular Mike Nuttall managed a series win
               in the Plym Yacht Club Friday night series and an overall class win
               a full suit of Ullman Sails including a brand ...
               <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
           </div>

           <div class="News-Card">
             <img src="4.News/Images/6.jpg" alt="">
             <h4> Quarter Tonner Developments </h4>
             <p> We’ve been working particularly hard this season in the
               highly competitive Quarter Tonner fleet. At the start of the year we provided a ...
                <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
           </div>
       </div>

      <div class="Group-Card">
            <div class="News-Card">
              <img src="4.News/Images/7.jpg " alt="">
              <h4> London Boat Show </h4>
              <p> Here at Ullman Sails GBR we used to love the London Boat
                Show. It was a fantastic opportunity to catch up with our customers in the New Year,
                and help them plan ...
                <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
            </div>

            <div class="News-Card">
              <img src="4.News/Images/8.jpg " alt="">
              <h4> Welcome The Newest Member Of Our Team </h4>
              <p> Charlie has been sailing for over ten years and has
                 done a range of RYA courses, including ...
                <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
            </div>

            <div class="News-Card">
              <img src="4.News/Images/9.jpg" alt="">
              <h4> Penarth – Cruising Code Zero </h4>
              <p> Our newest dealers in South Wales have had a very busy
                winter! We have just delivered ...
                 <strong class="SeeMoreNews"><span>See more</span></strong>   </p>
            </div>
        </div>


      <div class="Group-Card">
        <div class="News-Card">
          <img src="4.News/Images/10.jpg " alt="">
          <h4> Hit By a Once in a Life Time Storm</h4>
          <p> In the Ostar Race In 2017, Mervyn Wheatley ﻿was hit
             by a once in a life time storm. His boat was hit by a huge wave which  ...
             <strong class="SeeMoreNews"><span>See more</span></strong>
          </p>
        </div>
      </div>

    </div>
  </div>


 <script type="text/javascript">
  const Tabs = document.querySelectorAll(".Tabs-button");
  const GroupCard = document.querySelectorAll(".Group-Card");
  var GroupCardOn = 0;


  for (let i = 0; i < Tabs.length; i++) {

    GroupCard[i].style.display = "none";
    GroupCard[0].style.display = "flex";

    Tabs[i].addEventListener("click", function(){

    if (GroupCard[i].style.display == "none" || GroupCard[i].style.display == ""){
        GroupCardOn  = i;
          GroupCard[i].style.display = "flex";
        turnOffOtherGroupCards();
      }

    })
  }

  function turnOffOtherGroupCards(){
    for (let i = 0; i < Tabs.length; i++) {
      if (i != GroupCardOn) {
        GroupCard[i].style.display = "none";
      }
    }
  }



  const SeeMoreNews = document.querySelectorAll(".SeeMoreNews");

  for (let i = 0; i < SeeMoreNews.length; i++) {
    SeeMoreNews[i].addEventListener("click", function(){

        window.open("../News/News.php", "_self");
    })
  }
</script>


  <!-- END News Left -->


  <!-- News Right -->


  <div class="News-R">

        <div class="r-NewsCards">
          <h3> Recommended News </h3><br>

          <iframe class="newsFacebook" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fullmansailssolent%2Fposts%2Fpfbid024jm85JR9HzyMfRcG1JpzRmLCuvHGNrpanSsbuC9Hb6LKJHCh4CYrSDEwYBJy6xkWl&show_text=true&width=280" padding="0 10px" width="280"  height="533" style="border:none;  overflow:hidden; " scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

        </div>

  </div> <!-- END News Right -->

</section> <!-- END Section NEWS -->

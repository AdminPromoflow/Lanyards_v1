<?php
$cssFile = '../../views/assets/css/global/customize-lanyard/sections/provided_information.css';
$jsFile = '../../views/assets/js/customize-lanyard/sections/provided_information.js';

$cssVersion = file_exists($cssFile) ? filemtime($cssFile) : time();
$jsVersion = file_exists($jsFile) ? filemtime($jsFile) : time();
?>
<link rel="stylesheet" href="../../views/assets/css/global/customize-lanyard/sections/provided_information.css?v=<?= $cssVersion ?>">


<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
<section class="provided_information section" id="artworkManual">
  <h2 class="name-section-customize-lanyard">Provided information</h2>
  <br>
  <p>Please add or update the information you have provided.</p>
  <br>
  <div id="containers_boxes_provided_information" class="containers_boxes_provided_information">
    <div class="boxes_provided_information">

      <div class="box_provided_information">
        <label for="first_name">First name</label>
        <input id="first_name" type="text" name="" value="" placeholder="First name">
      </div>

      <div class="box_provided_information">
        <label for="last_name">Last name</label>
        <input id="last_name" type="text" name="" value="" placeholder="Last name">
      </div>

      <div class="box_provided_information">
        <label for="company_name">Company name</label>
        <input id="company_name" type="text" name="" value="" placeholder="Company name">
      </div>

      <div class="box_provided_information">
        <label for="phone">Phone</label>
        <input id="phone" type="text" name="" value="" placeholder="Phone">
      </div>

      <div class="box_provided_information">
        <label for="country">Country</label>
        <input id="country" type="text" name="" value="" placeholder="Country">
      </div>

      <div class="box_provided_information">
        <label for="state">State</label>
        <input id="state" type="text" name="" value="" placeholder="State">
      </div>

      <div class="box_provided_information">
        <label for="town_city">Town/city</label>
        <input id="town_city" type="text" name="" value="" placeholder="Town/city">
      </div>

      <div class="box_provided_information">
        <label for="street_address_1">Street address 1</label>
        <input id="street_address_1" type="text" name="" value="" placeholder="Street address 1">
      </div>

      <div class="box_provided_information">
        <label for="street_address_2">Street address 2</label>
        <input id="street_address_2" type="text" name="" value="" placeholder="Street address 2">
      </div>

      <div class="box_provided_information">
        <label for="postcode">Postcode</label>
        <input id="postcode" type="text" name="" value="" placeholder="Postcode">
      </div>

      <div class="box_provided_information">
        <label for="email_address">Email address</label>
        <input id="email_address" type="text" name="" value="" placeholder="Email address">
      </div>






    </div>
    <br>
      <label class="boxes_provided_information_checkbox">
          <input type="checkbox" id="checkbox_provided_information">
          <p>Deliver to a different address?</p>
      </label>


      <div class="boxes_provided_information" id="boxes_provided_information_2">

        <div class="box_provided_information">
          <label for="first_name_2">First name</label>
          <input id="first_name_2" type="text" name="" value="" placeholder="First name">
        </div>

        <div class="box_provided_information">
          <label for="last_name_2">Last name</label>
          <input id="last_name_2" type="text" name="" value="" placeholder="Last name">
        </div>

        <div class="box_provided_information">
          <label for="company_name_2">Company name</label>
          <input id="company_name_2" type="text" name="" value="" placeholder="Company name">
        </div>

        <div class="box_provided_information">
          <label for="phone_2">Phone</label>
          <input id="phone_2" type="text" name="" value="" placeholder="Phone">
        </div>

        <div class="box_provided_information">
          <label for="country_2">Country</label>
          <input id="country_2" type="text" name="" value="" placeholder="Country">
        </div>

        <div class="box_provided_information">
          <label for="state_2">State</label>
          <input id="state_2" type="text" name="" value="" placeholder="State">
        </div>

        <div class="box_provided_information">
          <label for="town_city_2">Town/city</label>
          <input id="town_city_2" type="text" name="" value="" placeholder="Town/city">
        </div>

        <div class="box_provided_information">
          <label for="street_address_1_2">Street address 1</label>
          <input id="street_address_1_2" type="text" name="" value="" placeholder="Street address 1">
        </div>

        <div class="box_provided_information">
          <label for="street_address_2_2">Street address 2</label>
          <input id="street_address_2_2" type="text" name="" value="" placeholder="Street address 2">
        </div>

        <div class="box_provided_information">
          <label for="postcode_2">Postcode</label>
          <input id="postcode_2" type="text" name="" value="" placeholder="Postcode">
        </div>

        <div class="box_provided_information">
          <label for="email_address_2">Email address</label>
          <input id="email_address_2" type="text" name="" value="" placeholder="Email address">
        </div>






      </div>
      <br><br><br>
  <!--  <label for="search-box">Delivery address</label>
    <input id="search-box" type="text" placeholder="Search an address">
    <ul id="result-list"></ul>
    <br><br>
    <label for="">Postcode</label>
    <br>
     <input id="postcode" type="text">
     <br><br>
     <label for="country">Country</label>
     <br>
      <input id="country" type="text" >
      <br><br>
      <label for="region">Region</label>
      <br>
       <input id="region" type="text">
     -->
  </div>
</section>
<script src="../../views/assets/js/customize-lanyard/sections/provided_information.js?v=<?= $jsVersion ?>"></script>

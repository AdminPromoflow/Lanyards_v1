class ProvidedInformation {
  constructor() {
    boxes_provided_information_2.style.display = "none";

    checkbox_provided_information.addEventListener("click", () => {
      providedInformation.toggleProvidedInformation2();
    });

    mapboxgl.accessToken = 'pk.eyJ1IjoiaWFuc291dGhlcm4iLCJhIjoiY20ybWowdnRlMHBmcjJqcTljaDdhYXV6diJ9.UK4tRTqDkO6yYffa-LIyWw';

    const postcodeHTML = document.getElementById('postcode');
    const countryHTML = document.getElementById('country');
    const regionHTML = document.getElementById('region');

    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [-4.041201572157277, 50.39614566225547],
      zoom: 12
    });

    const map_2 = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [-4.041201572157277, 50.39614566225547],
      zoom: 12
    });

    let marker;
    let postcode_mapbox = '';
    let country_mapbox = '';
    let region_mapbox = '';

    const resultList = document.getElementById('result_list');
    const resultList2 = document.getElementById('result_list_2');

    // Primer input
    street_address_1.addEventListener('input', function () {
      const query = street_address_1.value;
      if (query.length > 2) {
        fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${query}.json?access_token=${mapboxgl.accessToken}`)
          .then(response => response.json())
          .then(data => {
            resultList.innerHTML = '';

            data.features.forEach((feature) => {
              const li = document.createElement('li');
              li.textContent = feature.place_name;
              resultList.appendChild(li);

              li.addEventListener('click', () => {
                const [lng, lat] = feature.geometry.coordinates;
                street_address_1.value = feature.place_name;

                postcode_mapbox = feature.context.find(c => c.id.startsWith('postcode'))?.text || 'No disponible';
                country_mapbox = feature.context.find(c => c.id.startsWith('country'))?.text || 'Not available';
                region_mapbox = feature.context.find(c => c.id.startsWith('region'))?.text || 'Not available';

                country.value = country_mapbox;
                town_city.value = region_mapbox;
                postcode.value = postcode_mapbox;

                if (marker) marker.remove();

                marker = new mapboxgl.Marker()
                  .setLngLat([lng, lat])
                  .addTo(map);

                map.flyTo({
                  center: [lng, lat],
                  zoom: 14,
                  essential: true
                });

                resultList.innerHTML = '';
              });
            });
          });
      } else {
        resultList.innerHTML = '';
      }
    });

    // Segundo input
    street_address_1_2.addEventListener('input', function () {
      const query = street_address_1_2.value;
      if (query.length > 2) {
        fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${query}.json?access_token=${mapboxgl.accessToken}`)
          .then(response => response.json())
          .then(data => {
            resultList2.innerHTML = '';

            data.features.forEach((feature) => {
              const li = document.createElement('li');
              li.textContent = feature.place_name;
              resultList2.appendChild(li);

              li.addEventListener('click', () => {
                const [lng, lat] = feature.geometry.coordinates;
                street_address_1_2.value = feature.place_name;

                postcode_mapbox = feature.context.find(c => c.id.startsWith('postcode'))?.text || 'No disponible';
                country_mapbox = feature.context.find(c => c.id.startsWith('country'))?.text || 'Not available';
                region_mapbox = feature.context.find(c => c.id.startsWith('region'))?.text || 'Not available';

                country_2.value = country_mapbox;
                town_city_2.value = region_mapbox;
                postcode_2.value = postcode_mapbox;

                if (marker) marker.remove();

                marker = new mapboxgl.Marker()
                  .setLngLat([lng, lat])
                  .addTo(map_2);

                map_2.flyTo({
                  center: [lng, lat],
                  zoom: 14,
                  essential: true
                });

                resultList2.innerHTML = '';
              });
            });
          });
      } else {
        resultList2.innerHTML = '';
      }
    });
  }

  toggleProvidedInformation2() {
    if (!boxes_provided_information_2) return;

    if (boxes_provided_information_2.style.display === "none" || getComputedStyle(boxes_provided_information_2).display === "none") {
      previewProvidedInformation.showMapProvidedInformationPreview(true);
      boxes_provided_information_2.style.display = "block";
    } else {
      previewProvidedInformation.showMapProvidedInformationPreview(false);
      boxes_provided_information_2.style.display = "none";
    }
  }
}

// Elementos del DOM
const first_name = document.getElementById("first_name"),
  last_name = document.getElementById("last_name"),
  company_name = document.getElementById("company_name"),
  phone = document.getElementById("phone"),
  country = document.getElementById("country"),
  state = document.getElementById("state"),
  town_city = document.getElementById("town_city"),
  street_address_1 = document.getElementById("street_address_1"),
  postcode = document.getElementById("postcode"),
  email_address = document.getElementById("email_address");

const first_name_2 = document.getElementById("first_name_2"),
  last_name_2 = document.getElementById("last_name_2"),
  company_name_2 = document.getElementById("company_name_2"),
  phone_2 = document.getElementById("phone_2"),
  country_2 = document.getElementById("country_2"),
  state_2 = document.getElementById("state_2"),
  town_city_2 = document.getElementById("town_city_2"),
  street_address_1_2 = document.getElementById("street_address_1_2"),
  postcode_2 = document.getElementById("postcode_2"),
  email_address_2 = document.getElementById("email_address_2");

const checkbox_provided_information = document.getElementById("checkbox_provided_information");
const boxes_provided_information_2 = document.getElementById("boxes_provided_information_2");

// Inicializar la clase
const providedInformation = new ProvidedInformation();

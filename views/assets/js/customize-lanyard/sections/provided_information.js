class ProvidedInformation {
  constructor() {
    boxes_provided_information_2.style.display = "none";

    checkbox_provided_information.addEventListener("click", function(){
      providedInformation.toggleProvidedInformation2();
    })



  /*  mapboxgl.accessToken = 'pk.eyJ1IjoiaWFuc291dGhlcm4iLCJhIjoiY20ybWowdnRlMHBmcjJqcTljaDdhYXV6diJ9.UK4tRTqDkO6yYffa-LIyWw';  // Reemplaza con tu token de Mapbox
    const postcodeHTML = document.getElementById('postcode');
    const countryHTML = document.getElementById('country');
    const regionHTML = document.getElementById('region');




    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [ -4.041201572157277 , 50.39614566225547],
        zoom: 12
    });

    let marker;  // Variable para almacenar el marcador
    let postcode ='';
    let country = '';   // Variable to store the country
    let region = '';    // Variable to store the state/region


    const searchBox = document.getElementById('search-box');
    const resultList = document.getElementById('result-list');

    searchBox.addEventListener('input', function() {
        const query = searchBox.value;
        if (query.length > 2) {
            fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${query}.json?access_token=${mapboxgl.accessToken}`)
                .then(response => response.json())
                .then(data => {
                    resultList.innerHTML = '';  // Limpiar la lista de resultados previos

                    data.features.forEach((feature) => {
                        const li = document.createElement('li');
                        li.textContent = feature.place_name;
                        resultList.appendChild(li);

                        // Cuando se selecciona un resultado de la lista
                        li.addEventListener('click', () => {
                            const [lng, lat] = feature.geometry.coordinates;

                            // Si ya existe un marcador, lo eliminamos
                            if (marker) {
                                marker.remove();
                            }

                            // Crear un nuevo marcador y posicionarlo en la ubicación seleccionada
                            marker = new mapboxgl.Marker()
                                .setLngLat([lng, lat])
                                .addTo(map);

                            // Centrar el mapa en la ubicación seleccionada
                            map.flyTo({
                                center: [lng, lat],
                                zoom: 14,
                                essential: true  // Esto asegura que la animación ocurra
                            });

                            postcode = feature.context.find(c => c.id.startsWith('postcode'))?.text || 'No disponible';
                            country = feature.context.find(c => c.id.startsWith('country'))?.text || 'Not available';
                            region = feature.context.find(c => c.id.startsWith('region'))?.text || 'Not available';

                            postcodeHTML.value = postcode;
                            countryHTML.value = country;
                            regionHTML.value = region;
                            // Ocultar la lista de resultados después de seleccionar uno
                            resultList.innerHTML = '';
                        });
                    });
                });
        } else {
            resultList.innerHTML = '';  // Limpiar la lista si se borran los caracteres de búsqueda
        }
    });*/
  }

  toggleProvidedInformation2(){
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

const first_name = document.getElementById("first_name"),
      last_name = document.getElementById("last_name"),
      company_name = document.getElementById("company_name"),
      phone = document.getElementById("phone"),
      country = document.getElementById("country"),
      state = document.getElementById("state"),
      town_city = document.getElementById("town_city"),
      street_address_1 = document.getElementById("street_address_1"),
      street_address_2 = document.getElementById("street_address_2"),
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
      street_address_2_2 = document.getElementById("street_address_2_2"),
      postcode_2 = document.getElementById("postcode_2"),
      email_address_2 = document.getElementById("email_address_2");

      const checkbox_provided_information = document.getElementById("checkbox_provided_information");
      const boxes_provided_information_2 = document.getElementById("boxes_provided_information_2");



const providedInformation = new ProvidedInformation();

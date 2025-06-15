class ProvidedInformation {
  constructor() {
    boxes_provided_information_2.style.display = "none";

    checkbox_provided_information.addEventListener("click", () => {
      providedInformation.toggleProvidedInformation2();
    });

    mapboxgl.accessToken = 'pk.eyJ1IjoiaWFuc291dGhlcm4iLCJhIjoiY20ybWowdnRlMHBmcjJqcTljaDdhYXV6diJ9.UK4tRTqDkO6yYffa-LIyWw';




      if (menuClass.getActiveSession()) {
        alert("Buenas");
        this.getAddresses();
      }

    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [-4.041201572157277, 50.39614566225547],
      zoom: 12
    });

    const map_2 = new mapboxgl.Map({
      container: 'map_2',
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



    const fields = [
      first_name, last_name, company_name, phone, country,
      state, town_city, street_address_1, postcode, email_address
    ];

    // Agregar un event listener para limpiar el borde rojo en cuanto se escriba algo
    fields.forEach(field => {
      field.addEventListener("input", function () {
        if (field.value.trim() !== "") {
          field.style.border = ""; // Elimina el borde rojo al escribir
        }
      });
    });





  }





  getAddresses(){
    const url = "../../controller/lanyard/addresses.php";
    const data = {
      action: "getAddresses"
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error("Network error.");
      })
      .then(data => {
      //  alert(data);
      const data2 =   JSON.parse(data);
      providedInformation.setHTMLAddresses(data2["addresses"]);

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }




   setHTMLAddresses(data) {
    // Dirección principal
    const firstName = document.getElementById("first_name");
    const lastName = document.getElementById("last_name");
    const companyName = document.getElementById("company_name");
    const phone = document.getElementById("phone");
    const streetAddress1 = document.getElementById("street_address_1");
    const country = document.getElementById("country");
    const state = document.getElementById("state");
    const townCity = document.getElementById("town_city");
    const postcode = document.getElementById("postcode");
    const emailAddress = document.getElementById("email_address");

    // Dirección secundaria
    const firstName2 = document.getElementById("first_name_2");
    const lastName2 = document.getElementById("last_name_2");
    const companyName2 = document.getElementById("company_name_2");
    const phone2 = document.getElementById("phone_2");
    const streetAddress1_2 = document.getElementById("street_address_1_2");
    const country2 = document.getElementById("country_2");
    const state2 = document.getElementById("state_2");
    const townCity2 = document.getElementById("town_city_2");
    const postcode2 = document.getElementById("postcode_2");
    const emailAddress2 = document.getElementById("email_address_2");

    // Dirección principal
    if (data[0]) {
      firstName.value = data[0]["first_name"] || "";
      lastName.value = data[0]["last_name"] || "";
      companyName.value = data[0]["company_name"] || "";
      phone.value = data[0]["phone"] || "";
      streetAddress1.value = data[0]["street_address_1"] || "";
      country.value = data[0]["country"] || "";
      state.value = data[0]["state"] || "";
      townCity.value = data[0]["town_city"] || "";
      postcode.value = data[0]["postcode"] || "";
      emailAddress.value = data[0]["email_address"] || "";
    }

    // Dirección secundaria
    if (data[1]) {
      firstName2.value = data[1]["first_name"] || "";
      lastName2.value = data[1]["last_name"] || "";
      companyName2.value = data[1]["company_name"] || "";
      phone2.value = data[1]["phone"] || "";
      streetAddress1_2.value = data[1]["street_address_1"] || "";
      country2.value = data[1]["country"] || "";
      state2.value = data[1]["state"] || "";
      townCity2.value = data[1]["town_city"] || "";
      postcode2.value = data[1]["postcode"] || "";
      emailAddress2.value = data[1]["email_address"] || "";
    }
  }



  checkEmptyValues(){
    var fulledValues = false;

    const fields = [
      first_name, last_name, company_name, phone, country,
       town_city, street_address_1, postcode, email_address
    ];

    let allFilled = true;

    fields.forEach(field => {
      if (field.value.trim() === "") {
        field.style.border = "1px solid red"; // Marcar en rojo los vacíos
        allFilled = false;
      } else {
        field.style.border = ""; // Limpiar el borde si está lleno
      }
    });

    if (allFilled) {
      fulledValues = true;
    } else {
      fulledValues = false;
    }

    return fulledValues;
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

  getAddress1() {
    const address1 = {
      first_name: first_name.value,
      last_name: last_name.value,
      company_name: company_name.value,
      phone: phone.value,
      country: country.value,
      state: state.value,
      town_city: town_city.value,
      street_address_1: street_address_1.value,
      postcode: postcode.value,
      email_address: email_address.value
    };

    return address1;
  }

  getAddress2() {
  const address2 = {
    first_name: first_name_2.value,
    last_name: last_name_2.value,
    company_name: company_name_2.value,
    phone: phone_2.value,
    country: country_2.value,
    state: state_2.value,
    town_city: town_city_2.value,
    street_address_1: street_address_1_2.value,
    postcode: postcode_2.value,
    email_address: email_address_2.value
  };

  return address2;
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

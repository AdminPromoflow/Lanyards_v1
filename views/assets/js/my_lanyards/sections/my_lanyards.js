class MyLanyardsClass {
  constructor() {
    for (let i = 0; i < box_my_jobs.length; i++) {
      box_my_jobs[i].addEventListener("click", function(){
        myLanyardsClass.selectMyJob(i);
        }
      )
    }
    open_artwork_details.addEventListener("click", function(){
      myLanyardsClass.showSection("none");
      artworkDetailsClass.showSection("flex");

    })

    this.makeAjaxRequestOrdersWithJobs();


  }
  makeAjaxRequestOrdersWithJobs() {
    chargingClass.hideShowchargin(true);

    // Define the URL and the JSON data you want to send
    const url = "../../controller/lanyard/order.php"; // Replace with your API endpoint URL
    const data = {
      action: "getOrdersWithJobsByEmail"
    };

    fetch(url, {
    method: "POST", // HTTP POST method to send data
    headers: {
      "Content-Type": "application/json" // Indicate that you're sending JSON
    },
    body: JSON.stringify(data) // Convert the JSON object to a JSON string and send it
  })
    .then(response => {
      // Check if the response status is OK (2xx range)
      if (response.ok) {
        return response.json(); // Parse the response as JSON
      }
      // For other errors, throw a general network error
      throw new Error("Network error.");
    })
    .then(data => {
    //  alert(JSON.stringify(data));

    const groupBox_my_lanyards = document.getElementById("groupBox_my_lanyards");
    groupBox_my_lanyards.innerHTML = ``;

      for (var i = 0; i < data["orders"].length; i++) {
        myLanyardsClass.drawOrders(data["orders"][i], i);
      }

    //  const dataObject = JSON.parse(data);
    //  alert(dataObject);
      // Process the response data
      chargingClass.hideShowchargin(false);

    })
    .catch(error => {
      // Handle specific errors (from throw in the .then block)
      console.error("Error:", error.message);
      alert(error.message); // Show the error message in an alert
    });

  }
  drawOrders(order, index){
    //alert(JSON.stringify(order))
    const groupBox_my_lanyards = document.getElementById("groupBox_my_lanyards");

    for (var i = 0; i < order["jobs"].length; i++) {
      alert(order["jobs"]["idJobs"]);
    }

    groupBox_my_lanyards.innerHTML += `
    <div class="box_my_lanyards">
      <h3>My order ${index + 1}</h3>
      <br>
      <div class="container_my_jobs">
        <div class="box_my_jobs">
          <h4>Hola 1</h4>
        </div>
        <div class="box_my_jobs">
          <h4>Hola 2</h4>
        </div>
      </div>
    </div>
    `;
  }
  showSection(action){
    section_my_lanyards.style.display = action;
  }
  selectMyJob(index){
    for (var i = 0; i < box_my_jobs.length; i++) {
      box_my_jobs[i].style.border = "1px solid transparent";
    }
    box_my_jobs[index].style.border = "1px solid white";


  }
}


const section_my_lanyards = document.getElementById("section_my_lanyards");
const open_artwork_details = document.getElementById("open_artwork_details");
const box_my_jobs = document.querySelectorAll(".box_my_jobs");
const myLanyardsClass = new MyLanyardsClass();

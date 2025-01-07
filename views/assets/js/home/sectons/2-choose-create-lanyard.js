class ChooseCreateLanyard {
  constructor() {
    arros_material_information[0].addEventListener("click", function(){
      alert("ho");
    });
    arros_material_information[1].addEventListener("click", function(){
      alert("hi");
    });

  }
}
const box_information2 = document.querySelectorAll(".box_information2");
const arros_material_information = document.querySelectorAll(".arros_material_information");
const chooseCreateLanyard = new ChooseCreateLanyard();

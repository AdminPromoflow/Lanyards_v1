class MyLanyardsClass {
  constructor() {
    for (let i = 0; i < box_my_jobs.length; i++) {
      box_my_jobs[i].addEventListener("click", function(){
        myLanyardsClass.selectMyJob(i);
        }
      )
    }
    open_artwork_details.addEventListener("click", function(){
      section_my_lanyards.style.display = "none";
    })
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

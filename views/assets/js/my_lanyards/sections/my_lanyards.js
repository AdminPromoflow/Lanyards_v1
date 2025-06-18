class MyLanyardsClass {
  constructor() {
    for (let i = 0; i < box_my_jobs.length; i++) {
      box_my_jobs[i].addEventListener("click", function(){
        myLanyardsClass.selectMyJob(i);
        }
      )
    }
  }
  selectMyJob(index){
    for (var i = 0; i < box_my_jobs.length; i++) {
      box_my_jobs[i].style.border = "1px solid transparent";
    }
    box_my_jobs[index].style.border = "1px solid white";


  }
}


const box_my_jobs = document.querySelectorAll(".box_my_jobs");
const myLanyardsClass = new MyLanyardsClass();

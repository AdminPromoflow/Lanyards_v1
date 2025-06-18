class MyLanyardsClass {
  constructor() {
    for (let i = 0; i < box_my_jobs.length; i++) {
      box_my_jobs[i].addEventListener("click", function(){
        alert(i);
      })
    }
  }
}


const box_my_jobs = document.querySelectorAll(".box_my_jobs");
const myLanyardsClass = new MyLanyardsClass();

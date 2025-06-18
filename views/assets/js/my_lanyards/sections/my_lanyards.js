class MyLanyardsClass {
  constructor() {
    for (let i = 0; i < box_my_jobs.length; i++) {
      box_my_jobs[i].addEventListener("click", function(){
        alert("bu");
      })
    }
  }
}


const box_my_jobs = document.getElementById("box_my_jobs");
const myLanyardsClass = new MyLanyardsClass();

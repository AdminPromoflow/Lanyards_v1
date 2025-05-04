class TermsConditions {
  constructor() {
    for (var i = 0; i < back_home_from_terms_conditions.length; i++) {
      back_home_from_terms_conditions[i].addEventListener("click", function(){
        alert("Si ya servía");
        window.location.href = "../../views/home/index.php";    })
    }
    }
}
const back_home_from_terms_conditions = document.querySelectorAll('.back_home_from_terms_conditions');
const termsConditions = new TermsConditions();

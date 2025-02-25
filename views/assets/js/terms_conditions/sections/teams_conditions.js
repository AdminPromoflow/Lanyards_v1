class TermsConditions {
  constructor() {
    back_home_from_terms_conditions.addEventListener("click", function(){
      window.location.href = "../../views/home/index.php";    })
  }
}
const back_home_from_terms_conditions = document.getElementById('back_home_from_terms_conditions');
const termsConditions = new TermsConditions();

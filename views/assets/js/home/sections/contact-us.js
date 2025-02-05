class ContactUsHome {
  constructor() {
    button_contact_us_from_home.addEventListener('click', function(){
      alert('bueno');
    });
  }
}

const button_contact_us_from_home = document.getElementById('button_contact_us_from_home');
const contactUsHome = new ContactUsHome();

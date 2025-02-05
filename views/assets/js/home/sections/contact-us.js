class ContactUsHome {
  constructor() {
    button_contact_us_from_home.addEventListener('click', function(){
      alert(nameContactUsHome);
    });
  }
}
const nameContactUsHome = document.getElementById('nameContactUsHome');
const emailContactUsHome = document.getElementById('emailContactUsHome');
const phoneContactUsHome = document.getElementById('phoneContactUsHome');
const messageContactUsHome = document.getElementById('messageContactUsHome');

const button_contact_us_from_home = document.getElementById('button_contact_us_from_home');
const contactUsHome = new ContactUsHome();

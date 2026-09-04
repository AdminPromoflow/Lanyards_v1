class ContactUsHome {
  constructor() {
    this.form = document.getElementById("homeContactForm");
    this.status = document.getElementById("contactFormStatus");

    this.form.addEventListener("submit", (event) => {
      event.preventDefault();
      this.submit();
    });
  }

  getFields() {
    return [nameContactUsHome, emailContactUsHome, phoneContactUsHome, messageContactUsHome];
  }

  resetErrors() {
    this.getFields().forEach((field) => field.removeAttribute("aria-invalid"));
    this.status.textContent = "";
    this.status.className = "contact-form-status";
  }

  validateFields() {
    this.resetErrors();
    const invalid = [];

    if (nameContactUsHome.value.trim().length < 2) invalid.push(nameContactUsHome);
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailContactUsHome.value.trim())) invalid.push(emailContactUsHome);
    if (!/^[+()\-\s\d]{7,20}$/.test(phoneContactUsHome.value.trim())) invalid.push(phoneContactUsHome);
    if (messageContactUsHome.value.trim().length < 10) invalid.push(messageContactUsHome);

    invalid.forEach((field) => field.setAttribute("aria-invalid", "true"));

    if (invalid.length) {
      this.status.textContent = "Please check the highlighted fields and add a little more detail.";
      this.status.classList.add("is-error");
      invalid[0].focus();
      return false;
    }

    return true;
  }

  async submit() {
    if (!this.validateFields()) return;

    buttonContactUs.disabled = true;
    buttonContactUs.textContent = "Sending…";
    this.status.textContent = "Sending your enquiry…";

    try {
      const response = await fetch("../../controller/users/contact-us.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          action: "contactUs",
          name: nameContactUsHome.value.trim(),
          email: emailContactUsHome.value.trim(),
          phone: phoneContactUsHome.value.trim(),
          message: messageContactUsHome.value.trim()
        })
      });

      const data = await response.json();
      if (!response.ok || data.success !== true) {
        throw new Error(data.message || "Unable to send your enquiry.");
      }

      this.form.reset();
      this.status.textContent = "Thank you. Your enquiry has been sent and we will be in touch soon.";
      this.status.classList.add("is-success");
    } catch (error) {
      this.status.textContent = "We could not send your enquiry. Please try again in a moment.";
      this.status.classList.add("is-error");
    } finally {
      buttonContactUs.disabled = false;
      buttonContactUs.textContent = "Send enquiry";
    }
  }
}

const nameContactUsHome = document.getElementById("nameContactUsHome");
const emailContactUsHome = document.getElementById("emailContactUsHome");
const phoneContactUsHome = document.getElementById("phoneContactUsHome");
const messageContactUsHome = document.getElementById("messageContactUsHome");
const buttonContactUs = document.getElementById("button_contact_us_from_home");
const contactUsHome = new ContactUsHome();

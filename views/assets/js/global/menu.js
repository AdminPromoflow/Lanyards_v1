class Menu {
  constructor() {
    this.activeSession = false;

    logo_img.addEventListener("click", () => {
      window.location.href = "../../views/home/index.php";
    });

    openLogin.forEach((element) => {
      element.addEventListener("click", () => {
        this.closeMenuMobile();
        loginClass.openLogin();
        loginClass.showLogin(0);
        registerClass.hideRegister(0);
      });
    });

    openSignup.forEach((element) => {
      element.addEventListener("click", () => {
        this.closeMenuMobile();
        registerClass.openRegister();
        registerClass.showRegister(0);
        loginClass.hideLogin(0);
      });
    });

    openMenuMobileButton.addEventListener("click", () => this.openMenuMobile());
    closeMenuMobileButton.addEventListener("click", () => this.closeMenuMobile());

    showLogout.addEventListener("click", (event) => {
      event.stopPropagation();
      const isOpen = containerLogout.style.display === "flex";
      containerLogout.style.display = isOpen ? "none" : "flex";
      showLogout.setAttribute("aria-expanded", String(!isOpen));
    });

    openLogoutButton.addEventListener("click", () => this.processUserLogout());
    mobileLogoutButton?.addEventListener("click", () => this.processUserLogout());

    document.addEventListener("click", (event) => {
      if (!containerLogout.contains(event.target) && !showLogout.contains(event.target)) {
        containerLogout.style.display = "none";
        showLogout.setAttribute("aria-expanded", "false");
      }

      if (!menuMobile.contains(event.target) && !openMenuMobileButton.contains(event.target)) {
        this.closeMenuMobile();
      }
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") {
        this.closeMenuMobile();
        containerLogout.style.display = "none";
      }
    });

    this.getActiveUserSession();
  }

  getActiveUserSession() {
    fetch("../../controller/users/session-user.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "checkSessionLogin" })
    })
      .then((response) => {
        if (!response.ok) throw new Error("Unable to check the current session.");
        return response.json();
      })
      .then((data) => {
        this.setActiveSession(Boolean(data.message));
        this.loginOrLogout();
      })
      .catch(() => {
        this.setActiveSession(false);
        this.loginOrLogout();
      });
  }

  loginOrLogout() {
    openLogin.forEach((element) => {
      element.style.display = this.activeSession ? "none" : "inline-flex";
    });

    openSignup.forEach((element) => {
      element.style.display = this.activeSession ? "none" : "inline-flex";
    });

    openLogoutClass.forEach((element) => {
      element.style.display = this.activeSession ? "inline-flex" : "none";
    });

    const isCartPage = window.location.pathname.endsWith("/views/shopping_cart/index.php");
    if (isCartPage && !this.activeSession) {
      window.location.href = "../../views/home/index.php";
    }
  }

  getActiveSession() {
    return this.activeSession;
  }

  setActiveSession(activeSession) {
    this.activeSession = Boolean(activeSession);
  }

  processUserLogout() {
    chargingClass.hideShowchargin(true);

    fetch("../../controller/users/session-user.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "processUserLogout" })
    })
      .then((response) => {
        if (!response.ok) throw new Error("Unable to log out.");
        return response.json();
      })
      .then(() => {
        window.location.href = "../../views/home/index.php";
      })
      .catch(() => {
        chargingClass.hideShowchargin(false);
        alert("We could not log you out. Please try again.");
      });
  }

  openMenuMobile() {
    menuMobile.classList.add("is-open");
    menuMobile.setAttribute("aria-hidden", "false");
    openMenuMobileButton.setAttribute("aria-expanded", "true");
    openMenuMobileButton.style.display = "none";
    closeMenuMobileButton.style.display = "inline-flex";
  }

  closeMenuMobile() {
    menuMobile.classList.remove("is-open");
    menuMobile.setAttribute("aria-hidden", "true");
    openMenuMobileButton.setAttribute("aria-expanded", "false");
    openMenuMobileButton.style.display = "inline-flex";
    closeMenuMobileButton.style.display = "none";
  }
}

const logo_img = document.getElementById("logo_img");
const openLogin = document.querySelectorAll(".openLogin");
const openSignup = document.querySelectorAll(".openSignup");
const openLogoutClass = document.querySelectorAll(".openLogout");
const openMenuMobileButton = document.getElementById("openMenuMobile");
const closeMenuMobileButton = document.getElementById("closeMenuMobile");
const menuMobile = document.getElementById("menuMobile");
const showLogout = document.getElementById("showLogout");
const containerLogout = document.getElementById("container_logout");
const openLogoutButton = document.getElementById("openLogout");
const mobileLogoutButton = document.querySelector(".mobileLogout");

const menuClass = new Menu();

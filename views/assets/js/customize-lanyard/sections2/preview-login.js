class ClassPreviewLogin {
  constructor() {

  }
  showLoginPreview(action){
    previewLoginContainer.style.display = action;
  }
  changeImage(action){
    if (action == "register") {
      previewLoginContainerImage.src = "../../views/assets/img/global/customize-lanyard/sections2/preview-login/avatarsRegister.png"

    }
    else {
      previewLoginContainerImage.src = "../../views/assets/img/global/customize-lanyard/sections2/preview-login/avatarsLogin.png"

    }

  }
}
const previewLoginContainer = document.getElementById("preview-login-container");
const previewLoginContainerImage = document.getElementById("preview-login-container-image");

const classPreviewLogin = new ClassPreviewLogin();

class PreviewClip {
  constructor() {
    // Store the main preview container element
    this.previewClip = document.getElementById("preview-clip-class");

  }
  togglePreviewClipClass(action) {
    this.previewClip.style.display = action;
  }
  showPreviewSelectedClip(data){
    console.log(data);
    const os25_clip = document.querySelectorAll(".os25-clip");
    const ts25_clip = document.querySelectorAll(".ts25-clip");
    const imgClip = document.querySelectorAll(".img-clip");



    for (var i = 0; i < imgClip.length; i++) {
      imgClip[i].innerHTML = "";
    }




      for (var i = 0; i < imgClip.length; i++) {
        imgClip[i].innerHTML ='<img class="" src="../../views/assets/img/global/customize-lanyard/sections/clip/one-end/'+data+'.png" alt="">';
      }

  }
}


const previewClip = new PreviewClip();

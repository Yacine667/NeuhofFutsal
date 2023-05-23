console.log('test');

// FIFA CARD

function showSnackBar(snackbarName) {
    var el;

    if (snackbarName === "style") {
      el = document.getElementById("snack-style");
    } else if (snackbarName === "position") {
      el = document.getElementById("snack-position");
    }
  
    el.className = "show";
  
    setTimeout(() => {
      el.className = el.className.replace("show", "");
    }, 8000);
  
    window.addEventListener("click", (event) => {
      if (event.target.className === "container") {
        el.className = el.className.replace("show", "");
      }
    });
  
    window.addEventListener("touchstart", (event) => {
      if (event.target.className === "container") {
        el.className = el.className.replace("show", "");
      }
    });
  }


    // Slide HOME

    document.addEventListener('DOMContentLoaded', () => {

      const slides = document.querySelectorAll('.slide')
      for (const slide of slides){
        slide.addEventListener('click', () =>{
          clearActiveClasses()
          slide.classList.add('active')
        })
      }
     
      function clearActiveClasses(){
        slides.forEach( (slide) =>{
          slide.classList.remove('active')
        })
      }
    
    });

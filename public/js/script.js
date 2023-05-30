// Slide ACTU HOME

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



// Nav Responsive Boutton

document.querySelector('.navTrigger').addEventListener('click',function () {

  document.querySelector('.navTrigger').classList.toggle('active');

  // console.log('Clicked menu');

  document.querySelector('#mainListDiv').classList.toggle('show_list');

  document.querySelector('#mainListDiv').classList.replace('show', 'hide');

});



// Caché flash message au bout de 5sc

function cacherDiv() {
  
  document.querySelector('.flashMessage').style.visibility = "hidden";
}

setTimeout(() => {cacherDiv()}, 5000);

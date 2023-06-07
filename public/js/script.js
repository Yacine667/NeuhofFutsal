// Slide ACTU HOME

document.addEventListener('DOMContentLoaded', () => {

  const slides = document.querySelectorAll('.slide')
  const titles = document.querySelectorAll('.maskTitle')


    for (const slide of slides){

      slide.addEventListener('click', () =>{

        clearActiveClasses()
        slide.classList.add('active')
        slide.style.cursor = 'default'
        maskTitle()


      })

    }
     
    function clearActiveClasses(){

      slides.forEach( (slide) =>{

        slide.classList.remove('active')

      })

    }

    function maskTitle(){

      titles.forEach( (title) =>{

        title.style.opacity = "0";

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
  
  document.querySelector('.flashMessage').style.display = "none";
}

setTimeout(() => {cacherDiv()}, 5000);




// Formulaire ajouter commentaires page actu 

const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelectorAll(".modal-trigger");

modalTriggers.forEach(trigger => trigger.addEventListener("click", toggleModal))

function toggleModal(){

  modalContainer.classList.toggle("active")
}
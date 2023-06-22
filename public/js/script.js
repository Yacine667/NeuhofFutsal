// -----------------------SECTION ACTU HOME ( SLIDE )-----------------------



document.addEventListener('DOMContentLoaded', () => {

  const slides = document.querySelectorAll('.slide')
  const titles = document.querySelectorAll('.maskTitle')
  const container = document.querySelector('#homeActuContainer')


  for (const slide of slides){

    slide.addEventListener('click', () =>{

      clearActiveClasses()
      slide.classList.add('active')
      slide.style.cursor = 'default'
      maskTitle()

    })

    container.addEventListener('mousedown', () =>{

      clearActiveClasses()

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



// -----------------------RESPONSIVE NAVBAR-----------------------


document.querySelector('.navTrigger').addEventListener('click',function () {

  document.querySelector('.navTrigger').classList.toggle('active');

  document.querySelector('#mainListDiv').classList.toggle('show_list');

  document.querySelector('#mainListDiv').classList.replace('show', 'hide');

});



// -----------------------CACHER MESSAGE FLASH TIMEOUT 5s-----------------------


function cacherDiv() {
  
  document.querySelector('.infoBulle').style.display = "none";
  document.querySelector('.flashMessage').style.display = "none";
  
}

setTimeout(() => {cacherDiv()}, 5000);



// -----------------------MODAL AJOUTER COMMENTAIRES PAGE DETAIL ACTU-----------------------


const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelectorAll(".modal-trigger");

modalTriggers.forEach(trigger => trigger.addEventListener("click", toggleModal))

function toggleModal(){

  modalContainer.classList.toggle("active")
}



// -----------------------DARK / LIGHT MODE-----------------------



const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
let body = document.querySelector('body');


toggleSwitch.addEventListener('change', switchTheme, false);

const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {

    document.body.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {

        toggleSwitch.checked = true;
    }

}

function switchTheme(e) {

  if (e.target.checked) {

      document.body.setAttribute('data-theme', 'dark');
      localStorage.setItem('theme', 'dark'); //add this
  }

  else {

      document.body.setAttribute('data-theme', 'light');
      localStorage.setItem('theme', 'light'); //add this
  }  
    
} console.log(localStorage)

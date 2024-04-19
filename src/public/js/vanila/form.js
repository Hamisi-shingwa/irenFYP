//This validate form
const errerDisplay = document.querySelector('.feedback-element')
const form = document.querySelector('form')

const inputs = form.querySelectorAll('input');
inputs.forEach(input=>{
    input.addEventListener('keyup',()=>{
        console.log(errerDisplay)
        if(errerDisplay.classList.contains('show')){
            errerDisplay.style.display="none"
        }
    })
})
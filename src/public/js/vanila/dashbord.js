//Here we start by select menu icon in html and then make the event to listen if user can clcik such menu
//Then once user click menu icon asideelement that hide our available link will be displayed
const menu = document.querySelector('.menu_page');
const asideelement = document.querySelector('.menu-container')

menu.onclick = ()=>{
    asideelement.classList.toggle('transMenu')
}
 


//Bellow is script for display and hide success information 
const successedElement = document.querySelector('.added-feedback')
if(successedElement){
    setTimeout(()=>{
     successedElement.style.display = "none";
    },3000)
}

//Edited form javascript
const ProfileForm = document.querySelector('.profile-picture')
const File = document.querySelector('#profileInput')

if(ProfileForm){
    ProfileForm.addEventListener('click',()=>{
        File.click()
        handleClick(File)
    })
}

function handleClick(file){
  file.addEventListener('change',(e)=>{
    const newImg = file.files[0];
    const url = URL.createObjectURL(newImg)
    ProfileForm.querySelector('img').src = url
  })
}
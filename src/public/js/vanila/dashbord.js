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

///Function to delete expired and warning medics
const Deletes = document.querySelectorAll('.delete')
const DialogConatiner = document.querySelector('.dialog-container')
if(DialogConatiner){
DialogConatiner.style.display = "none"
}
if(Deletes){
Deletes.forEach((deletes=>{
deletes.onclick = ()=>{
DialogConatiner.style.display = "block"
if(DialogConatiner){

let buttons = DialogConatiner.querySelectorAll('button')
buttons.forEach(button=>{
button.onclick = ()=>{
if(button.textContent=="Yes"){
  deletes.nextElementSibling.click()
}else{
  DialogConatiner.style.display = "none"
}
}
})

}
}
}))
}

//system checking cod
//Lets us start with looking for checking button
const checkBoxs = document.querySelectorAll('input[type=checkbox]')
if(checkBoxs){
checkBoxs.forEach(checkbox=>{
let isChecked = checkbox.nextElementSibling.value;
 isChecked == "true" ? checkbox.click() :""
 checkbox.onclick = (e)=>{
  e.target.checked == false ? isChecked = "false" : isChecked = "true"
  console.log(isChecked)
 }
})
}

//Then lets deal with uploading sytem logo and system profile
const customeImages = document.querySelectorAll('.custome-image')
if(customeImages){
   customeImages.forEach(image=>{
  const file = image.nextElementSibling;//This is input file bellow image tag displayed on browser
    file.style.display="none";
    image.onclick = ()=>file.click()//If someone click image displayed will outomatic click an input file 
file.addEventListener('change',(e)=>{
  const takedFile = file.files[0];
  const newUrl = URL.createObjectURL(takedFile);
  image.querySelector('img').src = newUrl;
})
   })
}

// ********************************************************
// HADLE SEARCH JS is bellow
const Navsearch = document.getElementById('inav-search');
const Navselect = document.getElementById('select')
const navbtn = document.getElementById('innavbutton')

async function  searchMedics(){
   const response = await fetch("../searched/ajaxmedics.php");
   const data = await response.json()
   return data
}

function createLink(value){
  const a = document.createElement('a')
  a.href = `./dashbord.php?page=searched&&medics=${value}`
  a.click()
}
navbtn.onclick = async ()=>{
  if(Navsearch.value!=""){
    const datas = await searchMedics()// we fire this function only if user search for something
    const typedValue = Navsearch.value;
  const medics =  datas.filter(data=>{
      return data.medical_name.toLowerCase() == typedValue.toLowerCase()
    })
    if(medics != "") {
      const medic = medics[0].medical_name;
      createLink(medic);
    }else alert(`${typedValue} does not match any available medics, please select it instead`)
   
  }
  else if(Navselect.value!=""){
    const medic = Navselect.value
    createLink(medic);
  }else{
    alert("Can't search while you type or select nothing")
  }


}
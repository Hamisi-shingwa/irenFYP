//Pre-loade element will run to show that someaction was done within a system

function PreLoader(body){
    const preloaderContainer = document.createElement('div')//this parent element of prloader
    preloaderContainer.className = 'LoaderContainer';
    const middleElement = document.createElement('div')//This will be middle of container
    middleElement.className= 'middleLoader'
    const Loader = document.createElement('div')//This is loader element
    Loader.className = 'Loader'
    const textElement = document.createElement('div')
    textElement.classList = 'textLoader'
    textElement.textContent = "Loading..."
    
    preloaderContainer.appendChild(middleElement);//We use appendChild becouse it only append one element
    middleElement.append(Loader)
    middleElement.append(textElement)
    body.appendChild(preloaderContainer)
   const Int =  setInterval(()=>{
       body.removeChild(preloaderContainer)
       clearInterval(Int)
     },500)
   
   
}
const body = document.querySelector('body')
window.onload = ()=>PreLoader(body)

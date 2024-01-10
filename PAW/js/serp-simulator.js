const seoTitle = document.querySelector('#formSeoTitle'); 
const seoDesc = document.querySelector('#formSeoDesc'); 
const hiddenElement = document.querySelector('#hidden-element'); 
const hiddenElementDesc = document.querySelector('#hidden-element-desc'); 

let titleChars = document.querySelector(".title-chars");
let titleWidth = document.querySelector(".title-width");
let descChars = document.querySelector(".desc-chars");
let descWidth = document.querySelector(".desc-width");


const titleResult = document.querySelector('.title-result'); 
const descResult = document.querySelector('.desc-result'); 

seoTitle.addEventListener('keydown', ()=>{
    titleResult.innerHTML = seoTitle.value;
    hiddenElement.innerHTML = seoTitle.value;
    titleWidth.innerHTML = hiddenElement.offsetWidth;
    titleChars.innerHTML = seoTitle.value.length+1;              
})
seoDesc.addEventListener('keydown', ()=>{
    descResult.innerHTML = seoDesc.value;
    hiddenElementDesc.innerHTML = seoDesc.value;
    descWidth.innerHTML = hiddenElementDesc.offsetWidth;
    descChars.innerHTML = seoDesc.value.length+1;   
})
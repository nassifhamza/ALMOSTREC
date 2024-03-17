//navbar jdida
document.addEventListener('DOMContentLoaded', function() {

 let bnt=document.querySelector('#btn');
 let sidebar=document.querySelector('.sidebar');
 
 bnt.onclick=function(){
     sidebar.classList.toggle('active');
 };
 });


 /*arrow up*/
let btn=document.querySelector(".btn")

window.addEventListener("scroll",(event)=>
 {
    if(window.scrollY>100)
    btn.classList.add("active");
   else if(window.scrollY===0)
   btn.classList.remove("active");
 })



 btn.addEventListener("click",()=>
 {
    window.scrollTo({
        top:0,
        behavior:"smooth"
    });
 })

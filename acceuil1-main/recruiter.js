
//navbar jdida
document.addEventListener('DOMContentLoaded', function() {

   let bnt=document.querySelector('#btn');
   let sidebar=document.querySelector('.sidebar');
   
   bnt.onclick=function(){
       sidebar.classList.toggle('active');
   };
   });

   
//arrow up

let btn=document.querySelector(".btn")

window.addEventListener("scroll",(event)=>
 {
    if(window.scrollY>100)
    btn.classList.add("active");
   else if(window.scrollY===0)
   btn.classList.remove("active");
 })

let MONITOR=document.querySelectorAll(".sidebar ul li a");
let MONITOR1=document.querySelectorAll(".sidebar ul li .tooltip");

MONITOR.forEach(el=>{
   el.addEventListener("mouseenter",(event)=>
   {
      MONITOR1.forEach(ELE=>{
         ELE.hidden=true;
      })
   el.nextElementSibling.removeAttribute("hidden");

   })

})

 btn.addEventListener("click",()=>
 {
    window.scrollTo({
        top:0,
        behavior:"smooth"
    });
 })





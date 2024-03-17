
//changer couleur du navbar
/*
document.addEventListener("DOMContentLoaded", function() {

$(document).ready(function(){
                   $(window).scroll(function(){
                                     var scroll =$(window).scrollTop();
                                     if(scroll>150){
                                     $(".navbar").css("background","#222");
                                     $(".navbar").css("box-shadow","rgba(0,0,0,0.1) 0px 4px 12px");
                                    }else{
                                    $(".navbar").css("background","transparent");
                                    $(".navbar").css("box-shadow","none");
                                   }
                   })
})
;
*/
//smooth scrool 
/*
document.addEventListener("DOMContentLoaded", function() {
 var navbarHeight = $(".navbar").outerHeight();
 $(".navbar-menu a").click(function(e) {
     var targethref = $(this).attr("href");
     $("html,body").animate({
         scrollTop: $(targethref).offset().top - navbarHeight
     }, 1000);
     e.preventDefault();
 });
});
*/

//navbar mobile version


const mobile=document.querySelector(".menu-toggle");
const mobilelink=document.querySelector(".navbar-menu");

mobile.addEventListener("click",function(){
     mobile.classList.toggle("is-active");
     mobilelink.classList.toggle("active");

})

mobilelink.addEventListener("click",function(){
    const menubars=document.querySelector(".is-active");
    if(window.innerWidth<=768 && menubars){
     mobile.classList.toggle("active");
    mobilelink.classList.remove("active")
   }
})

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

let btn=document.querySelector(".btn")
let nav2=document.querySelector(".container nav");
let SECONDWINDOW=document.querySelector("#pager")
console.log(SECONDWINDOW);
 SECONDWINDOW.addEventListener("scroll",(event)=>
{

   
nav2.classList.add("act");
    btn.classList.add("active");
})
SECONDWINDOW.addEventListener("scroll",(event)=>
 {
    if(SECONDWINDOW.scrollTop===0)
    {
      nav2.classList.remove("act");
    btn.classList.remove("active");
    }
 });
window.addEventListener("scroll",(event)=>
 {

if(window.scrollY>0)
nav2.classList.add("act");
    if(window.scrollY>0)
    btn.classList.add("active");
   
 });



window.addEventListener("scroll",(event)=>
 {
    if(window.scrollY===0)
    {
      nav2.classList.remove("act");
    btn.classList.remove("active");
    }
 });
 btn.addEventListener("click",()=>
 {
  SECONDWINDOW.scroll({

   top:0,
   behavior:"smooth",
  }
   
  )
  
});


let S1=document.getElementById("pager");


//first methode of changing photos 
// setInterval(function()
// {

// setTimeout(function(){
// S1.classList.add("active1");
// },3000);   
//    setTimeout(function(){
// S1.classList.remove("active1");
// S1.classList.add("active2");
//    },6000)
//    setTimeout(function(){
//       S1.classList.remove("active2");
//       S1.classList.add("active3");
//          },10000)
//          setTimeout(function(){
//             S1.classList.remove("active3");
//             S1.classList.add("active4");
//                },14000)
//                S1.classList.remove("active4");
         

// },20000)

// seconde methode of changing photos
let RANDOMBACK=true;

let IMGARR=["pexels-pixabay-373543.jpg","ARIAANDACCESSEBILITY.png","Screenshot2024-01-22153054.png","semantics.png"];


if(window.localStorage.option)
{
 
   document.body.querySelector(`span[data-text=${window.localStorage.option}]`).classList.add("active");
   if(window.localStorage.getItem("option")==="NO")
  RANDOMBACK=false;
else
RANDOMBACK=true;
}
 


let ASIDE=document.querySelector(".settings");

let BTN=document.querySelector(".SOUSCONTAINER ")

let RDN=document.querySelectorAll(".options span");
   document.addEventListener("click",(event)=>
{
   if( event.target.className==="settings")
   ASIDE.classList.add("active");
})




let TABC =document.querySelectorAll(".options ul li");
// TABC.forEach(function(el)
// {

//    el.addEventListener("click",(event)=>
//    {
      
//       console.log(event.currentTarget.dataset.color);
//        if(el.dataset.color!== event.currentTarget.dataset.color)
//      ASIDE.classList.remove("active");
 
   

//    })
// })


 i=0;
let INTER=setInterval(()=>
{
  if(RANDOMBACK===true)
  {
   S1.style.backgroundImage="url(images/"+IMGARR[i]+")";
   i++;
   if(i===IMGARR.length)
   i=0;
  }

},4000)

RDN.forEach(el=>{
   el.addEventListener("click",(event)=>
   {
      RDN.forEach(ele=>
         {
ele.classList.remove("active");

         })
         el.classList.add("active");
         if(el.classList.contains("active"))
         {
       window.localStorage.option=el.dataset.text;
       if(el.dataset.text==="YEAS")
       {

       RANDOMBACK=true;
       location.reload();
       
       }
       else

       {
       RANDOMBACK=false;
       clearInterval(INTER);

       }

         }
      
   })
})

 
   document.addEventListener("click",(event)=>
   {
      
      if(event.target.className!==ASIDE.className && event.target.className!==RDN[0].className && event.target.className!==RDN[1].className && event.target.className!=="settings_container" && event.target.dataset.color!=="red" && event.target.dataset.color!=="blue"&& event.target.dataset.color!=="yellow"&& event.target.dataset.color!=="pink"&& event.target.dataset.color!=="green" && event.target.dataset.color!=="black" )
       ASIDE.classList.remove("active");
   })
  

   
   
   //  let BGT=document.querySelector("#SPEC");

    let logo=document.querySelector("h2.LOGO");


    if(window.localStorage.COLORS)
    {

      logo.style.color=window.localStorage.COLORS;
      document.documentElement.style.setProperty("--maincolor",window.localStorage.COLORS); 
  
       document.querySelector(`[data-color=${window.localStorage.COLORS}]`).classList.add("MOVE");
   }
   
    TABC.forEach((el)=>
    {
      
   
    el.addEventListener("click",(eve)=>
     {
     TABC.forEach((el)=>
      {
         el.classList.remove("MOVE");
       })
   
       el.classList.add("MOVE");
       window.localStorage.setItem("COLORS",eve.currentTarget.dataset.color);

        logo.style.color=window.localStorage.COLORS;

       document.documentElement.style.setProperty("--maincolor",window.localStorage.COLORS);
     
    });
       



      
    });
//     BGT.addEventListener("click",()=>
// {
//     TABC.forEach((el)=>
//     {
//         el.classList.remove("MOVE");
//     })
// location.reload();
//     window.localStorage.clear();

// })

// if(RANDOMBACK === true)
// {
// setInterval(function(){

//    let RNDN=parseInt(Math.random()*IMGARR.length);

//    S1.style.backgroundImage="url(images/"+IMGARR[RNDN]+")";
  
// },4000)
// }


// let ourskills=document.querySelector(".skills");
// window.addEventListener("scroll",(event)=>

// {
//    let skilloffsettop=ourskills.offsetTop;
//    let skillouterheight=ourskills.offsetHeight;
//    let windowheight=window.innerHeight;
//    let windowscrolltop=window.pageYOffset;
//    if(windowscrolltop >(skilloffsettop+skillouterheight -windowheight))
//    {
// let progress=document.querySelectorAll(".skills .skill-box .skill-progress span")
// progress.forEach(el=>
//    {
//       el.style.width=el.dataset.progress;
//    })
//    }
//    else
//    {
//       let progress=document.querySelectorAll(".skills .skill-box .skill-progress span")
// progress.forEach(el=>
//    {
//       el.style.width="0";
//    })
//    }


// })
// let PHOTOS=document.querySelectorAll(".POPUP_box img");

// PHOTOS.forEach(el=>
//    {
//       el.addEventListener("click",(event1)=>
//       {
//  let overlay=document.createElement("div");
//  overlay.className="overlay";
//  document.body.appendChild(overlay);
// let popupbox=document.createElement("div");
// popupbox.className="POPUPBOX";
// let popubImage=document.createElement("img");

// popubImage.setAttribute("src",el.src);
// popupbox.setAttribute("data-text","LOLA");
// popupbox.appendChild(popubImage);
// document.body.append(popupbox);

// if(el.alt!==null)
// {
//    let imghead=document.createElement("h3");
//    let imgtext=document.createTextNode(el.alt);
//    imghead.appendChild(imgtext);
//    imghead.style.cssText="text-align:center;margin:10px";

//    popupbox.prepend(imghead);

// }

// let closebtn=document.createElement("span");
// closebtn.className="CLOSEBTN";
// let closeBUTNX=document.createTextNode("X");

// closebtn.prepend(closeBUTNX);

// closebtn.style.cssText="cursor:pointer;color:white;font-size:15px;background-color:red;padding:10px";

// closebtn.addEventListener("click",()=>
// {
   
//    overlay.remove();
//    popupbox.remove();


// })



// popupbox.style.cssText="direction:rtl";
// popupbox.prepend(closebtn);

// document.addEventListener("click",(event)=>
// {
// if(event.target.className!==undefined)
// {
// //   console.log(event.target.className);
//  if(event.target.className==="overlay")
// {
//  overlay.remove();
//  popupbox.remove();
// }
// }
// })

//       })

//    })


  
   // document.addEventListener("click",(event)=>
   // {
    
   //    if(event.target.alt!=="image one" && event.target.alt!=="image two")
   //   {
   //    PHOTOS.forEach(el=>
   //       {
   //          el.classList.remove("active");
   //       })
   //   }
   // })














//------------------------------------------------------DYNAMIC FORM-------------------------------------------------------




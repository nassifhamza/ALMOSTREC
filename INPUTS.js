let TEL=document.querySelector("input[name='TEL']");

console.log(TEL);
// TEL.oninput= function(EVE){
//     if(isNaN(-EVE.value))
//     EVE.preventDefault();
// }


TEL.addEventListener("input",(event)=>
{
    
    if(isNaN(Number(event.target.value)) )
    event.target.value="";

})

TEL.addEventListener("keypress",(event)=>
{
    
if( /[0-9]{12,}/ig.test(event.target.value))
    event.preventDefault();

})

let H=false;
 
// function * FORMATION()
// {
//     i=0;
//     while(i<100)
//     yield i++;

// }


// function * COMPETENCE()
// {
//     i=0;
//     while(i<100)
//     yield i++;

// }


 
  class DYNAMIC
  {
    // #BN1;#TE1;#ABTAHT1;
 constructor(BUTTON,TASK,TAHT,TE)
{
    
//     this.WAHD=`form .FORMAT .${BUTTON}`;
// this.JOJ=`form .FORMAT #TASK${TASK}`;
// this.TLATA=`form .FORMAT .TAHT${TAHT}`;
this.BN1=document.querySelector(`form .FORMAT .${BUTTON}`);
this.TE1=document.querySelectorAll(`form .FORMAT #TASK${TASK}`);
this.ABTAHT1=document.querySelector(`form .DYNAMIC .TAHT${TAHT}`);
this.VALID=false;
this.TERM=`${TE}[]`;
}

SECTION()
{
   

// let FORMA=FORMATION();
this.BN1.addEventListener("click",(eve)=>
{

    let VERFICATION=[...this.TE1].some((el)=>el.value==="");


    if(!VERFICATION)
    {
let HR=document.createElement("hr");
    let GRABER=document.createElement("div");
     this.TE1.forEach(el=>
        {
            let ELEMENTS=document.createElement("div");
            ELEMENTS.className="TOTAL";
            let TEXT=document.createTextNode(`${el.placeholder}`);
            let span =document.createElement("span");
            let SAVE=document.createElement("button");
            let B1=document.createElement("button");
B1.innerHTML="EDIT";
B1.className="BED";
SAVE.innerHTML="SAVE";

         SAVE.className="SAEDIT disap";
            let CA=document.createElement("input");
            CA.type=el.type;
            CA.className=`${el.value} CHOICES`;
            CA.readOnly=true;
            CA.style.cssText="background-color:BLACK; border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;"
            CA.value=el.value;
            CA.name=this.TERM;
            B1.type="button";
            SAVE.type="button";
            // CA.append(el.value);
            span.append(TEXT);
        span.style.cssText="COLOR:var(--maincolor,RED);";
            ELEMENTS.append(CA);
            ELEMENTS.append(B1);
           ELEMENTS.append(SAVE);
           GRABER.append(span);
           GRABER.append(ELEMENTS);
            el.value="";
        })

    GRABER.className="DATA1";
    HR.style.cssText="border:3px dashed red;width:300px;margin:20px;";
let BT=document.createElement("button");
BT.innerHTML="DELETE";
BT.className="BTV";
BT.style.cssText="background-color:red;border-radius:10px;color:white;padding:5px;width:fit-content;position:absolute;bottom:-30px;left:40%;cursor:pointer;";
BT.type="button";
GRABER.style.cssText="margin:60px;position:relative;";
GRABER.append(BT);
GRABER.prepend(HR);
this.ABTAHT1.append(GRABER);
// window.sessionStorage.setItem(TE1.value,TE1.value);
this.VALID=true;
H=true;
    }
    else
    eve.preventDefault();
});

}


EVENT()
{

    this.ABTAHT1.addEventListener("mouseenter",(event2)=>
    {
        let ALL=document.querySelectorAll(".DATA1");
        
        console.log(ALL);
        ALL.forEach(el=>
            {

    
                el.addEventListener("click",(event)=>
                {
                    if(event.target.className === "BTV")
                    {
                         el.remove();
                         
    // window.sessionStorage.removeItem(el.value);  

                    }
    
                })
    
    
                event2.target.addEventListener("click",(event)=>
    {
    
        console.log("HA");
        if(event.target.className === "BED" )
        {
        
            event.target.classList.toggle("disap");
            event.target.nextElementSibling.classList.toggle("disap");
            event.target.previousElementSibling.readOnly=false;
            event.target.previousElementSibling.style.cssText="background-color:var(--maincolor,blue); border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;";
    
        }
    
        else if(event.target.className === "SAEDIT")
        {


            event.target.classList.toggle("disap");
        event.target.parentElement.firstElementChild.readOnly=true;
        event.target.parentElement.firstElementChild.style.cssText="background-color:BLACK; border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;";
            event.target.previousElementSibling.classList.toggle("disap");
    
        }
    
    
    
    })   
    
    
    
    // el.addEventListener("mouseenter",eve=>
    // {
    
       
    //    if(eve.target.className==="SAEDIT")
    //    console.log("ANA HADA");
        
         
    //                         // eve.target.lastElementChild.addEventListener("click",(event1)=>
    //                         // {
    //                         //     if(eve.target.className==="SAEDIT")
    //                         //     {
                                    
    //                         //         ele.firstElementChild.disabled=true;
    //                         //        ele.lastElementChild.hidden=true;
    //                         //     }
    //                         // })
                                
        
       
            
    
    // })
                
    
    })
    
    
    });

}




  } 




  let FIRST= new DYNAMIC("FOR","1","1","FORMATS");
  FIRST.SECTION();
  FIRST.EVENT();
  let SECOND= new DYNAMIC("SKILL","2","2","SKILLS");
 SECOND.SECTION();
SECOND.EVENT();
let THIRD= new DYNAMIC("EXPS","3","3","EXPS");
THIRD.SECTION();
THIRD.EVENT();
let FOURTH =new DYNAMIC("PROJET","4","4","PROJETS");
FOURTH.SECTION();
FOURTH.EVENT();

let FIFTH =new DYNAMIC("LANG","5","5","LANGS");
FIFTH.SECTION();
FIFTH.EVENT();



let submit=document.querySelector(".END");
submit.addEventListener("mouseenter",(event)=>
{

    document.querySelector(".FOR").click();
    document.querySelector(".SKILL").click();
    document.querySelector(".EXPS").click();
    document.querySelector(".PROJET").click();
    document.querySelector(".LANG").click();
  setTimeout(() => {
    
    if(!FIRST.VALID)
    {

        event.preventDefault();
    alert("FORMATION EST IMPORTANT");

    }
    else if(!SECOND.VALID)
    {
        event.preventDefault();
    alert("COMPETENCE EST IMPORTANT");

    }
   else if(!FIFTH.VALID)
   {
    event.preventDefault();
    alert("LANGUAGE EST IMPORTANT");
    }


  }, 400);
    



})




// let BN1=document.querySelector("form .FORMAT .FOR");
// let TE1=document.querySelectorAll("form .FORMAT #TASK1");
// let ABTAHT1=document.querySelector("form .DYNAMIC .TAHT1");

// // let FORMA=FORMATION();
// BN1.addEventListener("click",(eve)=>
// {

//     let VERFICATION=[...TE1].some((el)=>el.value==="");


//     if(!VERFICATION)
//     {
// let HR=document.createElement("hr");
//     let GRABER=document.createElement("div");

//      TE1.forEach(el=>
//         {
//             let ELEMENTS=document.createElement("div");
//             ELEMENTS.className="TOTAL";
//             let TEXT=document.createTextNode(`${el.placeholder}`);
//             let span =document.createElement("span");
//             let SAVE=document.createElement("button");
//             let B1=document.createElement("button");
// B1.innerHTML="EDIT";
// B1.className="BED";
// SAVE.innerHTML="SAVE";

//          SAVE.className="SAEDIT disap";
//             let CA=document.createElement("input");
//             CA.type=el.type;
//             CA.className=`${el.value} CHOICES`;
//             CA.disabled=true;
//             CA.style.cssText="background-color:BLACK; border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;"
//             CA.value=el.value;
//             CA.name=`FORMA[]`;
//             B1.type="button";
//             SAVE.type="button";
//             // CA.append(el.value);

//             span.append(TEXT);
//         span.style.cssText="COLOR:var(--maincolor,RED);";
//             ELEMENTS.append(CA);
//             ELEMENTS.append(B1);
//            ELEMENTS.append(SAVE);
//            GRABER.append(span);
//            GRABER.append(ELEMENTS);
//             el.value="";
//         })

//     GRABER.className="DATA1";
//     HR.style.cssText="border:3px dashed red;width:300px;margin:20px;";
// let BT=document.createElement("button");
// BT.innerHTML="DELETE";
// BT.className="BTV";
// BT.style.cssText="background-color:red;border-radius:10px;color:white;padding:5px;width:fit-content;position:absolute;bottom:-30px;left:40%;cursor:pointer;";
// BT.type="button";
// GRABER.style.cssText="margin:60px;position:relative;";
// GRABER.append(BT);
// GRABER.prepend(HR);
// ABTAHT1.append(GRABER);
// // window.sessionStorage.setItem(TE1.value,TE1.value);

// H=true;
//     }
//     else
//     eve.preventDefault();
// });






// // if(window.sessionStorage.length>0)
// // {
// //     for(let i=1;i<window.sessionStorage.length;i++)
// // {

// //     let CA=document.createElement("div");
// // CA.className=`${window.sessionStorage.getItem(window.sessionStorage.key(i))} CHOICES`;
// // let BT=document.createElement("button");
// // BT.innerHTML="DELETE";
// // BT.className="BTV";
// // BT.style.cssText="background-color:red;border-radius:10px;color:white;padding:5px;width:fit-content";
// // CA.style.cssText="background-color:white; border-radius:10px; width:50%;padding:10px;margin:10px auto; display:flex ;justify-content:space-between";
// // CA.value=window.sessionStorage.getItem(window.sessionStorage.key(i));
// // CA.append(window.sessionStorage.getItem(window.sessionStorage.key(i)));
// // CA.append(BT);
// // ABTAHT.append(CA);

// // }
// // }

// let i=false;
// document.querySelector(".TAHT1").addEventListener("mouseenter",(event2)=>
// {
//     let ALL=document.querySelectorAll(".DATA1");
    
//     console.log(ALL);
//     ALL.forEach(el=>
//         {

//             el.addEventListener("click",(event)=>
//             {
//                 if(event.target.className === "BTV")
//                 {
//                      el.remove();
                     
// // window.sessionStorage.removeItem(el.value);  
//                 }

//             })


//             event2.target.addEventListener("click",(event)=>
// {

//     console.log("HA");
//     if(event.target.className === "BED" )
//     {
    
//         event.target.classList.toggle("disap");
//         event.target.nextElementSibling.classList.toggle("disap");
//         event.target.previousElementSibling.disabled=false;
//         event.target.previousElementSibling.style.cssText="background-color:var(--maincolor,blue); border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;";

    
//     }

//     else if(event.target.className === "SAEDIT")
//     {
//         event.target.classList.toggle("disap");
//     event.target.parentElement.firstElementChild.disabled=true;
//     event.target.parentElement.firstElementChild.style.cssText="background-color:BLACK; border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;";
//         event.target.previousElementSibling.classList.toggle("disap");

//     }



// })   



// el.addEventListener("mouseenter",eve=>
// {

   
//    if(eve.target.className==="SAEDIT")
//    console.log("ANA HADA");
    
     
//                         // eve.target.lastElementChild.addEventListener("click",(event1)=>
//                         // {
//                         //     if(eve.target.className==="SAEDIT")
//                         //     {
                                
//                         //         ele.firstElementChild.disabled=true;
//                         //        ele.lastElementChild.hidden=true;
//                         //     }
//                         // })
                            
    
   
        

// })
            

// })


// });


// TO GET BACK TO WHEN WE NEED IT 

// document.addEventListener("mouseenter",(event2=>
    
//     {


// event2.target.addEventListener("click",(event)=>
// {

//     console.log("HA");
//     if(event.target.className === "BED")
//     {
//      console.log("MAZAL");
// if(event.target.innerHTML==="EDIT")
// {
//     console.log("HNA 1!!") ; 
//         event.target.innerHTML="<i class='fa-solid fa-check'></i>";
// event.target.style.cssText="background-color:green;margin-top:25px;margin-left:30px;border-radius:10px;color:white;padding:5px;width:fit-content;position:absolute;cursor:pointer";
//        event.target.previousElementSibling.disabled=false;

// }

// else
// {
//     console.log("HNA 2 !!") ; 
//    event.target.innerHTML="EDIT";
// event.target.style.cssText="background-color:RED;margin-top:25px;margin-left:30px;border-radius:10px;color:white;padding:5px;width:fit-content;position:absolute;cursor:pointer";
// event.target.previousElementSibling.disabled=true;


// }
//     }



// })   





//     }))  






// function PUTTING(TE,TAHT)
// {

//     this.ABTAHT1=document.querySelector(`form .DYNAMIC .TAHT${TAHT}`);
// this.TERM=`${TE}[]`;
// this.HR=document.createElement("hr");
//    this.GRABER=document.createElement("div");

   

// // let FORMA=FORMATION();


// this.IMPO=function()
// {


   
//             let ELEMENTS=document.createElement("div");
//             ELEMENTS.className="TOTAL";
//             let TEXT=document.createTextNode(`${KEY}`);
//             let span =document.createElement("span");
//             let SAVE=document.createElement("button");
//             let B1=document.createElement("button");

// B1.innerHTML="EDIT";
// B1.className="BED";
// SAVE.innerHTML="SAVE";

//          SAVE.className="SAEDIT disap";
//             let CA=document.createElement("input");
//             CA.type="text";
//             CA.className=`${TAB} CHOICES`;
//             CA.readOnly=true;
//             CA.style.cssText="background-color:BLACK; border-radius:10px; width:fit-content;padding:20px;margin:10px auto;color:white;"
//             CA.value=TAB;
//             CA.name=this.TERM;
//             B1.type="button";
//             SAVE.type="button";
//             // CA.append(el.value);
//             span.append(TEXT);
//         span.style.cssText="COLOR:var(--maincolor,RED);";
//             ELEMENTS.append(CA);
//             ELEMENTS.append(B1);
//            ELEMENTS.append(SAVE);
//            this.GRABER.append(span);
//            this.GRABER.append(ELEMENTS);
            
      
// }

// this.ENDING=function()
// {
//     this.GRABER.className="DATA1";
//     this.HR.style.cssText="border:3px dashed red;width:300px;margin:20px;";
// let BT=document.createElement("button");
// BT.innerHTML="DELETE";
// BT.className="BTV";
// BT.style.cssText="background-color:red;border-radius:10px;color:white;padding:5px;width:fit-content;position:absolute;bottom:-30px;left:40%;cursor:pointer;";
// BT.type="button";
// this.GRABER.style.cssText="margin:60px;position:relative;";
// this.GRABER.append(BT);
// this.GRABER.prepend(HR);
// this.ABTAHT1.append(GRABER);
// // window.sessionStorage.setItem(TE1.value,TE1.value);
// }
   
// }

    


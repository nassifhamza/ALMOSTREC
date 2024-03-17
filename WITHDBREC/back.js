let checkboxREMEMBER=document.querySelector("input[name='check']");



const loginbtn= document.getElementById("login");

const container= document.querySelector("#container");

const registerbtn=document.querySelector("#register");

registerbtn.addEventListener('click',()=>
{
    container.classList.add("active");
});

loginbtn.addEventListener('click',()=>
{
    container.classList.remove("active");
});
let pass=document.querySelector("input[name='passwordS']");
let PASSWORD=document.querySelector("input[name='visible']");
PASSWORD.addEventListener("click",(el)=>
{
   if(PASSWORD.checked===true)
   pass.type="text";
   else
  pass.type="password";
});
if(window.localStorage.KAYN)
{
   if(window.localStorage.KAYN==="kayn")
   checkboxREMEMBER.checked=true;
else
checkboxREMEMBER.checked=false;
}




checkboxREMEMBER.addEventListener("click",(el)=>
{
   if(checkboxREMEMBER.checked===true)
  window.localStorage.KAYN="kayn";
   else
   window.localStorage.KAYN="MAKAN";
});

// let FORSIGNIN=document.querySelector(".sign-in");
let SUBBTN=document.getElementById("SIGNIN");
console.log(SUBBTN);
let email=document.querySelector("input[name='emailS']");
console.log(email);
let passkey=document.querySelector("input[name='passwordS']");
console.log(passkey);

SUBBTN.addEventListener("click",event=>
{
if(!/^[a-z0-9_-]{3,16}$/ig.test(email.value) && !/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,8})*$/ig.test(email.value))
{
    let background=document.createElement("div");
    background.className="ERROR";
    let message=document.createTextNode("YOUR EMAIL OR USERNAME ARE INVALID");
    background.appendChild(message);
    background.style.cssText="padding:20px;color:white;background-color:rgb(255,0,0,0.5);border:2px solid white;border-radius:6px;position:absolute;left:25%;top:0; width:20%;text-align:center;";
document.body.prepend(background);
event.preventDefault();

}
})
registerbtn.addEventListener("click",event=>
{

  if(document.querySelector("div[class='ERROR']"))
  {
    document.querySelector("div[class='ERROR']").remove();
  }

})



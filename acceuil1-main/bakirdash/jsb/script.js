let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}



window.addEventListener('scroll',() =>{
    navbar.classList.remove('active')
});



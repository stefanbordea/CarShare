let darkModeToggle = document.querySelector('#darkModeToggle');

darkModeToggle.addEventListener('click', ()=> {
    document.body.classList.toggle('dark');
    if(document.body.classList.contains('dark')){ //when the body has the class 'dark' currently
        localStorage.setItem('dark', 'enabled'); //store this data if dark mode is on
    }else{
        localStorage.setItem('dark', 'disabled'); //store this data if dark mode is off
    }
})

if(localStorage.getItem('dark') == 'enabled'){
    document.body.classList.toggle('dark');
}


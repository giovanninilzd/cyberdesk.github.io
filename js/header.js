const button = document.querySelector("#check-menu")
    .addEventListener("click", ()=>{
        const menuMobile = document.querySelector("#menu-mobile");
        menuMobile.classList.toggle("active");

        const mobileList = document.querySelectorAll("#mobile-list");
        mobileList.style.display = 'block';

        
       
    });
let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

var swiper = new Swiper(".product-slider", {
    loop:true,
    spaceBetween: 20,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
});

// var swiper = new Swiper(".review-slider", {
//     loop:true,
//     spaceBetween: 20,
//     autoplay: {
//         delay: 7500,
//         disableOnInteraction: false,
//     },
//     centeredSlides: true,
//     breakpoints: {
//       0: {
//         slidesPerView: 1,
//       },
//       768: {
//         slidesPerView: 2,
//       },
//       1020: {
//         slidesPerView: 3,
//       },
//     },
// });

//cookie//////////////////////////////////////////////////////////
    const cookieBox = document.querySelector(".wrapper"),
    acceptBtn = cookieBox.querySelector("button");

    acceptBtn.onclick = ()=>{
      //setting cookie for 1 week, after one month it'll be expired automatically
      document.cookie = "CookieBy=NoUser; max-age="+3600*7*1;
      if(document.cookie){ //if cookie is set
        cookieBox.classList.add("hide"); //hide cookie box
      }else{ //if cookie not set then alert an error
        alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
      }
    }
    let checkCookie = document.cookie.indexOf("CookieBy=NoUser"); //checking our cookie
    //if cookie is set then hide the cookie box else show it
    checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");

//banner////////////////////////////////////////////////////////////////////////////////////////
let slideIndex = 0;showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
//banner////////////////////////////////////////////////////////////////////////////////////////

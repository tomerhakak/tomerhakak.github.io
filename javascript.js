const signupBtn =document.querySelector(".signupBtn");
const loginupBtn =document.querySelector(".loginupBtn");
const moveBtn =document.querySelector(".moveBtn");
const singup =document.querySelector(".singup");
const login =document.querySelector(".login");


loginupBtn.addEventListener("click",()=>{
    moveBtn.classList.add("rightBtn");
    login.classList.add("loginForm");
    singup.classList.remove("singupForm");
})

signupBtn.addEventListener("click",()=>{
    moveBtn.classList.remove("rightBtn");
    login.classList.remove("loginForm");
    singup.classList.add("singupForm");
})








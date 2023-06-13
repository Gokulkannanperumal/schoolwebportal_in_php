
let logincheck=document.getElementById('lcheck');
let signupcheck=document.getElementById('scheck');

let loginpassword=document.getElementById('lpass');
let signuppassword=document.getElementById('spass');
let nameerror=document.getElementById("uerror");
let passerror=document.getElementById("perror");
let eerror=document.getElementById("eerror");
let susername=document.getElementById("susername");
let loginform=document.getElementById('loginform');
let signupform=document.getElementById('signupform');
let email=document.getElementById("email");

logincheck.addEventListener('click',(e)=>{

    if(loginpassword.type=="password"){
        loginpassword.type='text'
    }else{
        loginpassword.type='password'
    }
});
signupcheck.addEventListener('click',(e)=>{

    if(signuppassword.type=="password"){
        signuppassword.type='text'
    }else{
        signuppassword.type='password'
    }
});

signupform.addEventListener('submit',(e)=>{
    console.log(susername.value.Length);
    if((susername.value.length)<5){
        nameerror.innerText="username must be more than 5char";
        e.preventDefault();
    }else if((signuppassword.value.length)<5){
        passerror.innerText="please enter strong password";
        e.preventDefault();
    }else if((email.value.length)<5){
        eerror.innerText="please enter valid email";
        e.preventDefault();
    }
    
})
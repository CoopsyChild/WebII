let captchaTest = document.querySelector('#captcha');
let userInput = document.querySelector('#capthcainput');
let result =  document.querySelector('#result');
let refresh = document.querySelector('#refresh');
let captchaBtn= document.querySelector('#captchabtn');
let username = document.querySelector('#username');
let password = document.querySelector('#password');
let email = document.querySelector('#email');
let file = document.querySelector('#profilepic');

let capthcaAbc = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 
'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 
's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
let capthcaTextArray =[];

for (let index = 0; index < 7; index++) {
    capthcaTextArray.push(capthcaAbc[Math.floor(Math.random()* capthcaAbc.length)]);
}
let capthcaText=capthcaTextArray.join('');

captchaTest.innerHTML=capthcaText;

captchaBtn.addEventListener('click', function() {
    if(capthcaText===userInput.value) {
        result.innerHTML="Jó válasz :)";
        document.getElementById("submitBtn").disabled = false;
    }
    else{
        result.innerHTML="Rossz válasz :(";
    }
});

//TODO: Refresh button!!!

let userInput = document.querySelector("#capthcainput");
let captchaBtn = document.querySelector("#captchabtn");
let captchaText = document.querySelector('#captcha');
var ctx = captchaText.getContext("2d");
ctx.font = "60px Oxygen";
ctx.fillStyle = "#1c1d1f";


let capthcaAbc = [
    "A",
    "B",
    "C",
    "D",
    "E",
    "F",
    "G",
    "H",
    "I",
    "J",
    "K",
    "L",
    "M",
    "N",
    "O",
    "P",
    "Q",
    "R",
    "S",
    "T",
    "U",
    "V",
    "W",
    "X",
    "Y",
    "Z",
    "a",
    "b",
    "c",
    "d",
    "e",
    "f",
    "g",
    "h",
    "i",
    "j",
    "k",
    "l",
    "m",
    "n",
    "o",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v",
    "w",
    "x",
    "y",
    "z",
    "0",
    "1",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
];
let capthcaTextArray = [];

for (let index = 0; index < 7; index++) {
    capthcaTextArray.push(
        capthcaAbc[Math.floor(Math.random() * capthcaAbc.length)]
    );
}
let capthcaTest = capthcaTextArray.join("");

ctx.fillText(capthcaTest, 0, captchaText.height / 1.5, captchaText.width);


captchaBtn.addEventListener("click", function() {
    if (capthcaTest === userInput.value) {
        document.getElementById("submitBtn").disabled = false;
    }
});

//TODO: Refresh button!!!
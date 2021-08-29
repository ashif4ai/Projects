//Accessing the Elements
let inputText = document.querySelector("#inputText");
let qrImage = document.querySelector("#qrImage");

//Method to generate QR

function generateQR(){
	let qrsize = "1000x1000";		
	let qrText = inputText.value;
	let result = `https://api.qrserver.com/v1/create-qr-code/?size=${qrsize}&data=${qrText}`;

	qrImage.src = result;
}


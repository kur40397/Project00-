const inputs = document.querySelectorAll(".input");
const inputsConf = document.querySelectorAll(".input2");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

inputsConf.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});





var inputPass2 = document.getElementById('pass'),
icon = document.getElementById('icon');

icon.onclick = function () {

 if(inputPass2.className == 'input') {
	inputPass2.setAttribute('type', 'text');
	icon.className = 'fa fa-eye';
    inputPass2.className = 'input7';

 } else {
	inputPass2.setAttribute('type', 'password');
	icon.className = 'fa fa-eye-slash';
   inputPass2.className = 'input';
}

}


var inputPassConf = document.getElementById('pass2'),
iconConf = document.getElementById('icon2');

iconConf.onclick = function () {

 if(inputPassConf.className == 'input2') {
	inputPassConf.setAttribute('type', 'text');
	iconConf.className = 'fa fa-eye';
	inputPassConf.className = 'input7';

 } else {
	inputPassConf.setAttribute('type', 'password');
	iconConf.className = 'fa fa-eye-slash';
	inputPassConf.className = 'input2';
}

}

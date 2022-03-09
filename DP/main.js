const inputs = document.querySelectorAll(".input");


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
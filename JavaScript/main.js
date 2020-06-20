const inputs = document.querySelectorAll(".input");
document.getElementById("formFocus").onmouseenter=function(){mouseEnter()};
document.getElementById("formFocus").onmouseleave=function(){mouseLeave()};




function mouseEnter(){
    document.getElementById("formFocus").style.boxShadow = "1px 1px 20px 1px #1b3685";
    document.getElementById("formFocus").style.transition = "all .7s";
}
function mouseLeave(){
    document.getElementById("formFocus").style.boxShadow = "1px 1px 5px 1px #1b3685";
}


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
document.getElementById("slides").onmouseenter=function(){mouseEnter()};
document.getElementById("slides").onmouseleave=function(){mouseLeave()};




function mouseEnter(){
    document.getElementById("slides").style.boxShadow = "1px 2px 9px 1px black";
    document.getElementById("slides").style.transition = "all 1.5s";
}
function mouseLeave(){
    document.getElementById("slides").style.boxShadow = "0px 0px 0px 0px #1b3685";
}

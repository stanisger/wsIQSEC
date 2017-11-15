$(document).foundation()

    

var nextId = 1;
var  inputContent = document.getElementById('inputContent');

function addLabel() {
    var input = document.createElement("input");
    var btn = document.getElementById('btn_curps');
    input.setAttribute("type", "text") ;
    input.setAttribute("placeholder", "Ingrese su CURP*");

    input.id = "curp" +'_' + nextId;
    input.name = "curp" +'_' + nextId;

    btn.onclick = addLabel;
    inputContent.appendChild(input);
    nextId += 1;
}

addLabel();
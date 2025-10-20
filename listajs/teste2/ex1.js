// Divs
let titulo = document.getElementById("titulo");
let valores = document.getElementById("valores");
let botaoDiv = document.getElementById("b");
let resultDiv = document.getElementById("resultado");


// Elementos internos
let num1 = document.getElementById("num1");
let select = document.getElementById("select");
let num2 = document.getElementById("num2");
let button = document.getElementById("button");

// Opções do select
let op1 = document.getElementById("op1");
let op2 = document.getElementById("op2");
let op3 = document.getElementById("op3");
let op4 = document.getElementById("op4");




button.addEventListener("click", function(){
 
  resultDiv.innerText = ""

  let int1 = parseInt(num1.value)
  let int2 = parseInt(num2.value)

  if(select.value=="+"){
    let soma = document.createElement("span")
    soma.textContent = int1+int2
    resultDiv.appendChild(soma)
  }

  else if(select.value=="-"){
    console.log(int1-int2)
  }

  else if(select.value=="/"){
    let result = document.createElement("span")
    result.textContent = int1/int2
    resultDiv.appendChild(result)
  }

  else{
    console.log(int1*int2)
  }
b

})
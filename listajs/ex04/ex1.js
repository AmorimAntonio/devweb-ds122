let botao = document.getElementById("botao");
let div = document.getElementById("minhaDiv")


botao.addEventListener("click",function(){

  let inputNome = document.getElementById("nome");

  // cria um container para cada item
  let item = document.createElement("div");

  // cria a checkbox
  let checkbox = document.createElement("input");
  checkbox.type = "checkbox";

  // cria o texto
  let texto = document.createElement("span");
  texto.textContent = inputNome.value;

  //remover
  let remover = document.createElement("button")
  remover.textContent = "remover"


  // monta o item
  item.appendChild(checkbox);
  item.appendChild(texto);
  item.appendChild(remover);

  // adiciona na div
  div.appendChild(item);

  // limpa o input
  inputNome.value = "";

  remover.addEventListener("click",function(){
    item.remove();
  })

  checkbox.addEventListener("click",function(){
    if (checkbox.checked){
        item.style.textDecoration = "line-through";
        item.style.color = "gray";
    }
    else{
        item.style.textDecoration = "none"
        item.style.color = "black"
    }
  })

    
})
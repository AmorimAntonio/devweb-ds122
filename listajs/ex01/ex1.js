let botao = document.getElementById("botao");

botao.addEventListener("click",function(){
    let inputNome = document.getElementById("nome");
    
    if (inputNome.value != ""){
        alert("Olá, " + inputNome.value + "! Bem-vindo(a)");
    }

    else{
        alert("Preencha o nome!!!")
    }
})
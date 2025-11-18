// validacao.js

function submitForm(event){
    let nome = document.getElementById("nome-livro").value;
    let autor = document.getElementById("autor-livro").value;
    let quantidade = document.getElementById("quantidade-livro").value;

    // 1. Validação de campos vazios (inclui quantidade vazia)
    if (nome === "" || autor === "" || quantidade === ""){
        alert("Todos os campos de Nome e Autor são obrigatórios.");
        event.preventDefault(); // Interrompe o envio do formulário
        return false; 
    }
    
    // 2. Validação de quantidade (deve ser maior ou igual a zero e um número)
    // O navegador já ajuda com type="number", mas validamos aqui:
    let numQuantidade = parseInt(quantidade);

    if (isNaN(numQuantidade) || numQuantidade < 0){
        alert("A quantidade deve ser um número inteiro positivo ou zero.");
        event.preventDefault(); // Interrompe o envio do formulário
        return false;
    }

    // Se tudo estiver OK, o formulário é enviado (retorna true implicitamente)
    return true;
}
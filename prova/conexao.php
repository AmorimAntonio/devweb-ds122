<?php
session_start();
require 'db_credentials.php';

$conn = mysqli_connect($servername, $username, $db_password, $dbname);

// Verifica o método da requisição (POST para INSERT e UPDATE)
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    // 1. Lógica de INSERT (CREATE)
    if (!isset($_POST['acao']) || $_POST['acao'] == 'insert'){
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $autor = mysqli_real_escape_string($conn, $_POST['autor']);
        $quantidade = (int) $_POST['quantidade']; // Convertido para INT

        $sql = "INSERT INTO livros (titulo, autor, quantidade)
                VALUES ('$nome', '$autor', $quantidade)";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['mensagem'] = "Livro salvo com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao salvar livro: " . mysqli_error($conn);
        }
    } 
    
    // 2. Lógica de UPDATE
    elseif (isset($_POST['acao']) && $_POST['acao'] == 'update') {
        $id = (int) $_POST['id'];
        $nova_quantidade = (int) $_POST['nova_quantidade'];
        
        // Proteção adicional para garantir que a quantidade não seja negativa
        if ($nova_quantidade < 0) {
             $_SESSION['mensagem'] = "A quantidade não pode ser negativa.";
        } else {
             $sql = "UPDATE livros SET quantidade = $nova_quantidade WHERE id = $id";
             if (mysqli_query($conn, $sql)) {
                 $_SESSION['mensagem'] = "Estoque atualizado com sucesso!";
             } else {
                 $_SESSION['mensagem'] = "Erro ao atualizar estoque: " . mysqli_error($conn);
             }
        }
    }
    
    header("Location: index.php");
    exit;
}


// Verifica o método da requisição (GET para DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['acao']) && $_GET['acao'] == 'delete'){
    $Id = (int) ($_GET['id']);

    $sql = "DELETE FROM livros 
            WHERE id = $Id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['mensagem'] = "Livro removido com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao remover livro: " . mysqli_error($conn);
    }

    header("Location: index.php");
    exit;

}

// Se a página for acessada via GET sem ação (ignorar)
// Se não houver lógica, o script simplesmente termina aqui e a página index.php carrega
?>
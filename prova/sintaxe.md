# Comandos/sintaxes

## 1. Executando uma query DDL:

```php
<?php
session_start();
require 'db_credentials.php';

$conn = mysqli_connect($servername, $username, $db_password, $dbname);

$nome = $_POST['nome'];
$autor = $_POST['autor'];
$quantidade = $_POST['quantidade'];

$sql = "INSERT INTO livros (titulo, autor, quantidade)
        VALUES ('$nome', '$autor', '$quantidade')";

if (mysqli_query($conn, $sql)) {
    echo "Livro salvo";
} else {
    echo "Erro ao salvar livro" . mysqli_error($conn);
}

header("Location: index.php");
exit;

?>
```

## 2. Criando um formulário de submissão:

No arquivo .php, crie a seguinte estrutura:

```html
    <div id="cadastro-livro">
        <h2>Cadastre um novo livro</h2>
        <form action="processamento.php" method="post">
            <label>Nome do livro:</label><br>
            <input type="text" name="nome" required><br><br>

            <label>Nome do autor:</label><br>
            <input type="text" name="autor" required><br><br>

            <label>Quantidade:</label><br>
            <input type="int" name="quantidade" required><br><br>

            <button type="submit">Enviar</button>
        </form>
    </div>
```


## Referenciando no html/php

Para referenciar um arquivo js ou css basta inserir
```html
<script src="validacao.js"></script>
<link rel="stylesheet" href="css/style.css">
```
Antes de fechar o body e antes de fechar o head, respectivamente.


## Criando uma tabela/pegando o resultado de um select 
```php
    <div id="livros-cadastrados">
        <h2 id="titulo 2">Livros cadastrados:</h2>
        <table id="tabela">
            <tr id="cabecalho">
                <th>Nome</th>
                <th>Autor</th>
                <th>Quantidade</th>
            </tr>

            <?php 
            session_start();
            require 'db_credentials.php';
            $conn = mysqli_connect($servername, $username, $db_password, $dbname);

            $sql = "SELECT titulo, autor, quantidade FROM livros";

            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)): ?>
                <tr class="rank-row">
                    <td class="rank-cell"><?= htmlspecialchars($row['titulo']) ?></td>
                    <td class="rank-cell"><?= htmlspecialchars($row['autor']) ?></td>
                    <td class="rank-cell"><?= htmlspecialchars($row['quantidade']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

```
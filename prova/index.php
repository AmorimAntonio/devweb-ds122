<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova 2</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1 id="titulo" style="color:yellow; text-align:center">Sistema de gerenciamento de livros</h1>
    
    <div id="cadastro-livro">
        <h2>Cadastre um novo livro</h2>
        <form action="conexao.php" method="post">
            <label>Nome do livro:</label><br>
            <input type="text" name="nome" id="nome-livro" required><br><br>

            <label>Nome do autor:</label><br>
            <input type="text" name="autor" id="autor-livro"required><br><br>

            <label>Quantidade:</label><br>
            <input type="number" name="quantidade" id="quantidade-livro" required><br><br>

            <button type="submit" onclick="return submitForm(event)">Enviar</button>
        </form>
    </div>

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

            $sql = "SELECT id, titulo, autor, quantidade FROM livros";

            $result = mysqli_query($conn, $sql);
            
            while($row = mysqli_fetch_assoc($result)): ?>
                <tr class="rank-row">
                    <td class="rank-cell"><?= htmlspecialchars($row['titulo']) ?></td>
                    <td class="rank-cell"><?= htmlspecialchars($row['autor']) ?></td>
                    <td class="rank-cell"><?= htmlspecialchars($row['quantidade']) ?></td>
                    <td>
                        <form action="conexao.php" method="POST" style="display:inline;">
                            <input type="hidden" name="acao" value="update">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="number" name="nova_quantidade" value="<?= $row['quantidade'] ?>" min="0" style="width: 60px;">
                            <button type="submit">Atualizar</button>
                        </form>
                    </td>
                    <td>
                        <a href="conexao.php?acao=delete&id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja remover este livro?')">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>


    <script src="validacao.js"></script>
</body>
</html>
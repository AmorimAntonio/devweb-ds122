<?php

  require('sanitize.php');
  require('credentials.php');

  $conn = mysqli_connect("$servername","$username","$password","$dbname");

  if(!$conn){
    die("Erro ao conectar no BD:". mysqli_connect_error());
  }


  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = sanitize($_POST["form_name"]);
    $comment = sanitize($_POST["form_comment"]);

    $sql = "INSERT INTO Comments (name, comment) 
            VALUES ('" .$name. "','" .$comment. "');";

    if(!mysqli_query($conn,$sql)){
      die("Erro ao criar comentário". mysqli_error($conn));
    }
  }


  if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["acao"])){
      if($_GET["acao"] == "remover"){
        $sql = "DELETE FROM Comments WHERE id = ".$_GET["id"].";";
        if(!mysqli_query($conn,$sql)){
        die("Erro ao criar comentário". mysqli_error($conn));
      }
      }
    }
  }

  $sql = "SELECT * FROM Comments";
  $comments = mysqli_query($conn,$sql);
  if(!$comments){
    die("Erro ao criar comentário". mysqli_error($conn));
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Artigo</title>
  </head>
  <body>
    <h1>Título do artigo</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nulla est, dapibus vitae augue a, euismod pretium quam. Integer quis libero eget orci vestibulum facilisis. Praesent placerat arcu sapien, vel laoreet eros sodales iaculis. Duis ultricies pulvinar sollicitudin. Morbi laoreet, dui eu placerat volutpat, dui lectus porttitor lacus, non commodo ligula enim a nibh. Sed aliquet porta augue sed laoreet. Fusce nec erat est. Nullam mattis quis ipsum in rhoncus. Etiam a tellus elit. In dui orci, interdum in dui ut, accumsan tristique velit. Aenean consectetur arcu id risus rutrum, non eleifend massa vehicula. Suspendisse potenti. Donec dapibus ut est consectetur luctus. Etiam convallis, tellus at scelerisque convallis, nunc felis semper metus, sit amet luctus sapien metus non erat. Sed elementum tellus maximus purus placerat, sit amet scelerisque nibh scelerisque.
    </p>

    <p>
      Donec imperdiet blandit urna nec malesuada. Aenean at placerat purus, non pellentesque mi. Nunc feugiat consequat est mollis sollicitudin. Phasellus eget libero pulvinar, dignissim orci maximus, iaculis ipsum. Nunc at neque a ex tempor lacinia sit amet eu odio. Suspendisse imperdiet nisl purus, eu pulvinar massa tempor porta. Cras suscipit nibh magna, vel efficitur felis luctus ac. Suspendisse ultricies, erat et molestie pellentesque, tellus urna interdum velit, rutrum convallis ex elit sit amet ipsum. Nulla accumsan vitae velit at convallis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum vitae diam odio. Donec euismod velit vel mattis tristique. Etiam pretium dignissim iaculis.
    </p>

    <p>
      Maecenas hendrerit sagittis dapibus. Vestibulum lobortis varius consequat. Morbi dignissim ultricies eros. Vivamus eu purus a lacus porta malesuada vitae sed orci. Aenean ac velit in nibh commodo blandit vitae id est. Sed vestibulum mi at nisl faucibus venenatis. Curabitur hendrerit volutpat velit ac convallis. Integer interdum faucibus orci, eu laoreet nulla tempor sit amet. Praesent pellentesque, leo sit amet rutrum tristique, dolor tellus auctor purus, nec rutrum metus lorem ut risus. Suspendisse eget ipsum ligula. Nam rutrum lacinia sapien vel porttitor. Suspendisse dapibus mauris eget purus semper porttitor. Vivamus maximus condimentum aliquam.
    </p>

    <hr>
    <div class="comments">
      <h2>Comentários</h2>

      <?php if (mysqli_num_rows($comments)>0): ?>

        <?php while($comment = mysqli_fetch_assoc($comments)): ?>

          <div class="comment" id="comment_<?php echo $comment['id']?>">
            <h4>De: <?php echo $comment['name']?></h4>
            <p><?php echo $comment['comment']?></p>
            <a onclick="return(confirm('Tem certeza?'));" href="article.php?acao=remover&id=<?php echo $comment['id']?>">Remover</a>
        <?php endwhile; ?>

      <?php else: ?>
        <p>Nenhum comentario cadastrado. :(</p>

      <?php endif; ?>

      <hr>
      <h3>Novo comentário</h3>
      <form action="article.php" method="post">
        Nome:<br>
        <input type="text" name="form_name" value="" placeholder="Seu nome"><br>
        Comentário:<br>
        <textarea name="form_comment" rows="8" cols="80" placeholder="Seu comentário"></textarea><br>
        <input type="submit" name="submit" value="Enviar">
      </form>
    </div>
  </body>
</html>

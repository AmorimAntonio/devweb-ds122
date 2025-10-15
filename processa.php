<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        n1: <input type="text" name="n1"><br />
        <input type="submit" value="Enviar">
    </form>


    <?php
        echo $_POST['n1']?>
    ?>

    </p>
</body>
</html>
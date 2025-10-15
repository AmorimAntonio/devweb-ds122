<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
}
else{
    $n1 = $n2 = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        n1: <input type="number" name="n1" value="<?php echo "n1"?>"><br />
        n2: <input type="number" name="n2" value="<?php echo "n2"?>"><br />

        <select name="op" id="op">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="/" selected>/</option>
            <option value="*" selected>*</option>
        </select>

        <input type="submit" value="Enviar">
    </form>    


    <p>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $x = $_POST["n1"];
            $y = $_POST["n2"];
            $op = $_POST["op"];
            if (empty($x)|| empty($y)) {
                echo "Não pode estar vazio";}
            else{

                if ($op == "+") {echo $x + $y;}
                else if ($op == "-") {echo $y - $y;}
                else if ($op == "*") {echo $y * $y;}
                else if ($op == "/" && $y != 0) {echo $y / $y;}
                else{echo "O divisor não pode ser 0";}

            }}
        ?>

    </p>

</body>
</html>

<?php
    //Verificando se foi enviado via post o email
    if( isset($_POST['email']) ) {
        $email = $_POST['email']; //Caso sim, salvamos este email na variável $email
    } else {
        $email = null; //Caso não, deixamos a variável $email como null
    }

    if( isset($_POST['pass']) ) {
        $pass = $_POST['pass'];
    } else {
        $pass = null;
    }

    //Se as variáveis $email e $pass forem diferentes de null, então será
    //realizada a verificação de email e senha
    if($email != null && $pass != null) {
        if($email == 'paulo@ig.net' && $pass == '4321') {
            $result = "Seja bem vindo!";
            $redirect =
            "<meta http-equiv='refresh' content='2; url=https://www.youtube.com'/>";
        } else {
            $result = "Acesso negado!";
            $redirect =
            "<meta http-equiv='refresh' content='2; url=../index.php' />";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Captura de dados</title>
    </head>
    <body>
        <h1><?= (isset($result) ? $result : "Visitante") ?></h1>
            <?= (isset($redirect) ? $redirect : "<hr>") ?>

        <form method="get" action="pedido.php">
            <input type="checkbox" name="ingrediente[]" value="Pão"/>Pão<br>
            <input type="checkbox" name="ingrediente[]" value="Queijo"/>Queijo<br>
            <input type="checkbox" name="ingrediente[]" value="Presunto"/>Presunto<br>
            <input type="checkbox" name="ingrediente[]" value="Maionese"/>Maionese<br>
            <input type="checkbox" name="ingrediente[]" value="Tomate"/>Tomate<br>
            <input type="checkbox" name="ingrediente[]" value="Milho"/>Milho<br>
            <input type="checkbox" name="ingrediente[]" value="Ervilha"/>Ervilha<br>
            <br>
            <input type="submit" value="Enviar" />
            <input type="reset" value="Apagar" />
        </form>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Captura de dados</title>
    </head>
    <body>
        <h1><?php echo $result ?></h1>
            <?= $redirect ?>
    </body>
</html>


<?php
    use Database\Database;
    
    if( isset($_POST['email']) ) {
        $email = $_POST['email'];
    } else {
        $email = null;
    }

    if( isset($_POST['pass']) ) {
        $pass = $_POST['pass'];
    } else {
        $pass = null;
    }

/////////////////////////////////////////////////////////////

require_once "../src/model/Database.php";
$db = new Database();

$resultDb = $db->select(
    "SELECT * FROM usuarios WHERE email = '$email'; "
);

if( isset($resultDb[0]) ) {
    $emailDb = $resultDb[0]->email;
    $senhaDb = $resultDb[0]->senha;
} else {
    $emailDb = null;
    $senhaDb = null;
}



////////////////////////////////////////////////////////////
    if($email != null && $pass != null) {
        if($email == $emailDb && $pass == $senhaDb) {
            $msg = 'Bem vindo!';
            $redirect = "<meta http-equiv='refresh' content='3; url=https://qi.edu.br' />";
        } else {
            $msg = 'Acesso negado!';
            //$redirect = "<meta http-equiv='refresh' content='3; url=../index.php' />";
        }
    }

require_once "../src/views/header_nav.php";
?>
    <div class="container mt-3">

        <div class="text-center">
            <h1><?= (isset($msg) ? $msg : "Visitante") ?></h1>
            <?= (isset($redirect) ? $redirect : "<hr>") ?>
        </div>

        <form method="post" action="lib/MarceloEEnzo/Socket/chat.php">
            <div class="form-group">
                <div class="form-control">
                    Tem algum animal de estimação?
                    <input type="text" class="form-control" name="ingredientes[]" value="" placeholder="digite sua resposta aqui"/><br>
                    Qual seu gosto musical / musica favorita?
                    <input type="text" class="form-control" name="ingredientes[]" value="" placeholder="digite sua resposta aqui"/><br>
                    Gosta de cinema, se sim qual seu filme preferido?
                    <input type="text" class="form-control" name="ingredientes[]" value="" placeholder="digite sua resposta aqui"/><br>
                    Costuma fazer oq no seu tempo livre?
                    <input type="text" class="form-control" name="ingredientes[]" value="" placeholder="digite sua resposta aqui"/><br>
                    Você gosta de esportes, se sim qual?
                    <input type="text" class="form-control" name="ingredientes[]" value="" placeholder="digite sua resposta aqui"/><br>
                    
                </div>
                 
                <hr>
                Em qual região você mora?
                <div class="row">
                    <div class="col-lg-3 col-sm-4">
                        <select name="entrega" class="form-select" required>
                            <option value="">Sul</option>
                            <option value="Viamão">Norte</option>
                            <option value="Gravataí">Leste</option>
                            <option value="Alvorada">Oeste</option>
                            <option value="Canoas">Nordeste</option>
                            <option value="Porto Alegre">Sudeste</option>
                        </select>
                    </div>
                </div>

                <br><br>

                <div class="row">
                    <input type="submit" class="col-lg-4 offset-lg-2 col-sm-5 offset-sm-1 btn btn-dark" value="Confirmar"/>
                    &nbsp;
                    <input type="reset" class="col-lg-4 col-sm-5 btn btn-danger" value="Reiniciar"/>
                </div>

            </div>
        </form>

    </div>

<?php require_once "../src/views/footer.php"; ?>
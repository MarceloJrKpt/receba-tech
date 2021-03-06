<?php

use Database\Database;

require_once "../src/views/header_nav.php";

if( isset($_GET['cod']) ){
    $cod = $_GET['cod'];
} else {
    header('location: ../public/lista.php');
}

require_once "../src/model/Database.php";
$db = new Database();

$resultDb = $db->select(
    "SELECT * FROM pedidos WHERE cod = $cod; "

);

//var_dump($resultDb);
?>

<form method="post" action="../data/save.php">
    <div class="container">
        <h3>Atualização de dados</h3>

        <h5>Codigo</h5>
        <input type="text" name="cod" value="<?= $resultDb[0]->cod ?>" reandonly />
    
        <h5>Data hora</h5>
        <input type="text" name="DataHora" value="<?= $resultDb[0]->data_hora ?>" reandonly />

        <h5>Ingredientes</h5>
        <input type="text" name="ingredientes" value="<?= $resultDb[0]->ingredientes ?>" reandonly />

        <h5>Quantidade</h5>
        <input type="number" name="qtde" value="<?= $resultDb[0]->qtde ?>" min="1" />
        <h5>Pagamento</h5>
                <div class="d-flex">
                    <div class="form-check col">
                        <input type="radio" class="form-check-input" name="pgto" value="Dinheiro" <?= ($resultDb[0]->pgto == "Dinheiro") ? "checked" : "" ?>/> Dinheiro
                    </div>
                    <div class="form-check col">
                        <input type="radio" class="form-check-input" name="pgto" value="Pix" <?= ($resultDb[0]->pgto == "Pix") ? "checked" : "" ?>/> Pix
                    </div>
                    <div class="form-check col">
                        <input type="radio" class="form-check-input" name="pgto" value="Cartão" <?= ($resultDb[0]->pgto == "Cartão") ? "checked" : "" ?> checked/> Cartão
                    </div>
                </div>
                
                <h5>Entrega</h5>
                <div class="row">
                    <div class="col-lg-3 col-sm-4">
                        <select name="entrega" class="form-select" required>
                            <option value=" <?= $resultDb[0]->entrega ?> "> <?= $resultDb[0]->entrega ?></option>
                            <option value="Viamão">Viamão</option>
                            <option value="Gravataí">Gravataí</option>
                            <option value="Alvorada">Alvorada</option>
                            <option value="Canoas">Canoas</option>
                            <option value="Porto Alegre">Porto Alegre</option>
                        </select>
                    </div>
                </div>
                
                <br>
                
                <input type="submit" value="Atualizar pedido"class="btn btn-primary"/>
                <input type="Reset" value="Reiniciar"class="btn btn-secondary"/>
            </div>    

</form>

<?php require_once "../src/views/footer.php"; ?>
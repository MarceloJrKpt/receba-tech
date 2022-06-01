<?php

if( isset($_GET['cod'])) {
    $cod = $_GET['cod'];
} else {
    header('location: ../public/lista.php');
}

require_once "../src/model/Database.php";
$db = new Database();

$db->delete(
    "DELETE FROM pedidos WHERE cod = $cod; "
);

if($resultDb) : ?>
    <script>
        alert("Pedido excluido com sucesso, parabens seu pussy boy 😸😸!");
        window.location.replace("../public/lista.php");
    </script>
<?php  else :
    //false
    echo "Erro na exclusão";
endif;
?>
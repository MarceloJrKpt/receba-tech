<?php

use Database\Database;

require_once "../src/views/header_nav.php"; ?>

<?php
    require_once "../src/model/Database.php";
    $db = new Database();

    $resultDb = $db->select(
        "SELECT * FROM pedidos;"
    );

    //var_dump($resultDb);
?>

<table class="table table-striped container mt-4"> 
    <thead class="bg-dark text-white">
        <th>Código</th>
        <th>Data e hora</th>
        <th>ingredientes</th>
        <th>Quantidade</th>
        <th>Pagamento</th>
        <th>Entrega</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach($resultDb as $linha) : ?>

                <tr>
                    <td> <?= $linha->cod ?> </td>
                    <td> <?= $linha->data_hora ?> </td>
                    <td> <?= $linha->ingredientes ?> </td>
                    <td> <?= $linha->qtde ?> </td>
                    <td> <?= $linha->pgto ?> </td>
                    <td> <?= $linha->entrega ?> </td>
                <td>
                    <a href="../public/atualiza.php?cod=<?= $linha->cod ?>">Editar</a>
                    <i class="bi bi-pencil-fill"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
                    </i>
                </td>
                <td>
                    <a onclick="confirmaDelete()">Apagar</a>
                </td>
                <a onclick="confirmaDelete( <?= $linha->cod ?>);">
                
                </a>
                

            </tr>

            <?php endforeach; ?>
    </tbody>
</table>

<script>
   fuction confirmaDelete(id){
       if( confirm("Deseja apagar o pedido "+id+"?")) {
           window.laction.href="../data/delete.php?" +id
       } else {
           alert("Exclusão cancelada!");
       }
   }
    
</script>

<?php require_once "../src/views/footer.php"; ?>
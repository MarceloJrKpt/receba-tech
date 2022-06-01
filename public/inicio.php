<?php require_once "../src/views/header.php"; ?>
    
    <div class="login-center">
    <img src="..\chat_ratchet_php_js-master\assets\imgs\logo.jpeg" alt="Logo" height="200px">    
    <h1><-[Login]-></h1>
        
        <form method="post" action="recebe.php" > 
            <div class="form-control">
                <div class="row">
                    <div class="col-10 offset-1">
                        <input type="email" class="form-control" name="email" placeholder="digite seu email aqui" required/>
                        <br>
                        <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required/>
                        <br><br>
                        <input type="submit" class="btn btn-success" value="enviar dados"/>&nbsp &nbsp
                        <input type="reset" class="btn btn-warning" value="Apagar dados"/>
                        <br>
                        <a href="recebe.php">Entrar como visitante</a>
                    </div>
                </div>
            </div>
        </form>

<?php require_once "../src/views/footer.php"; ?>
<html lang="en">
    <body>
        <div style="padding-left:16px">
            <h2>Cadastrar ou Alterar uma Empresa</h2>
            <p>Razão Social, CNPJ e Telefone são obrigatórios!</p>
        </div>

        <?php 
            $id  = isset($_GET['id']) ? $_GET['id'] : '';
            
            $result = '';
            $row    = '';
            
            $nome     = '';
            $cnpj     = '';
            $telefone = '';
            $email    = '';
            $endereco = '';
            
            if(!empty($id)) {
                $sql    = "SELECT * FROM empresa WHERE id = $id";
                $result = $conn->query($sql);
                $row    = $result->fetch_assoc();
                $nome     = $row['nome'];
                $cnpj     = $row['cnpj'];
                $telefone = $row['telefone'];
                $email    = $row['email'];
                $endereco = $row['endereco'];
            }
        ?>
        
        <form action="formCorporation.php" method="POST" class="ui form">
            <div class="field form-outline">
                <input type="hidden" name="corporationId" id="corporationId" class="form-control" value="<?php echo $id; ?>"/>
            </div>
            <div class="field form-outline">
                <label class="form-label" for="corporationName">Razão Social:</label>
                <input type="text" name="corporationName" id="corporationName" class="form-control" placeholder="Razão social" value="<?php echo $nome; ?>" required/>
            </div>
            <br>
            <div class="field form-outline">
                <label class="form-label" for="corporationCNPJ">CNPJ:</label>
                <input type="text" name="corporationCNPJ" id="corporationCNPJ" class="form-control" placeholder="##.###.###/####-##" mask="99.999.999/9999-99" value="<?php echo $cnpj; ?>" required/>
            </div>
            <br>
            <div class="field form-outline">
                <label class="form-label" for="corporationPhone">Telefone:</label>
                <input type="tel" name="corporationPhone" id="corporationPhone" class="form-control" placeholder="Número de Telefone" mask="(00) 0 0000-0000" value="<?php echo $telefone; ?>" required/>
            </div>
            <br>
            <div class="field form-outline">
                <label class="form-label" for="corporationEmail">E-mail:</label>
                <input type="email" name="corporationEmail" id="corporationEmail" class="form-control" placeholder="example@gmail.com" value="<?php echo $email; ?>"/>
            </div>
            <br>
            <div class="field form-outline">
                <label class="form-label" for="corporationAddress">Endereço:</label>
                <input type="text" name="corporationAddress" id="corporationAddress" class="form-control" placeholder="Endereço" value="<?php echo $endereco; ?>"/>
            </div>
            <br>
            <button type="ui button submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </body>
</html>
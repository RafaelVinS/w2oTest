<html lang="en">
    <body>
        <div style="padding-left:16px">
            <h2>Cadastrar ou Alterar um Colaborador</h2>
            <p>Nome, Telefone e E-mail são obrigatórios!</p>
        </div>

        <?php 
            $id         = isset($_GET['id']) ? $_GET['id'] : '';
            $empresa_id = isset($_GET['empresa_id']) ? $_GET['empresa_id'] : '';

            $result = '';
            $row    = '';

            $nome     = '';
            $telefone = '';
            $email    = '';
            $data     = '';

            if(!empty($id)) {
                $sql      = "SELECT * FROM colaborador WHERE id = $id AND empresa_id = $empresa_id";
                $result   = $conn->query($sql);
                $row      = $result->fetch_assoc();
                $nome     = $row['nome'];
                $telefone = $row['telefone'];
                $email    = $row['email'];
                $data     = $row['data_nascimento'];
            }
        ?>

        <form action="formAssociate.php" method="POST" class="ui form">
            <div class="field form-outline">
                <input type="hidden" name="associateId" id="associateId" class="form-control" value="<?php echo $id; ?>"/>
            </div>
            <div class="field form-outline">
                <label class="form-label" for="associateName">Nome completo:</label>
                <input type="text" name="associateName" id="associateName" class="form-control" placeholder="Nome completo" maxlength="50" value="<?php echo $nome; ?>" required/>
            </div>
            <br>
            <div class="field form-outline">
                <label class="form-label" for="associatePhone">Telefone:</label>
                <input type="tel" name="associatePhone" id="associatePhone" class="form-control" placeholder="Número de Telefone" mask="(00) 0 0000-0000" maxlength="20" value="<?php echo $telefone; ?>" required/>
            </div>
            <br>
            <div class="field form-outline">
                <label class="form-label" for="associateEmail">E-mail:</label>
                <input type="email" name="associateEmail" id="associateEmail" class="form-control" placeholder="example@gmail.com" maxlength="50" value="<?php echo $email; ?>" required/>
            </div>
            <br>
            <div class="field form-outline">
                <label class="form-label" for="associateBirthday">Data de nascimento:</label>
                <input type="date" name="associateBirthday" id="associateBirthday" class="form-control" value="<?php echo $data; ?>" placeholder="Data de nascimento"/>
            </div>
            <br>
            <div class="field form-outline">
                <input type="hidden" name="associateCorporationId" id="associateCorporationId" class="form-control" value="<?php echo $empresa_id; ?>"/>
            </div>
            <!-- <div class="field form-outline">
                <label class="form-label" for="associateCorporationId">Id da Empresa:</label>
                <input type="date" name="associateCorporationId" id="associateCorporationId" class="form-control" maxlength="10" placeholder="Data de nascimento"/>
            </div>
            <br> -->
            <button type="ui button submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </body>
</html>
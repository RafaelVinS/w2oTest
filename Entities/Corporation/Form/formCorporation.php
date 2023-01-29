<?php
    $titleOfPage = 'Cadastrar Empresa';
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once($root . "/w2oTest/include.php");
    include_once($root . "/w2oTest/Entities/Corporation/Form/formBodyCorporation.php");
    include_once($root . "/w2oTest/footer.php");

    $corporationId      = filter_input(INPUT_POST, 'corporationId', FILTER_SANITIZE_STRING);
    $corporationName    = filter_input(INPUT_POST, 'corporationName', FILTER_SANITIZE_STRING);
    $corporationCNPJ    = filter_input(INPUT_POST, 'corporationCNPJ', FILTER_SANITIZE_STRING);
    $corporationPhone   = filter_input(INPUT_POST, 'corporationPhone', FILTER_SANITIZE_STRING);
    $corporationEmail   = filter_input(INPUT_POST, 'corporationEmail', FILTER_SANITIZE_EMAIL);
    $corporationAddress = filter_input(INPUT_POST, 'corporationAddress', FILTER_SANITIZE_STRING);

    // cep, logradouro + complemento, Bairro/Distrito, localidade + uf
    // Localdidade/Uf: X, Bairro/Distrito: X, logradouro/complemento: 

    $validateCNPJ = validar_cnpj($corporationCNPJ);

    if (empty($corporationName))  die("O Nome é obrigatório!");
    if (empty($corporationCNPJ))  die("O CNPJ é obrigatório!");
    if (empty($corporationPhone)) die("O Telefone é obrigatório!");

    if (!$validateCNPJ) die("O CNPJ não é válido!");

    if (!preg_match("/^[a-zA-Z-' ]*$/", $corporationName)) die("So letras e espaço branco são válidos!");

    if (!filter_var($corporationEmail, FILTER_VALIDATE_EMAIL)) die("E-mail não é válido!");

    if (empty($corporationId)) {
        echo $corporationId;
        print_r($corporationId);
        var_dump($corporationId);
        die($corporationId);
        $sql = "INSERT INTO empresa (nome, cnpj, telefone, email, endereco) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) die(mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "sssss",
                            $corporationName,
                            $corporationCNPJ,
                            $corporationPhone,
                            $corporationEmail,
                            $corporationAddress);
    }

    if (!empty($corporationId)) {
        $sql = "UPDATE empresa
                   SET nome     = ?,
                       cnpj     = ?,
                       telefone = ?,
                       email    = ?,
                       endereco = ?
                 WHERE id IN (?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) die(mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "sssssi",
                            $corporationName,
                            $corporationCNPJ,
                            $corporationPhone,
                            $corporationEmail,
                            $corporationAddress,
                            $corporationId);
    }

    mysqli_stmt_execute($stmt);

    echo "Sucesso";

    $conn->close();
?>
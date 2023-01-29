<?php
    $titleOfPage = 'Cadastrar Colaborador';
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once($root . "/w2oTest/include.php");
    include_once($root . "/w2oTest/Entities/Associate/Form/formBodyAssociate.php");
    include_once($root . "/w2oTest/footer.php");

    $associateId            = filter_input(INPUT_POST, 'associateId', FILTER_SANITIZE_STRING);
    $associateName          = filter_input(INPUT_POST, 'associateName', FILTER_SANITIZE_STRING);
    $associatePhone         = filter_input(INPUT_POST, 'associatePhone', FILTER_SANITIZE_STRING);
    $associateEmail         = filter_input(INPUT_POST, 'associateEmail', FILTER_SANITIZE_EMAIL);
    $associateBirthday      = filter_input(INPUT_POST, 'associateBirthday', FILTER_SANITIZE_STRING);
    $associateCorporationId = filter_input(INPUT_POST, 'associateCorporationId', FILTER_VALIDATE_INT);

    $associateBirthday = date("Y-m-d", strtotime($associateBirthday));

    if (empty($associateName))  die("O Nome é obrigatório!");
    if ($associateName == trim($associateName) && strpos($associateName, ' ') == false) die("Deve incluir o nome inteiro!");
    
    if (empty($associatePhone)) die("O Telefone é obrigatório!");
    if (empty($associateEmail)) die("O E-mail é obrigatório!");

    if (!filter_var($associateEmail, FILTER_VALIDATE_EMAIL)) die("E-mail não é válido!");

    if(empty($associateId)) {
        $sql = "INSERT INTO colaborador (nome, telefone, email, data_nascimento, empresa_id)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) die(mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "ssssi",
                            $associateName,
                            $associatePhone,
                            $associateEmail,
                            $associateBirthday,
                            $associateCorporationId);
    }

    if (!empty($associateId) && !empty($associateCorporationId)) {
        $sql = "UPDATE colaborador
                   SET nome     = ?,
                       telefone = ?,
                       email    = ?,
                       data_nascimento = ?
                 WHERE id IN (?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) die(mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "ssssi",
                            $associateName,
                            $associatePhone,
                            $associateEmail,
                            $associateBirthday,
                            $associateId);
    }

    mysqli_stmt_execute($stmt);

    echo "Sucesso";

    $conn->close();
?>

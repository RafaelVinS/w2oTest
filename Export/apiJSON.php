<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once($root . "/w2oTest/db.php");

    ///w2oTest/Export/apiJSON.php?Id=1&mes=7

    $filter = '';
    $id     = isset($_GET['Id'])  ? $_GET['Id']  : '';
    $mes    = isset($_GET['mes']) ? $_GET['mes'] : '';

    if(!empty($id))  $filter .= " AND c.empresa_id = $id ";
    if(!empty($mes)) $filter .= " AND MONTH(data_nascimento) = $mes ";
    
    $sql    = "SELECT c.nome, c.telefone, c.data_nascimento FROM colaborador c WHERE 1 = 1 $filter";
    $result = $conn->query($sql);

    $result = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    
    header('Content-type: application/json');
    echo json_encode($result);

    $conn->close();
?>
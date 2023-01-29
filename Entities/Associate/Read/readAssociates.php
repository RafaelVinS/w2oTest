<?php
    $titleOfPage = 'Colaboradores';
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once($root . "/w2oTest/include.php");
    include_once($root . "/w2oTest/Entities/Associate/Read/readBodyAssociate.php");
    include_once($root . "/w2oTest/footer.php");

    header('Location: http://www.example.com/');
    exit;
?>
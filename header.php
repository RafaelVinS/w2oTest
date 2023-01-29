<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <link 
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
            crossorigin="anonymous">
        
        <title>
            <?= isset($titleOfPage) ? $titleOfPage : "W20 - Test"?>
        </title>
    </head>
    <body>
        <div class="topnav">
            <a href="../../../Entities/Corporation/Read/readCorporations.php">Empresas</a>
            <a href="../../../Entities/Corporation/Form/formCorporation.php">Cadastrar Empresa</a>
            <!-- <a href="../../../Entities/Associate/Read/readAssociates.php">Colaboradores</a>
            <a href="../../../Entities/Associate/Form/formAssociate.php">Cadastrar Colaborador</a> -->
        </div>
    </body>
</html>
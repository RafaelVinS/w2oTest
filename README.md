<!-- 
    CREATE DATABASE w2oTest; 

    CREATE TABLE empresa (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        nome VARCHAR(50) NOT NULL,
        cnpj VARCHAR(25) NOT NULL,
        telefone VARCHAR(20) NOT NULL,
        email VARCHAR(50) NULL,
        endereco VARCHAR(100) NULL
    );

    CREATE TABLE colaborador (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        nome VARCHAR(50) NOT NULL,
        telefone VARCHAR(20) NOT NULL,
        email VARCHAR(50) NOT NULL,
        data_nascimento DATE NULL,
        empresa_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (empresa_id) REFERENCES empresa(id)
    );

    INSERT INTO w2oTest.empresa 
    (nome, cnpj, telefone, email, endereco) 
    VALUES ('TestName', '51.673.319/0001-19', '00000000000', 'test@email.com', 'Rua Test W2O');

    INSERT INTO w2oTest.empresa 
    (nome, cnpj, telefone, email, endereco) 
    VALUES ('Nome Exemplo', '40.397.363/0001-27', '10000000001', 'nome@exemplo.com', 'Rua de Exemplos');

    INSERT INTO w2oTest.empresa 
    (nome, cnpj, telefone, email, endereco) 
    VALUES ('EmpresaDeTestes', '55.270.056/0001-58', '47990000000', 'empresadetestes@hotmail.com', 'Rua Testes Sorte 7');

    INSERT INTO w2oTest.colaborador 
    (nome, telefone, email, data_nascimento, empresa_id) 
    VALUES ('Rafael Schamber', '00000000000', 'rafael@mail.com', '1991/07/28', 1);

    INSERT INTO w2oTest.colaborador 
    (nome, telefone, email, data_nascimento, empresa_id) 
    VALUES ('Random Name', '10000000001', 'random@email.com', '2007/07/07', 1);

    INSERT INTO w2oTest.colaborador 
    (nome, telefone, email, data_nascimento, empresa_id) 
    VALUES ('Meu Nome', '47990000000', 'meunome@hotmail.com', '2067/01/13', 2);

    echo $corporationId;
    print_r($corporationId);
    var_dump($corporationId);
    die($corporationId);
) -->
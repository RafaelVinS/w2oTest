
Test W2O.

Usado somento Core PHP, Bootstrap 5 e Mysqli.

clonar https://github.com/RafaelVinS/w2oTest.git
ou baixar https://github.com/RafaelVinS/w2oTest/archive/refs/heads/master.zip

```sql
CREATE DATABASE w2oTest; 
```

```sql
CREATE TABLE empresa (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome VARCHAR(50) NOT NULL,
    cnpj VARCHAR(25) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(50) NULL,
    endereco VARCHAR(100) NULL
);
```

```sql
CREATE TABLE colaborador (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome VARCHAR(50) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    data_nascimento DATE NULL,
    empresa_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (empresa_id) REFERENCES empresa(id)
);
```

```sql
INSERT INTO w2oTest.empresa 
(nome, cnpj, telefone, email, endereco) 
VALUES ('Empresa Test', '51.673.319/0001-19', '00000000000', 'testEmpresa@gmail.com', 'Rua Test 156');

INSERT INTO w2oTest.empresa 
(nome, cnpj, telefone, email, endereco) 
VALUES ('Github Exemplo', '40.397.363/0001-27', '10000000001', 'nome@exemplo.com', 'Rua de Exemplos 89');

INSERT INTO w2oTest.empresa 
(nome, cnpj, telefone, email, endereco) 
VALUES ('EmpresaDeTestes', '55.270.056/0001-58', '47990000000', 'empresadetestes@hotmail.com', 'Rua Testes Sorte 7');

INSERT INTO w2oTest.colaborador 
(nome, telefone, email, data_nascimento, empresa_id) 
VALUES ('Leonardo Capiro', '00000000000', 'leo@gmail.com', '1988/07/28', 1);

INSERT INTO w2oTest.colaborador 
(nome, telefone, email, data_nascimento, empresa_id) 
VALUES ('Random Name', '10000000001', 'random@email.com', '2007/07/07', 1);

INSERT INTO w2oTest.colaborador 
(nome, telefone, email, data_nascimento, empresa_id) 
VALUES ('Meu Nome', '47990000000', 'meunome@hotmail.com', '2067/01/13', 2);
```

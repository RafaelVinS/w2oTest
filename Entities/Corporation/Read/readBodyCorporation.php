<!DOCTYPE html>
<html lang="en">
    <body>
        <div style="padding-left:16px">
            <h2>Empresas</h2>
            <p>Listagem das Empresas</p>
        </div>
        <br>
        
        <?php
            $columns    = array('id','nome','telefone','email','data_nascimento');
            $column     = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
            $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

            $sql    = "SELECT * FROM empresa ORDER BY $column $sort_order";
            $result = $conn->query($sql);

            $up_or_down  = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
            $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
            $add_class   = ' class="highlight"';
        ?>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">
                        <a href="readCorporations.php?column=id&order=<?php echo $asc_or_desc; ?>"> Id
                            <i class="fas fa-sort<?php echo $column == 'id' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readCorporations.php?column=nome&order=<?php echo $asc_or_desc; ?>"> Razão Social
                            <i class="fas fa-sort<?php echo $column == 'nome' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readCorporations.php?column=cnpj&order=<?php echo $asc_or_desc; ?>"> CNPJ
                            <i class="fas fa-sort<?php echo $column == 'cnpj' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readCorporations.php?column=telefone&order=<?php echo $asc_or_desc; ?>"> Telefone
                            <i class="fas fa-sort<?php echo $column == 'telefone' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readCorporations.php?column=email&order=<?php echo $asc_or_desc; ?>"> E-mail
                            <i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readCorporations.php?column=endereco&order=<?php echo $asc_or_desc; ?>"> Endereço
                            <i class="fas fa-sort<?php echo $column == 'endereco' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href=""> Editar
                        </a>
                    </th>
                    <th scope="col">
                        <a href=""> Consultar Colaboradores
                        </a>
                    </th>
                    <!-- <th scope="col">
                        <a href="readCorporations.php"> Editar Colaboradores
                        </a>
                    </th> -->
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['cnpj']; ?></td>
                            <td><?php echo $row['telefone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['endereco']; ?></td>
                            <td><a href="../Form/formCorporation.php?id=<?php echo $row["id"]; ?>">Editar</a></td>
                            <td><a href="../../Associate/Read/readAssociates.php?id=<?php echo $row["id"]; ?>">Consultar</a></td>
                            <!-- <td><a href="../../Associate/Form/formAssociate.php?id=<?php echo $row["id"]; ?>">Editar Colaboradores</a></td> -->
                        </tr>
                <?php } } else { echo "0 results"; } $conn->close();?>
            </tbody>
        </table>
    </body>
</html>
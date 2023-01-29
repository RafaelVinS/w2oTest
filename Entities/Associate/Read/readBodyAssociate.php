<!DOCTYPE html>
<html lang="en">
    <body>
        <div style="padding-left:16px">
            <h2>Colaboradores</h2>
            <p>Listagem dos Colaboradores</p>
        </div>
        <br>
        
        <?php
            $id         = isset($_GET['id']) ? $_GET['id'] : '';
            $columns    = array('id', 'nome', 'telefone', 'email', 'data_nascimento');
            $column     = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
            $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
            $sql = '';

            if(!empty($id)) $sql = "WHERE 1 = 1 AND empresa_id = $id";

            $sql    = "SELECT c.* FROM colaborador c $sql ORDER BY $column $sort_order";
            $result = $conn->query($sql);

            $up_or_down  = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
            $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
        ?>

        <div style="display: flex;">
            <form method="POST" action="../../Associate/Form/formAssociate.php?empresa_id=<?php echo $id; ?>">
                <button type="submit" class="btn btn-dark btn-sm" >Cadastrar Colaborador</button>
            </form>
            <form style="margin-left: 5px;" method="POST" action="../../../Export/exportCSV.php?column=<?php echo $column; ?>&order=<?php echo $asc_or_desc; ?>">
                <button type="submit" class="btn btn-dark btn-sm" >Exportar CSV</button>
            </form>
        </div>
        
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">
                        <a href="readAssociates.php?column=id&order=<?php echo $asc_or_desc; ?>"> Id
                            <i class="fas fa-sort<?php echo $column == 'id' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readAssociates.php?column=nome&order=<?php echo $asc_or_desc; ?>"> Nome
                            <i class="fas fa-sort<?php echo $column == 'nome' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readAssociates.php?column=telefone&order=<?php echo $asc_or_desc; ?>"> Telefone
                            <i class="fas fa-sort<?php echo $column == 'telefone' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readAssociates.php?column=email&order=<?php echo $asc_or_desc; ?>"> E-mail
                            <i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href="readAssociates.php?column=data_nascimento&order=<?php echo $asc_or_desc; ?>"> Data de nascimento
                            <i class="fas fa-sort<?php echo $column == 'data_nascimento' ? '-' . $up_or_down : ''; ?>"></i>
                        </a>
                    </th>
                    <th scope="col">
                        <a href=""> Id da Empresa
                        </a>
                    </th>
                    <th scope="col">
                        <a href=""> Editar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['telefone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['data_nascimento']; ?></td>
                            <td><?php echo $id; ?></td>
                            <td><a href="../Form/formAssociate.php?id=<?php echo $row["id"]; ?>&empresa_id=<?php echo $id; ?>">Editar</a></td>
                        </tr>
                <?php } } else { echo "0 results"; } $conn->close(); ?>
            </tbody>
        </table>
    </body>
</html>
<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    include_once($root . "/w2oTest/db.php");

    $column     = $_GET['column'];
    $sort_order = $_GET['order'];
    $id         = $_GET['empresa_id'];

    $sort_order = $sort_order == 'asc' ? 'desc' : 'asc';

    if(isset($_GET['column']) && isset($_GET['order'])) $order = "ORDER BY $column $sort_order";

    $sql = "WHERE 1 = 1 AND empresa_id = $id";
    
    $sql    = "SELECT c.* FROM colaborador c $sql $order";
    $result = $conn->query($sql);

    $delimiter = ";"; 
    $filename = "colaboradores-" . date('Y-m-d') . ".csv"; 

    $number_of_fields = mysqli_num_fields($result);
    $headers = array();
    for ($i = 0; $i < $number_of_fields; $i++) {
        $headers[] = mysqli_field_name($result , $i);
    }
    $output = fopen('php://output', 'w');
    if ($output && $result) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');
        fputcsv($output, $headers, $delimiter);
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            fputcsv($output, array_values($row), $delimiter);
        }
        die;
    }

    function mysqli_field_name($result, $field_offset)
    {
        $properties = mysqli_fetch_field_direct($result, $field_offset);
        return is_object($properties) ? $properties->name : null;
    }

    $conn->close();
?>
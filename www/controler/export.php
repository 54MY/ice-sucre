<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location: ../index.php"); 
    }
    include("../config/db.php");
    include("../config/conexion.php");
    function filterData(&$str){
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    $fileName = "acampantes-" . date('Ymd') . ".xlsx";
    $fields = array('Fecha', 'Nombre de usuario', 'Nombres', 'Apellidos', 'Edad', 'Sexo', 'Ciudad', 
                    'Celular', 'Taller', 'Color', 'Numero de cuarto');
    $excelData = implode("\t", array_values($fields)) . "\n";
    $result = mysqli_query($con,"SELECT Fecha_Registro, Usuario, Nombres, Apellidos, Edad, Sexo, 
                    Ciudad, Celular, Taller, Color, Numero_Cuarto FROM icesucre.Acampante");
    if($result->num_rows > 0){
        $i=0;
        while($row = $result->fetch_assoc()){ $i++;
            $rowData = array($row['Fecha_Registro'], $row['Usuario'], $row['Nombres'], $row['Apellidos'], $row['Edad'], 
                        $row['Sexo'], $row['Ciudad'], $row['Celular'], $row['Taller'], $row['Color'], $row['Numero_Cuarto']);
            array_walk($rowData, 'filterData');
            $excelData .= implode("\t", array_values($rowData)) . "\n";
        }
    }else{
        $excelData .= 'No hay datos...'. "\n";
    }
    header("Content-Disposition: attachment; filename=\"$fileName\""); 
    header("Content-Type: application/vnd.ms-excel"); 
    echo $excelData; 
    exit;
?>
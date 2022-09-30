<?php
        ob_clean();
        header("Content-Type: application/xls");    
        header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s').".xls");
        header("Pragma: no-cache"); 
        header("Expires: 0");
        
        include "config/conexion.php";
        include "include/head.php";

        $output = "";
        
        if(ISSET($_POST['export'])){
            $output .="
            <table class='table table-bordered'>
            <thead class='thead-dark' align='center'>
                <tr>
                    <th scope='col'>Nombre del producto</th>
                    <th scope='col'>Unidad de medida</th>
                    <th scope='col'>Sede</th>
                </tr>
            </thead>
            <tbody align='center'>
            ";
            
            foreach ($conn->query("SELECT p.idProducto, p.nombreProducto, p.unidadMedida, s.nombre 
                                    from productos p 
                                    INNER JOIN sede s ON s.idSede = p.idSede 
                                    where s.idSede = '$idSede'") as $row) {
                
            $output .= "
                        <tr>
                            <td>".$row['nombreProducto']."</td>
                            <td>".$row['unidadMedida']."</td>
                            <td>".$row['nombre']."</td>
                        </tr>
            ";
            }
            
            $output .="
                    </tbody>
                    
                </table>
            ";
            
            echo $output;
        }
        
?>
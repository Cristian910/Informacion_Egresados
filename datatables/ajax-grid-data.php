<?php
include "conn.php";

$requestData = $_REQUEST;

$columns = array( 
    0 => 'id',
    1 => 'nombres', 
    2 => 'apellidos',
    3 => 'numero_identificacion',
    4 => 'carrera',
    5 => 'fecha_egreso',
    6 => 'telefono',
    7 => 'email',
    8 => 'reconocimiento'
);

$sql = "SELECT id, nombres, apellidos, numero_identificacion, carrera, fecha_egreso, etapa_productiva, telefono, email, reconocimiento ";
$sql .= " FROM tegresados";
$query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

if (!empty($requestData['search']['value'])) {
    $sql = "SELECT id, nombres, apellidos, numero_identificacion, carrera, fecha_egreso, etapa_productiva, telefono, email, reconocimiento ";
    $sql .= " FROM tegresados";
    $sql .= " WHERE nombres LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR apellidos LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR numero_identificacion LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR carrera LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR fecha_egreso LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR etapa_productiva LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR telefono LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR email LIKE '".$requestData['search']['value']."%' ";
    $sql .= " OR reconocimiento LIKE '".$requestData['search']['value']."%' ";
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
    $totalFiltered = mysqli_num_rows($query);
    
    $sql .= " ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length'];
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
} else {
    $sql = "SELECT id, nombres, apellidos, numero_identificacion, carrera, fecha_egreso, etapa_productiva, telefono, email, reconocimiento ";
    $sql .= " FROM tegresados";
    $sql .= " ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length'];
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: Error fetching data");
}

$data = array();
while ($row = mysqli_fetch_array($query)) {
    $nestedData = array(); 

    $nestedData[] = $row["id"];
    $nestedData[] = $row["nombres"];
    $nestedData[] = $row["apellidos"];
    $nestedData[] = $row["numero_identificacion"];
    $nestedData[] = $row["carrera"];
    $nestedData[] = $row["fecha_egreso"];
    $nestedData[] = $row["telefono"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["reconocimiento"];
    $nestedData[] = '<td><center>
                     <a href="editar.php?id='.$row['id'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="index.php?action=delete&id='.$row['id'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
                     </center></td>';      
    
    $data[] = $nestedData;
}

$json_data = array(
    "draw"            => intval($requestData['draw']),
    "recordsTotal"    => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data"            => $data
);

echo json_encode($json_data);
?>

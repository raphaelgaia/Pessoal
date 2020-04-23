<?php 
header('Content-Type: application/json');
$teste=json_decode(shell_exec('/app/aquapi/parametrojson.py'));
echo json_encode($teste);
?>
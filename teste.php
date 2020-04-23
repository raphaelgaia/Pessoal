<?php 
header('Content-Type: application/json');
function nvl($val, $replace)
{
    if( is_null($val) || strlen($val) === 0 )  
       return $replace;
    else 
       return $val;
}

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$houveAlteracao=0;
foreach($request as $key => $val) {
    $saida=shell_exec('/app/aquapi/alteraParametro.py '.$key.' '.nvl($val,0));
    $houveAlteracao=1;
    #echo nvl($val,0);
}

if ( $houveAlteracao == 1) {
    $saida=shell_exec('touch /app/aquapi/input/web.par');
}

$teste=json_decode(shell_exec('/app/aquapi/parametrojson.py'));
echo json_encode($teste);
?>

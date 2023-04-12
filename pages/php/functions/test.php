<?php
include('funcoes.php');
atributte_value_emailUser();
$ret_email = atributte_value_emailUser();

if($ret_email==0){
    echo "Usuario";
}
else{
    echo "Pet";
}
?>
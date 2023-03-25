<?php 
function ex1($n){
    if($n < 0){
        echo "O número é negativo.";
    }
    elseif($n == 0){
        echo "O número é zero";
    }
    else{
        echo "O número é positivo";
    }
}

function ex2($n){
    $mult=0;
    while($mult <= 10){
        $result = $n * $mult;
        echo $n . " x " . $mult . " = " . $result . "<br>";
        $mult++;
    }
}

function ex3($n){
    if($n % 2 == 0){
        echo "O número " . $n . " é par.";
    }
    else{
        echo "O número " . $n . " é ímpar.";
    }
}


function ex4($n){
    $array = array('','janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro');

    if($n >= 1 and $n <= 12){
        echo $array[$n];
    }

    else{
        echo "Esse número não coicide com algum mês do ano";
    }
}

function ex5($a, $b){
    if ($a < $b){
        echo "A menor que B";
    }
    elseif($a == $b){
        echo "A é igual a B";
    }
    else{
        echo "A é maior que B";
    }
}
return ex5(2,3)
?>
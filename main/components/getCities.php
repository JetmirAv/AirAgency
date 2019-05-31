<?php

$findFromCityQuery = "select id, name from city order by name";
$output = [];
// include_once('../../databaseConfig.php');

if(isset($_POST['refreshCity'])){

    include_once('../../databaseConfig.php');

    $findFromCityQuery = "
    select id, name from city where id in (
    select f.toCity from flight f
    inner join city c on f.fromCity = c.id 
    where f.fromCity=" . $_POST['fromCityId'] . "
    order by name)";
} 

$findFromCity = $conn->prepare($findFromCityQuery);
$findFromCity->execute();

foreach($findFromCity as $city){
    $output[$city[0]] = $city[1];
}

if(isset($_POST['refreshCity'])){
    $options='';
    foreach($output as $key=>$city){
        $options .= '<option value="'. $key .'">' . $city . ' </option>';
    }

    echo $options;
}




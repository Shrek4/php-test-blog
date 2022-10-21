<?php


$config=array(
    'title'=>'Блог Шрека',
    'db'=>array(
        'server'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'name'=>'test'
    )
);

$connection = mysqli_connect(
    $config['db']['server'], 
    $config['db']['username'], 
    $config['db']['password'], 
    $config['db']['name']);

if($connection==false){
    echo "error";
    echo mysqli_connect_error();
    exit();
}
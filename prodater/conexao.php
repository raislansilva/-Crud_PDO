<?php

   $databaseHost = 'localhost'; //Endereço do banco de dados
   $databaseName = 'crud_prodater'; //Nome do banco de dados
   $databaseUser = 'root';// Usuário do Banco de dados
   $databasePass = ''; //Senha do banco de dados

   try{

      //Conxeão com banco de dados PDO
   	$con = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUser, $databasePass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

   	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   }catch(PDOException $ex){
    echo $ex->getMessage();

 }





?>
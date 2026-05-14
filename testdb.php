<?php
try {    $pdo = new PDO(        "mysql:host=mysql-b5b5c36-symfonyproject-db2026.i.aivencloud.com;port=22403;dbname=defaultdb;charset=utf8mb4",        "avnadmin",        "YOUR_PASSWORD"    );    echo "CONNECTED TO AIVEN";} 
catch(PDOException $e){    die($e->getMessage());}

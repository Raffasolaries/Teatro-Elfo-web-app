<?php

include 'vendor/autoload.php';

use RestService\Server;

Server::create('/')
    ->addGetRoute('test', function(){
        return 'Yay!';
    })
    ->addGetRoute('resetdata', function(){
        /*$servername = 'localhost';
        $username = 'gx2d5p0a_tp';
        $password = 'xonne@2019';
        $dbname = 'gx2d5p0a_teatropellegrini';*/
        $servername = 'mobilecmos37f0db.mysql.db';
        $username = 'mobilecmos37f0db';
        $password = 'JrQf3Tee5QhvgzCD';
        $dbname = 'mobilecmos37f0db';
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "DELETE from performerinfo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return 'Success';
        } else {
            return $result->fetch_assoc();
        }
        $conn->close();
    })
    ->addGetRoute('dashboard', function(){
        /*$servername = 'localhost';
        $username = 'gx2d5p0a_tp';
        $password = 'xonne@2019';
        $dbname = 'gx2d5p0a_teatropellegrini';*/
        $servername = 'mobilecmos37f0db.mysql.db';
        $username = 'mobilecmos37f0db';
        $password = 'JrQf3Tee5QhvgzCD';
        $dbname = 'mobilecmos37f0db';
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT height, weight, age, time_stamp FROM performerinfo ORDER BY time_stamp DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = [];
            while($row = $result->fetch_assoc()) {
                array_push($data, array('height' => $row['height'], 'weight' => $row['weight'], 'age' => $row['age'], 'time_stamp' => $row['time_stamp']));
            }
            return json_decode(json_encode($data));
        } else {
            return json_decode(json_encode($data));
        }
        $conn->close();
    })
    ->addGetRoute('average', function(){
        /*$servername = 'localhost';
        $username = 'gx2d5p0a_tp';
        $password = 'xonne@2019';
        $dbname = 'gx2d5p0a_teatropellegrini';*/
        $servername = 'mobilecmos37f0db.mysql.db';
        $username = 'mobilecmos37f0db';
        $password = 'JrQf3Tee5QhvgzCD';
        $dbname = 'mobilecmos37f0db';
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT height, weight, age FROM performerinfo";
        $sqlMinMax = "
            SELECT MIN(height) as minHeight, MAX(height) as maxHeight, MIN(weight) as minWeight, MAX(weight) as maxWeight, MIN(age) as minAge, MAX(age) as maxAge
            FROM performerinfo";
        $result = $conn->query($sql);
        $resultMinMax = $conn->query($sqlMinMax);

        if ($result->num_rows > 0) {
            // output data of each row
            $avHeight = 0;
            $avWeight = 0;
            $avAge = 0;
            while($row = $result->fetch_assoc()) {
                $avHeight += $row["height"];
                $avWeight += $row["weight"];
                $avAge += $row["age"];
            }
            $rowMinMax = $resultMinMax->fetch_assoc();
            $data = json_encode(array(
                'avHeight' => round($avHeight / $result->num_rows, 1), 'avWeight' => round($avWeight / $result->num_rows, 1), 'avAge' => round($avAge / $result->num_rows, 1), 'minHeight' => $rowMinMax['minHeight'], 'maxHeight' => $rowMinMax['maxHeight'], 'minWeight' => $rowMinMax['minWeight'], 'maxWeight' => $rowMinMax['maxWeight'], 'minAge' => $rowMinMax['minAge'], 'maxAge' => $rowMinMax['maxAge']
            ));
            return json_decode($data);
        } else {
            return json_decode(json_encode(array(
                'avHeight' => 0, 'avWeight' => 0, 'avAge' => 0, 'minHeight' => 0, 'maxHeight' => 0, 'minWeight' => 0, 'maxWeight' => 0, 'minAge' => 0, 'maxAge' => 0
            )));
        }
        $conn->close();
    })
    ->addPostRoute('guess', function($height, $weight, $age) {
        /*$servername = 'localhost';
        $username = 'gx2d5p0a_tp';
        $password = 'xonne@2019';
        $dbname = 'gx2d5p0a_teatropellegrini';*/
        $servername = 'mobilecmos37f0db.mysql.db';
        $username = 'mobilecmos37f0db';
        $password = 'JrQf3Tee5QhvgzCD';
        $dbname = 'mobilecmos37f0db';
        // do stuff with $field1, $field2 etc
        // or you can directly get them with $_POST['field1']
        // Create connection
        if ($height !== NULL && $weight !== NULL && $age !== NULL) {
            $arr = json_encode(array('height' => $height, 'weight' => $weight, 'age' => $age,
                'servername' => $servername, 'username' => $username, 'password' => $password, 'dbname' => $dbname));
            // return json_decode($arr);
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            } 

            $sql = "INSERT INTO performerinfo (height, weight, age)
                VALUES ($height, $weight, $age)";

            if ($conn->query($sql) === TRUE) {
                return 'New record created successfully';
            } else {
                return 'Error: ' . $sql . '<br>' . $conn->error;
            }

            $conn->close();
        } else return 'failure cause params null';
    })
    ->run();

?>
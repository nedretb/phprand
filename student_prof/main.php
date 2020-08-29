<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password, "Users");
    function connect(){
        if($GLOBALS['conn'] -> connect_error){
            die("Connection failed: " . $GLOBALS['conn']-> connect_error . PHP_EOL);
        }
        echo "connected" . PHP_EOL;
    }

    function insertIntoStudents($name, $surname, $age, $status){
        $sql1 = "INSERT INTO Students (name, surname, age, status)
        VALUES ('" .$name . "', '" . $surname. "', '" . $age. "', '".$status. "')";
        if ($GLOBALS['conn']->query($sql1) === TRUE) {
            echo "New student record created successfully". PHP_EOL;
            } else {
            echo "Error: " . $sql1 . $GLOBALS['conn']->error;
            }
    }

    function insertIntoProffesors($name, $surname, $title, $age, $deparment){
        $sql1 = "INSERT INTO Professors (name, surname, title, age, department)
        VALUES ('" .$name . "', '" . $surname. "', '" . $title. "', '".$age. "', '" . $deparment."')";
        if ($GLOBALS['conn']->query($sql1) === TRUE) {
            echo "New prof record created successfully". PHP_EOL;
            } else {
            echo "Error: " . $sql1 . $GLOBALS['conn']->error;
            }

    }

    function selectFromStudent($id){
        $sql1 = "SELECT id, name, surname, age, status FROM STUDENTS";
        $result = $GLOBALS['conn'] -> query($sql1);

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                if ($row["id"] == $id){
                    echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["status"] . PHP_EOL;
                }
            }
        }
        else{
            echo "students table empty";
        }

    }

    function selectFromProfessors($id){
        $sql1 = "SELECT id, name, surname, age, title, department FROM PROFESSORS";
        $result = $GLOBALS['conn'] -> query($sql1);

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                if ($row["id"] == $id){
                    echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["title"] . " ". $row["department"]. PHP_EOL;
                }
            }
        }
        else{
            echo "prof table empty";
        }
    }
    
    connect();
    //insertIntoStudents("nedret", "becirovic", 24, "doktor");
    //insertIntoProffesors("nedret", "becirovic", "doktor", 24, "doktorski");
    selectFromStudent(1);
    selectFromProfessors(1);
    mysqli_close($conn);
?>
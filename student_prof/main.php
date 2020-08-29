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
    
    function selectAllFromStudents(){
        $sql1 = "SELECT id, name, surname, age, status FROM STUDENTS";
        $result = $GLOBALS['conn'] -> query($sql1);

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["status"] . PHP_EOL;
            }
        }
        else{
            echo "students table empty";
        }

    }

    function selectAllFromProfessors(){
        $sql1 = "SELECT id, name, surname, age, title, department FROM PROFESSORS";
        $result = $GLOBALS['conn'] -> query($sql1);

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["title"] . " ". $row["department"]. PHP_EOL;
                
            }
        }
        else{
            echo "prof table empty";
        }
    }

    function selectStudents($choice){
        $sql1 = "SELECT id, name, surname, age, status FROM STUDENTS";
        $result = $GLOBALS['conn'] -> query($sql1);

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                switch($choice){
                    case $choice == ">20" && $row["age"] >=20:
                        echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["status"] . PHP_EOL;
                    break;
                    case $choice == "redovan" && $row["status"] == "redovan":
                        echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["status"] . PHP_EOL;

                }
            }
        }
        else{
            echo "students table empty";
        }
    }

    function selectProfessor($choice){
        $sql1 = "SELECT id, name, surname, age, title, department FROM PROFESSORS";
        $result = $GLOBALS["conn"] -> query($sql1);

        if($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){
                switch($choice){
                    case $choice == "IT" && $row["department"] == "IT":
                        echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["title"] . " ". $row["department"]. PHP_EOL;
                    break;
                    case $choice == "ITAndD" && $row["department"] == "IT" && $row["title"] == "docent":
                        echo $row["name"] . " ". $row["surname"] . " ". $row["age"] . " ". $row["title"] . " ". $row["department"]. PHP_EOL;
                }
            }
        }
        else{
            echo "professor table is empty";
        }
    }

    function updateStudent($choice){
        $sql1 = "SELECT id, name, surname, age, status FROM STUDENTS";
        $result = $GLOBALS["conn"] -> query($sql1);

        if ($result -> num_rows > 0){
            while($row = $result ->fetch_assoc()){
                switch($choice){
                    case $choice == 1 && $row["age"] >=24:
                        $sql_update = "UPDATE Students SET status='apsolvent' WHERE id=". $row["id"] ."";
                        if($GLOBALS["conn"]->query($sql_update)){
                            echo "update sucessful\n";
                        }
                        else{
                            echo "update unsucessful\n";
                        }
                    break;
                    case $choice == 0:
                        echo "hey";
                }
            }

        }
        else{
            echo "studnt table is empty";
        }

    }

    function updateProfessor($choice){
        $sql1 = "SELECT id, name, surname, age, title, department FROM PROFESSORS";
        $result = $GLOBALS["conn"] -> query($sql1);

        if ($result -> num_rows > 0){
            while($row = $result ->fetch_assoc()){
                switch($choice){
                    case $choice == 1 && $row["title"] == "docent":
                        $sql_update = "UPDATE Professors SET department='management' WHERE id=". $row["id"] ."";
                        if($GLOBALS["conn"]->query($sql_update)){
                            echo "update sucessful\n";
                        }
                        else{
                            echo "update unsucessful\n";
                        }
                    break;
                    case $choice == 0:
                        echo "hey";
                }
            }

        }
        else{
            echo "studnt table is empty";
        }
    }

    function deleteStudent($choice){
        $sql1 = "SELECT id, name, surname, age, status FROM STUDENTS";
        $result = $GLOBALS["conn"] -> query($sql1);

        if ($result -> num_rows > 0){
            while($row = $result ->fetch_assoc()){
                switch($choice){
                    case $choice == 1 && $row["status"] == "neregistrovani":
                        $sql_update = "DELETE FROM Students WHERE id=". $row["id"] ."";
                        if($GLOBALS["conn"]->query($sql_update)){
                            echo "student deletition sucessful\n";
                        }
                        else{
                            echo "student deletition unsucessful\n";
                        }
                    break;
                    case $choice == 0:
                        echo "hey";
                }
            }

        }
        else{
            echo "studnt table is empty";
        }
    }

    function deleteProf($choice){
        $sql1 = "SELECT id, name, surname, age, title, department FROM PROFESSORS";
        $result = $GLOBALS["conn"] -> query($sql1);

        if ($result -> num_rows > 0){
            while($row = $result ->fetch_assoc()){
                switch($choice){
                    case $choice == 1 && $row["title"] == "redovan":
                        $sql_update = "DELETE FROM professors WHERE id=". $row["id"] ."";
                        if($GLOBALS["conn"]->query($sql_update)){
                            echo "prof deletition sucessful\n";
                        }
                        else{
                            echo "prof deletition unsucessful\n";
                        }
                    break;
                    case $choice == 0:
                        echo "hey";
                }
            }

        }
        else{
            echo "studnt table is empty";
        }
    }

    connect();
    //insertIntoStudents("nedret4", "becirovic4", 19, "redovan");
    //insertIntoProffesors("nedret6", "becirovic6", "docent", 66, "it");
    //selectFromStudent(1);
    //selectFromProfessors(1);
    //selectAllFromStudents();
    //selectAllFromProfessors();
    //selectStudents(">20");
    //updateStudent(1);
    //updateProfessor(1);
    //deleteStudent(1);
    //deleteProf(1);
    mysqli_close($conn);
?>
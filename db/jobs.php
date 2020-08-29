<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $jobs = array("posao1","posao2","posao3","posao4","posao5","posao6");
    $salary_min = array(600, 700, 800, 900, 1000, 1100);
    $salary_max = array(1000, 1100, 1200, 1300, 1400, 1600);
    $salary_max_for2 = 750;
    $conn = new mysqli($servername, $username, $password, "test");

    if($conn -> connect_error){
        die("Connection failed: " . $conn-> connect_error . PHP_EOL);
    }
    echo "connected" . PHP_EOL;

    /*
    //Create table
    $sql = "CREATE TABLE Poslovi (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        job_name VARCHAR(30) NOT NULL,
        salary_min VARCHAR(30) NOT NULL,
        salary_max VARCHAR(30) NOT NULL
    )";
    
    if(mysqli_query($conn, $sql)){
        echo "Table created successfuly" . PHP_EOL;
    }
    else{
        echo "error creating table". mysqli_error($conn). PHP_EOL;
    }

    //insert data in table
    for ($i = 0; $i < sizeof($jobs); $i++){
        $sql1 = "INSERT INTO Poslovi (job_name, salary_min, salary_max)
        VALUES ('', 'Doe', 'john@example.com')";
        $sql1 = "INSERT INTO Poslovi (job_name, salary_min, salary_max)
        VALUES ('" .$jobs[$i] . "', '" . $salary_min[$i]. "', '" . $salary_max[$i]. "')";
        if ($conn->query($sql1) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
    }
    
    //update table
    $sql_update = "UPDATE Poslovi SET salary_max='" . $salary_max_for2 ."' WHERE id=10";
    if($conn -> query($sql_update)){
        echo "updated successfully";
    }
    else{
        echo "error updating";
    }
    
    //jobs under 1k
    $sql_select_salary = "SELECT salary_max FROM Poslovi";
    $result = $conn->query($sql_select_salary);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if ($row["salary_max"] < 1000){
                echo $row["salary_max"]. PHP_EOL;
            }
            
        }
    }
    
    //print jobs
    $sql_select_jobs = "SELECT job_name FROM Poslovi";
    $result_jobs = $conn -> query($sql_select_jobs);

    if($result_jobs->num_rows > 0){
        while($row = $result_jobs->fetch_assoc()){
            echo $row["job_name"].PHP_EOL;
        }
    }
    */

    $sql_select_salaries = "SELECT job_name, salary_max, salary_min FROM Poslovi";
    $result_salaries = $conn->query($sql_select_salaries);

    if($result_salaries->num_rows > 0){
        while($row = $result_salaries->fetch_assoc()){
            if ($row["salary_max"] < 2000 && $row["salary_min"] >= 1000){
                echo $row["job_name"]. PHP_EOL;
            }
            
        }
    }

    mysqli_close($conn);
?>
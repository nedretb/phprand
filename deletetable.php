<?php
//session_start();

    $host = 'localhost';
    $username = 'root';
    $pw = '';
    $dbName = 'nova';

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
    $sql = "select * from new";
    $pdo = new PDO($dsn, $username, $pw);

    $stmt = $pdo->query($sql);
    ?>
    <form method="POST">
    <table>
        <th>name</th>
        <th>surname</th>
        <th>age</th>
        <th>action</th>
    <?php
    $count=0;
    foreach($stmt as $val){


        ?>
        <tr>
            <td><?php echo $val['name'];?></td>
            <td><?php echo $val['surname'];?></td>
            <td><?php echo $val['age'];?></td>
            <td><button type="submit" value="<?php echo $val['name'];?>" id="<?php echo $count?>" name="0">delete</button></td>
        </tr>
<?php
$count++;    
}
    if(isset($_POST['0'])){
        echo "hey ".$_POST["0"];
        $s = $pdo->query("delete from new where name='".$_POST["0"] ."'");
        header("Refresh:0");
    }
?>

</table>
</form>
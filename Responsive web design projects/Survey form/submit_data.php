<!DOCTYPE html>
<html>

<head>
    <title>Data submission page</title>
</head>

<body>
    <center>
        <?php
        include 'db_config.php';

        if ($_SERVER["$REQUEST_METHOD"] == "POST") {
            $servername = $db_config['server'];
            $username = $db_config['username'];
            $password = $db_config['password'];
            $dbname = $db_config['dbname'];

            $conn = mysqli_connect($servername,$username,$password,$dbname);

           if($conn === false){
            die("ERROR: Could not connect.".mysqli_connect_error());
           }
           $name = $_POST['name'];
           $email = $_POST['email'];
           $age = $_POST['age'];
           $status = $_POST['status'];
           $gender = $_POST['gender'];
           $votingMethod = $_POST['voting-method'];
           $issues = implode(", ", $_POST['issues']);
           $feedback = $_POST['feedback'];

           $sql = "INSERT INTO survey_data(name,email,age,status,gender,voting-method,issues,feedback)
           VALUES('$name','$email','$age','$status','$gender','$votingMethod','$issues','$feedback')";

           if(mysqli_query($conn,$sql)){
            echo "Data submitted successfully";
           }
           else{
            echo "ERROR: Could not execute sql.".mysqli_error($conn);
           }
           mysqli_close($conn);
        }
        ?>
    </center>
</body>

</html>
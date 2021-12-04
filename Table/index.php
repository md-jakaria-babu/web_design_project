<?php 

    $hostname ='localhost';
    $user = 'root';
    $password ='';
    $dbname ='form_practice';

    $conn= mysqli_connect($hostname,$user,$password,$dbname);
    if(isset($_POST['sub_btn'])){
        $f_name = $_POST['f_name'];
        $class = $_POST['class'];
        $roll = $_POST['roll'];
        $section = $_POST['section'];
        $address = $_POST['addres'];

        $query  ="INSERT INTO userinfo(f_name,class,roll,section,addres)
            VALUES ('$f_name','$class','$roll','$section','$address')";
            if(mysqli_query($conn,$query)){
                echo "<h1>Data Saved</h1>";
            }else{
                echo "<h1>Data Not Saved</h1>";
            }
            

        }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud table design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <!-------Form----------------->
        <form action="index.php" method="post">
        <div class="mb-3">
            <label for="f_name" class="form-label">Name </label>
            <input name="f_name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class </label>
            <input name="class" type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="roll" class="form-label">Roll </label>
            <input name="roll" type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="section" class="form-label">Section </label>
            <input name="section" type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="addres" class="form-label">Address H</label>
            <input name="addres" type="text" class="form-control" >
        </div>
        <input type="submit"  name="sub_btn" class="btn btn-primary" value="Submit">
        </form>  
    </div><br><br><br>
    <table class="table table striped table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Class</th>
                <th>Roll</th>
                <th>Section</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * from userinfo";
            $query =mysqli_query($conn,$sql);
            while($info=mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $info['Id']; ?></td>
                    <td><?php echo $info['f_name']; ?></td>
                    <td><?php echo $info['class']; ?></td>
                    <td><?php echo $info['roll']; ?></td>
                    <td><?php echo $info['section']; ?></td>
                    <td><?php echo $info['addres']; ?></td>
                    
                </tr>
                <?php

            }

            
            ?>
            

        </tbody>
        
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
</body>
</html>
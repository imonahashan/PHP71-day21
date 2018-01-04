<?php
require_once "vendor/autoload.php";
use App\classes\StudentInfo;
$id = $_GET['id'];
$result = StudentInfo::saveStudentsInfoById($id);
$student = mysqli_fetch_assoc($result);

$massage="";
if(isset($_POST['btn'])){
    $massage = StudentInfo::updateStudentsInfo($_POST);
}
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>

    <style>
        .viewInfo a{color:white;text-decoration: none;}
    </style>
</head>
<body>

<div class="container">
    <div class="jumbotron">
        <div class="col-md-4 m-auto viewInfo">
            <button class="btn btn-success btn-block"><a href="viewInfo.php">View Students</a></button>
        </div>
        <hr/>
        <hr/>
        <div class="col-md-4 m-auto">
            <h1>Edit Information</h1>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control" value="<?php echo $student['first_name']?>">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $student['id']?>">
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="form-control" value="<?php echo $student['last_name']?>">
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="<?php echo $student['email']?>">
                </div>
                <div class="form-group">
                    <input type="number" name="mobile" class="form-control" value="<?php echo $student['mobile']?>">
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control"><?php echo $student['address']; ?></textarea>
                </div>


                <button type="submit" name="btn" class="btn btn-success btn-block">Update</button>

            </form>
            <hr/>
            <h3 style="color:green;"><?php echo $massage; ?></h3>
            <hr/>
        </div>
        <hr>
        <hr>
    </div>
</div>
</body>
</html>

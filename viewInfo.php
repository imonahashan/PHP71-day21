<?php
require_once "vendor/autoload.php";
use App\classes\StudentInfo;

if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $massage = StudentInfo::deleteStudent($id);
}



$result = StudentInfo::viewStudentsInfo();
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <style>
        .viewInfo a{color:white;text-decoration: none;}
    </style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <div class="col-md-4 m-auto viewInfo">
            <button class="btn btn-success btn-block"><a  href="addInfo.php">Add New Student</a></button>
        </div>
        <table class="table">
            <h1 class="text-center font-weight-bold text-center">Student Information</h1>
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Mobile no</th>
                <th scope="col">Present Address</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <?php while ($student = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['first_name']; ?></td>
                <td><?php echo $student['last_name']; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['mobile']; ?></td>
                <td><?php echo $student['address']; ?></td>
                <td>
                    <a href="edit-student.php?id=<?php echo $student['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="?delete=true&id=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure to delete this??')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <hr/>
        <h3><?php echo $massage; ?></h3>
        <hr/>
    </div>

</div>
</body>
</html>


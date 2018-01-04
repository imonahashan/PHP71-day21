<?php
namespace App\classes;
class StudentInfo
{

    private function dbconnection(){
        $hostName='localhost';
        $userName='root';
        $password='';
        $dbName='students';
        $link = mysqli_connect($hostName,$userName,$password,$dbName);
        return $link;
    }
    public function saveStudentsInfo($data){


       $dataSend = "INSERT INTO informations(first_name,last_name,email,mobile,address) VALUES ('$data[first_name]','$data[last_name]','$data[email]','$data[mobile]','$data[address]')";
        if(mysqli_query(StudentInfo::dbconnection(),$dataSend)){
            $massage ="Info added successfully!!";
            return $massage;
        }else{
            die('Query Problem'.mysqli_error(StudentInfo::dbconnection()));
        }

    }
    public function viewStudentsInfo(){


        $dataReceive = "SELECT * FROM informations";
        if(mysqli_query(StudentInfo::dbconnection(),$dataReceive)){
            $result=mysqli_query(StudentInfo::dbconnection(),$dataReceive);
            return $result;
        }else{
            die('Query Problem'.mysqli_error(StudentInfo::dbconnection()));
        }
    }
    public function saveStudentsInfoById($id){
        $dataReceive = "SELECT * FROM informations WHERE id = '$id'";
        if(mysqli_query(StudentInfo::dbconnection(),$dataReceive)){
            $result=mysqli_query(StudentInfo::dbconnection(),$dataReceive);
            return $result;
        }else{
            die('Query Problem'.mysqli_error(StudentInfo::dbconnection()));
        }
    }

    public function updateStudentsInfo($data){
        $sql = "UPDATE informations SET first_name='$data[first_name]',
last_name='$data[last_name]',email='$data[email]',mobile='$data[mobile]',
address='$data[address]' WHERE id='$data[id]'";
        if(mysqli_query(StudentInfo::dbconnection(),$sql)){
            header('Location:viewInfo.php');

        }else{
            die('Query Problem'.mysqli_error(StudentInfo::dbconnection()));
        }
    }
    public function deleteStudent($id){
        $sql = "DELETE FROM informations WHERE id= '$id'";

        if(mysqli_query(StudentInfo::dbconnection(),$sql)){
            $massage = "Student info delete successfully";
            return $massage;

        }else{
            die('Query Problem'.mysqli_error(StudentInfo::dbconnection()));
        }
    }
}
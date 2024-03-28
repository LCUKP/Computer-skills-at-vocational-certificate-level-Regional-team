<?php 
include("../Page/dbconnect.php");
if($_POST['UserID']!=""){
    $UserID=$_POST['UserID'];
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $Userfname=$_POST['Userfname'];
    $Userlname=$_POST['Userlname'];
    $Userphone=$_POST['Userphone'];
    $Useraddress=$_POST['Useraddress'];

    $dir="Uimg/";
    $filename=$dir.basename($_FILES["Userimage"]["name"]);
    move_uploaded_file($_FILES["Userimage"]["tmp_name"],$filename);
    $Userimage=basename($_FILES["Userimage"]["name"]);

    $sqli="UPDATE tb_user SET
        Username='$Username',
        Password='$Password',
        Userfname='$Userfname',
        Userlname='$Userlname',
        Useraddress='$Useraddress',
        Userphone='$Userphone',
        Userimage='$Userimage'
        WHERE UserID='$UserID'";
        
        

    $results=mysqli_query($connect,$sqli);
    // mysqli_close($connect);
    if($results){
        // echo "
        // <script>
        // alert('บันทึกข้อมูลสำเร็จ!!')
        // </script>
        // ";
        header("Location:datauser.php");
    } else {
        echo mysqli_error($connect);
    };
} else {
    echo "ผิดจ้า";
}

?>
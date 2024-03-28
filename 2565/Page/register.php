<?php 

include('dbconnect.php');
if(isset($_POST['Username'])){
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $Userfname=$_POST['Userfname'];
    $Userlname=$_POST['Userlname'];
    $Useraddress=$_POST['Useraddress'];
    $Userphone=$_POST['Userphone'];

    $dir="../User/Uimg/";
    $filename=$dir.basename($_FILES["Userimage"]["name"]);
    move_uploaded_file($_FILES["Userimage"]["tmp_name"],$filename);
    $Userimage=basename($_FILES["Userimage"]["name"]);

    $sql="INSERT INTO songtaew (Username,Password,Userfname,Userlname,Useraddress,Userphone,Userimage) VALUES('$Username','$Password','$Userfname','$Userlname','$Useraddress','$Userphone','$Userimage')";
    $result=mysqli_query($connect,$sql);

    if($result){
        echo '
				<script>
                    alert("ลงทะเบียนสำเร็จ!!")
				</script>
				';
        header("Location:../User/userlogin.php");
    } else {
        echo mysqli_error($connect);
    }

}
?>
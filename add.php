<?php 
$target = "images/"; 
$target = $target . basename( $_FILES['photo']['name']); 
$name=$_POST['name']; 
$email=$_POST['email']; 
$phone=$_POST['phone']; 
$pic=($_FILES['photo']['name']);

$servername = "phpdb.cxzky9x7h5eg.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "master1234";
$dbname = "gaskinphpproje";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO visitors (name , email, phone, photo)
VALUES ('$name', '$email', '$phone', '$pic')";

if ($conn->query($sql) === TRUE) {
    echo "Kayit basariyla yaratildi ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)) 
{ 
echo "Dosya ". basename( $_FILES['uploadedfile']
['name']). " basarili bir sekilde sunucuya yuklendi ve diger kayitlar da veritabanına basarili sekilde girildi"; 
 } 
 else { 
 
echo "Dosyayi yuklerken hata olustu"; 
 } 
?>
<p>
<a href="view.php">Kayitlari Gor</a>
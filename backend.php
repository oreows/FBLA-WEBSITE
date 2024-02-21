<?php
$position = $_POST["fav_language"];
$name = $_POST["contact-name"];
$email = $_POST["contact-email"];
$reason = $_POST["contact-project"];
$resume = $_FILES["resume"]; // Name of the resume file
$portfolio = $_FILES["portfolio"]; // Name of the portfolio file
//action="process-form.php" method="post"
if ( ! $terms) {
    die("Terms must be accepted");
}   

$host = "localhost";
$dbname = "message_db";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO message (name, email, reason, portfolio, resume, position)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii",
                       $name,
                       $email,
                       $reason,
                       $resume,
                       $portfolio,
                       $position);

mysqli_stmt_execute($stmt);

echo "Record saved.";
?>
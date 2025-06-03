<?php
include "db.php";

$code = basename($_SERVER['REQUEST_URI']); // get short code from URL

$stmt= $conn->prepare("SELECT long_url FROM urls WHERE short_code=?");
$stmt->execute([$code]);
$stmt->store_result();

if($stmt->num_rows > 0){
    $stmt->bind_result($long_url);
    $stmt->fetch();

    // Update URL click count
    $conn->query("UPDATE urls SET clicks= clicks + 1 WHERE short_code = '$code'");
    header("Location: $long_url");
}else {
    echo "Invalid short URL.";  
}

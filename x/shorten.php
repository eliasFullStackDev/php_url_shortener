<?php
include 'db.php';
if(isset($_POST['long_url'])){
    $long_url = trim($_POST['long_url']);
    if(empty($long_url)){
        header("Location: index.php");
    }

    // save orginal URL and get insert ID
    $stmt = $conn->prepare("INSERT INTO urls(long_url, short_code) VALUES (?,?)");
    $stmt->execute([$long_url, ""]);
    $insert_id = $stmt->insert_id;

    // create 3-char unique short code Letter+ Digit+ Letter
    $letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $char1= $letters[random_int(0, strlen($letters)-1)];
    $char2= $letters[random_int(0, strlen($letters)-1)];
    $digit = $insert_id % 10; // unique

    $short_code = $char1 . $digit . $char2;

    //  Ensure uniqueness
    $check = $conn->prepare("SELECT id FROM urls WHERE short_code=?");
    $check->execute([$short_code]);
    $check->store_result();

    while($check->num_rows > 0){
        // if exists regenerate
        $char1= $letters[random_int(0, strlen($letters)-1)];
        $char2= $letters[random_int(0, strlen($letters)-1)];
        $digit = random_int(0, 9);
        $short_code = $char1 . $digit . $char2;

        $check->execute([$short_code]);
        $check->store_result();
    }

    //Upadte short code
    $stmt = $conn->prepare("UPDATE urls SET short_code=? WHERE id=?");
    $stmt->execute([$short_code,  $insert_id]);
    header("Location: index.php?code=$short_code");
}

<!-- <?php
session_start();

// Check user login
if (!isset($_SESSION["user"]) || $_SESSION['usertype'] != 'p') {
    header("location: ../login.php");
    exit;
}

include("../connection.php");

$useremail = $_SESSION["user"];

// Get patient info
$sqlmain = "SELECT * FROM patient WHERE pemail=?";
$stmt = $database->prepare($sqlmain);
$stmt->bind_param("s", $useremail);
$stmt->execute();
$userrow = $stmt->get_result();
$userfetch = $userrow->fetch_assoc();
$userid = $userfetch["pid"];
$username = $userfetch["pname"];

// Delete symptom entries if delete button clicked
if (isset($_POST['delete_data'])) {
    $deleteSQL = "DELETE FROM symptom_data WHERE patient_id=?";
    $stmt = $database->prepare($deleteSQL);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $message = "All your symptom entries have been deleted!";
}

// Insert new symptom entry
if (isset($_POST['submit_symptom'])) {
    $symptom = trim($_POST['symptoms']);
    if ($symptom != "") {
        $insertSQL = "INSERT INTO symptom_data (patient_id, symptom, created_at) VALUES (?, ?, NOW())";
        $stmt = $database->prepare($insertSQL);
        $stmt->bind_param("is", $userid, $symptom);
        $stmt->execute();
        $message = "Symptom added successfully!";
    }
}

// Fetch current symptoms
$symptoms = $database->query("SELECT * FROM symptom_data WHERE patient_id=$userid ORDER BY created_at DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Symptom Checker</title>
<style>
body { font-family: Arial, sans-serif; background: #f5f5f5; margin:0; padding:0; }
.container { width:90%; max-width:800px; margin:40px auto; background:#fff; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
h1 { color:#161c2d; margin-bottom:20px;}
form input[type="text"] { width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc; }
form input[type="submit"], form button { background:#396df0; color:white; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; margin-right:10px;}
form input[type="submit"]:hover, form button:hover { background:#2f5acb;}
.symptom-result { margin-top:20px; padding:15px; background:#f8f8f8; border-radius:6px; }
.symptom-result .item { padding:5px 0; border-bottom:1px solid #ddd;}
.message { margin-bottom: 15px; color: green; font-weight: bold;}
</style>
</head>
<body>

<div class="container">
<h1>Symptom Checker</h1>

<?php if(isset($message)) echo "<div class='message'>$message</div>"; ?>

<form method="post" action="">
    <input type="text" name="symptoms" placeholder="Enter symptom here">
    <input type="submit" name="submit_symptom" value="Add Symptom">
    <button type="submit" name="delete_data">Delete All Symptoms</button>
</form>

<div class="symptom-result">
    <h3>Your Symptoms</h3>
    <?php
    if($symptoms->num_rows == 0){
        echo "<p>No symptoms added yet.</p>";
    } else {
        while($row = $symptoms->fetch_assoc()){
            echo "<div class='item'>".$row['symptom']." <span style='font-size:12px;color:#999;'>(".$row['created_at'].")</span></div>";
        }
    }
    ?>
</div>
</div>

</body>
</html> -->

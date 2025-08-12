<?php
session_start();
require 'db.php'; // Using mysql_* connection

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // assuming you're using md5 hashing

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysql_query($query);

    if (mysql_num_rows($result) == 1) {
        $user = mysql_fetch_assoc($result);

        // Store user info in session
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['dept'] = $user['विभाग_नाव'];
        $_SESSION['taluka'] = $user['तालुका_नाव'];

        // Role-based redirection
        if ($user['role'] === 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($user['role'] === 'department') {
            switch ($user['username']) {
                case 'krushi_user':
                    header("Location: krushi_vibhag_dashboard.php");
                    break;
					
				case 'mahrashtrajivnonnti_user':
                    header("Location: mahrashtrajivnonnti_dashboard.php");
                    break;
                case 'shikshan_user':
                    header("Location: shikshan_dashboard.php");
                    break;
                case 'arogya_user':
                    header("Location: arogya_dashboard.php");
                    break;
				case 'jilhagraminvikas_user':
                    header("Location: jilhagraminvikas_dashboard.php");
                    break;
                case 'grampanchayat_user':
                    header("Location: grampanchayat_dashboard.php");
                    break;
                case 'panipurvatha_user':
                    header("Location: panipurvatha_dashboard.php");
                    break;
				case 'mahilabalkalyan_user':
                    header("Location: mahilabalkalyan_dashboard.php");
                    break;
                
                case 'samajkalyan_user':
                    header("Location: samajkalyan_dashboard.php");
                    break;
                case 'mahsul_user':
                    header("Location: mahsul_dashboard.php");
                    break;
				case 'bandhkam1_user':
                    header("Location: bandhkam1_dashboard.php");
                    break;
				case 'bandhkam2_user':
                    header("Location: bandhkam2_dashboard.php");
                    break;
				case 'sampurnswachta_user':
                    header("Location: sampurnswachta_dashboard.php");
                    break;
				case 'laghupathbandhar_user':
                    header("Location: laghupathbandhar_dashboard.php");
                    break;
				case 'samanyaprashasan_user':
                    header("Location: samanyaprashasan_dashboard.php");
                    break;
				case 'arth_user':
                    header("Location: arth_dashboard.php");
                    break;
					
                case 'pashusanvardhan_user':
                    header("Location: pashusanvardhan_dashboard.php");
                    break;
                default:
                    header("Location: department_dashboard.php");
            }
        } elseif ($user['role'] === 'taluka') {
            $taluka = strtolower(str_replace(' ', '_', $user['तालुका_नाव']));
            header("Location: taluka_dashboards/{$taluka}_dashboard.php");
        } else {
            $error = "Invalid role.";
        }
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>लॉगिन - MIS रिपोर्ट सिस्टम</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Noto Sans Devanagari', 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      text-align: center;
      padding-top: 100px;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 30px;
    }

    form {
      background-color: #fff;
      padding: 30px;
      max-width: 400px;
      margin: 0 auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="submit"], .back-btn {
      background-color: #2c3e50;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 5px;
      text-decoration: none;
      display: inline-block;
      transition: 0.3s;
    }

    input[type="submit"]:hover,
    .back-btn:hover {
      background-color: #34495e;
    }

    .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <h2>लॉगिन</h2>

  <form method="post">
    <label>वापरकर्ता नाव (Username):</label>
    <input type="text" name="username" required>

    <label>पासवर्ड (Password):</label>
    <input type="password" name="password" required>

    <input type="submit" value="लॉगिन">
    <a href="index.php" class="back-btn">मागे जा</a>

    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
  </form>

</body>
</html>

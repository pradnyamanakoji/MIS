<?php
session_start();
?>

<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>MIS Report System</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Noto Sans Devanagari', 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
    }

    .navbar {
      background-color: #2c3e50;
      padding: 20px;
      color: white;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .content {
      padding: 60px 20px;
      text-align: center;
    }

    h1 {
      margin-bottom: 50px;
      color: #333;
    }

    .button {
      display: block;
      width: 250px;
      padding: 15px;
      margin: 15px auto;
      background-color: #2c3e50;
      color: white;
      font-size: 18px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
      transition: 0.3s;
    }

    .button:hover {
      background-color: #34495e;
    }

    .footer {
      margin-top: 60px;
      background-color: #2c3e50;
      color: white;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="navbar">जिल्हा परिषद सोलापूर - MIS रिपोर्ट प्रणाली</div>

  <div class="content">
    <h1>MIS रिपोर्ट प्रणाली</h1>
    <a href="login.php" class="button">लॉगिन</a>
  </div>

 
</body>
</html>

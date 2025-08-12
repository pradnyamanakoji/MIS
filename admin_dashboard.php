<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
echo "<h2>Welcome Admin: " . $_SESSION['user'] . "</h2>";
?>

<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Noto Sans Devanagari', 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      padding: 40px;
      text-align: center;
    }

    h3 {
      color: #2c3e50;
      margin-top: 50px;
      margin-bottom: 20px;
    }

    .button-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 15px;
      max-width: 1000px;
      margin: 20px auto;
    }

    .button {
      padding: 15px;
      background-color: #2c3e50;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
      transition: 0.3s;
    }

    .button:hover {
      background-color: #34495e;
    }

    .logout-wrapper {
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <h3>🌐 जिल्हा परिषद विभाग (ZP Departments)</h3>
  <div class="button-grid">
    <a href="#" class="button">आरोग्य विभाग</a>
    <a href="#" class="button">शिक्षण विभाग</a>
    <a href="#" class="button">ग्रामपंचायत विभाग</a>
    <a href="#" class="button">पाणीपुरवठा विभाग</a>
    <a href="#" class="button">बांधकाम विभाग</a>
    <a href="krushi_vibhag_dashboard.php" class="button">कृषी विभाग</a>
    <a href="#" class="button">समाजकल्याण विभाग</a>
    <a href="#" class="button">महसूल विभाग</a>
    <a href="#" class="button">पशुसंवर्धन विभाग</a>
    <a href="#" class="button">महिला व बालकल्याण विभाग</a>
    <a href="#" class="button">जिल्हा ग्रामविकास यंत्रणा</a>
    <a href="#" class="button">अन्न व औषध प्रशासन</a>
    <a href="#" class="button">जलसंधारण विभाग</a>
    <a href="#" class="button">रोजगार हमी योजना</a>
    <a href="#" class="button">जिल्हा नियोजन विभाग</a>
    <a href="#" class="button">माहिती तंत्रज्ञान विभाग</a>
    <a href="#" class="button">लेखा विभाग</a>
    <a href="#" class="button">स्थापत्य विभाग</a>
  </div>

  <h3>📍 सोलापूर तालुके (Solapur Talukas)</h3>
  <div class="button-grid">
    <a href="#" class="button">सोलापूर उत्तर</a>
    <a href="#" class="button">सोलापूर दक्षिण</a>
    <a href="#" class="button">अक्कलकोट</a>
    <a href="#" class="button">बार्शी</a>
    <a href="#" class="button">मंगळवेढा</a>
    <a href="#" class="button">पंढरपूर</a>
    <a href="#" class="button">माळशिरस</a>
    <a href="#" class="button">सांगोला</a>
    <a href="#" class="button">मोहोळ</a>
    <a href="#" class="button">करमाळा</a>
    <a href="#" class="button">माढा</a>
  </div>

  <div class="logout-wrapper">
    <a href="logout.php" class="button">लॉगआउट</a>
  </div>

</body>
</html>

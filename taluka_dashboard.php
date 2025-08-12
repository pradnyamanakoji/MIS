<?php
session_start();
if ($_SESSION['role'] != 'taluka') {
    header("Location: login.php");
    exit();
}
echo "<h2>Welcome Taluka User: " . $_SESSION['user'] . "</h2>";
echo "<p>Taluka: " . $_SESSION['taluka'] . "</p>";
?>

<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>Taluka Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Noto Sans Devanagari', 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      padding: 40px;
      text-align: center;
    }

    .button-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 15px;
      max-width: 900px;
      margin: 40px auto 0;
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

  <div class="button-grid">
    <a href="pending_retirement_cases.php" class="button">प्रलंबित सेवानिवृत्त प्रकरणांच</a>
    <a href="#" class="button">तालुकानिहाय यादी</a>
    <a href="#" class="button">प्रलंबित कुटूंब निवृत्तीवेतन प्</a>
    <a href="#" class="button">प्रलंबित कुटूंब निवृत्ती वेतन प</a>
    <a href="#" class="button">कुटुंब निवृत्ती वेतन तालुकानिहा</a>
    <a href="#" class="button">अगामी सहा महिने से.नि.प्रकरणे</a>
    <a href="#" class="button">विभागीय चौकशी</a>
    <a href="#" class="button">जिल्हा परिषद करमचा-यांच्या चौकश</a>
    <a href="#" class="button">अनाधिकृत गैरहजर कर्मचा-याबाबतची</a>
    <a href="#" class="button">जिल्हा परिषदांकडील निलंबीत कर्म</a>
    <a href="#" class="button">मा.आयुक्त तपासणी विभागाकडील निव</a>
    <a href="#" class="button">मा. आयुक्त तपासणी पंचायत समितीक</a>
    <a href="#" class="button">प्रलंबित लोकआयुक्तउपलोकआयुक्त प</a>
    <a href="#" class="button">न्यायालयीन प्रकरणांबाबतची माहित</a>
  </div>

  <div class="logout-wrapper">
    <a href="logout.php" class="button">लॉगआउट</a>
  </div>

</body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>Department Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Noto Sans Devanagari', 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      padding: 40px;
      text-align: center;
    }

    h1 {
      color: #2c3e50;
      margin-bottom: 10px;
    }

    .welcome {
      margin-top: 10px;
      font-size: 18px;
      color: #34495e;
    }

    .button-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 15px;
      max-width: 1000px;
      margin: 40px auto;
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

  <h1>संपूर्ण स्वच्छता अभियान विभाग</h1>
  <div class="welcome">
    <p>Welcome Department User: <strong><?= $_SESSION['user'] ?></strong></p>
    <p>Department: <strong><?= $_SESSION['dept'] ?></strong></p>
  </div>

  <div class="button-grid">
    <a href="sbm_expenditure.php" class="button">SBM-Expenditure</a>
    <a href="sbm_ihhl.php" class="button">SBM-IHHL</a>
    <a href="sbm_slwm_work_order.php" class="button">SBM-SLWM Work Order</a>
    <a href="sbm_slwm.php" class="button">SBM-SLWM</a>
    <a href="sbm_csc.php" class="button">SBM-CSC</a>
    <a href="sbm_odf_plus.php" class="button">SBM-ODF Plus</a>
    <a href="sbm_citizen_application.php" class="button">SBM-Citizen Application</a>
    <a href="sbm_plastic_waste.php" class="button">SBM-Plastic Waste Management</a>
    <a href="sbm_gobardhan.php" class="button">SBM-Gobardhan</a>
    <a href="sbm_fstp.php" class="button">SBM-FSTP</a>
    <a href="water_quality.php" class="button">Water Quality</a>
    <a href="sbm_jjm_difference.php" class="button">SBM JJM Difference</a>
  </div>

  <div class="logout-wrapper">
    <a href="logout.php" class="button">लॉगआउट</a>
  </div>

</body>
</html>
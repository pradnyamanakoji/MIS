<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>लघुपाटबंधारे विभाग</title>
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
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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

  <h1>लघुपाटबंधारे विभाग</h1>

  <div class="welcome">
    <p>Welcome Department User: <strong>DemoUser</strong></p>
    <p>Department: <strong>Laghupatbandhare</strong></p>
  </div>

  <div class="button-grid">
    <a href="abs.php" class="button">Abs</a>
    <a href="dpc1.php" class="button">DPC 1</a>
    <a href="dpc2.php" class="button">DPC 2</a>
    <a href="zp_cess_1.php" class="button">ZP Cess 1</a>
    <a href="zp_cess_2.php" class="button">ZP Cess 2</a>
    <a href="aby.php" class="button">ABY</a>
    <a href="jsa_2_0.php" class="button">JSA 2.0</a>
    <a href="gdgs.php" class="button">GDGS</a>
  </div>

  <div class="logout-wrapper">
    <a href="logout.php" class="button">लॉगआउट</a>
  </div>

</body>
</html>
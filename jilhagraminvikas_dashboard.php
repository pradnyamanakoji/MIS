<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'admin';
}
?>

<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>जिल्हा ग्रामीण विकास यंत्रणा डॅशबोर्ड</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: url('bg-image.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
    }

    .main-heading {
      text-align: center;
      margin: 40px 20px 20px;
      font-size: 28px;
      font-weight: bold;
      color: #000;
    }

    .container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      padding: 40px 20px;
      max-width: 1000px;
      margin: auto;
    }

    .btn {
      background-color: rgba(0, 0, 0, 0.85);
      color: white;
      width: 100%;
      height: 70px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      text-transform: uppercase;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background-color: black;
      transform: scale(1.05);
    }

    .form-section {
      display: none;
      padding: 30px;
      margin: 20px auto;
      max-width: 1000px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #ddd;
    }

    input[type="text"] {
      width: 100%;
      padding: 6px;
      box-sizing: border-box;
    }

    .btn-submit {
      margin-top: 20px;
      padding: 10px 20px;
      background: #000;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .btn-submit:hover {
      background: #444;
    }

    /* ✅ Logout Button Styling */
    .logout-container {
      text-align: center;
      margin-top: 30px;
      margin-bottom: 40px;
    }

    .logout-btn {
      padding: 12px 24px;
      background-color: #000000;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
      background-color: #000000;
    }
	
  </style>
</head>
<body>

<h2 class="main-heading">जिल्हा ग्रामीण विकास यंत्रणा विभाग</h2>

<div class="container">
<a class="btn" href="DRDA-PMAY-G-JGV.php" target="_blank">DRDA-PMAY-G</a>
<a class="btn" href="PMAY-2024-25-JGV.php" target="_blank">PMAY 2024-25</a>


<a class="btn" href="delayed-house-JGV.php" target="_blank">Delayed Houses</a>
<a class="btn" href="DRDA-RAMAI-JGV.php" target="_blank">DRDA-RAMAI</a>

<a class="btn" href="DRDA-MODIAAWAS-JGV.php" target="_blank">DRDA-MODIAAWAS</a>

<a class="btn" href="DRDA-SHABRI-JGV.php" target="_blank">DRDA-SHABRI</a>

 <a class="btn" href="DRDA-PARDHI-JGV.php" target="_blank">DRDA-PARDHI</a>
 
  <a class="btn" href="DRDA-YASHWANT-JGV.php" target="_blank">DRDA-YASHWANT</a>

  <a class="btn" href="DRDA-ATAL-JGV.php" target="_blank">DRDA-ATAL</a>

  <a class="btn" href="DRDA-PUNYSHOK-JGV.php" target="_blank">DRDA-PUNYSHOK</a>
  
<a class="btn" href="PENDING REFERENCES-JGV.php" target="_blank">PENDING REFERENCES</a>
  
 
  
 
</div>

<!-- ✅ Logout Button -->
<div class="logout-container">
  <form action="logout.php" method="post">
    <button type="submit" class="logout-btn">लॉग आउट</button>
  </form>
</div>

<script>
  function showForm(id) {
    const sections = document.querySelectorAll('.form-section');
    sections.forEach(section => section.style.display = 'none');
    const target = document.getElementById(id);
    if (target) {
      target.style.display = 'block';
      window.scrollTo({ top: target.offsetTop, behavior: 'smooth' });
    }
  }

  function showDiv(id) {
    showForm(id);
  }
</script>

</body>
</html>

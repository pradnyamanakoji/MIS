
<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>Department Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
  font-family: "Marathi Interface", "SF Pro Display", "Mukta", "Lohit Marathi", "sans-serif";
      background-color: #f4f6f9;
      padding: 40px;
      text-align: center;
    }
	h2 {
  font-family: "Marathi Interface", "SF Pro Display", "Mukta", "Lohit Marathi", "sans-serif";
  font-size: 28px;
  font-weight: 600;
  color: #333333;
  text-align: center;
  letter-spacing: 0.5px;
  padding: 10px 0;
  margin: 20px auto;
  width: fit-content;
  padding-left: 20px;
  padding-right: 20px;
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
<h2>ग्रामीण पाणी पुरवठा विभाग</h2>
  <div class="button-grid">
  
    <a href="jal_jivan.php" class="button">जल जीवन मिशन</a>
    <a href="tanchai.php" class="button">टंचाई निवारणार्थ घेतलेल्या उपाय योजनांचा प्रगती अहवाल	</a>
    <a href="jjm8.php" class="button">Status of Works Retrofitting</a>
    <a href="jjm7.php" class="button">Schemes Physical & Financial Progress Report</a>
    <a href="#" class="button">20% खर्च पंचायत समिती स्तर</a>
    <a href="#" class="button">15 %  मागासवर्गीय खर्च ग्रामपंचायत स्तर</a>
    <a href="#" class="button">20% मागास वर्गीय खर्च जिल्हा परिषद स्तर	</a>
	    <a href="#" class="button">अनुसूचित जाती क्षेत्र सुधार योजना- भौतिक प्रगती अहवाल</a>

  </div>

  <div class="logout-wrapper">
    <a href="logout.php" class="button">लॉगआउट</a>
  </div>

</body>
</html>

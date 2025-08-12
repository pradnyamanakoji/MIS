<?php
// ग्रामपंचायत विभागाच्या Excel शीट नावे (buttons साठी)
$sheet_names = [
  "index", "घरपट्टी", "पानिपट्टी", "कारखाना वसूली", "5% दिव्यांग", "jansuvidha", "अल्पसंख्याक",
  "नागरी", "तीर्थ", "dpc तरतूद", "15 th FFC", "मनुष्यदिन", "अपूर्ण कामे", "कामांना भेटी",
  "आधार सीडिंग", "मंजूरी सध्या", "परिच्छेद अनुपालन", "स्थानिक लेखा", "Sheet57", "prc",
  "मालमत्ता", "कोर्ट kes", "RTS", "online complaint", "rgsa",
  "मा. बाळासाहेब ठाकरे  gp इमारत", "मा. बाळासाहेब ठाकरे  139", "मा. बाळासाहेब ठाकरे  139 Abs",
  "lokayukt", "Sheet56"
];
?>

<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>ग्रामपंचायत विभाग डॅशबोर्ड</title>

  <!-- Google Fonts for Marathi -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Noto Sans Devanagari', sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
      text-align: center;
    }

    h1 {
      color: #2c3e50;
      font-size: 32px;
      margin-bottom: 30px;
    }

    .dashboard {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
    }

    .dashboard form {
      margin: 0;
    }

    .dashboard button {
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 12px 20px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
      min-width: 220px;
    }

    .dashboard button:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>

  <h1>ग्रामपंचायत विभाग डॅशबोर्ड</h1>

  <div class="dashboard">
    <?php foreach ($sheet_names as $sheet): ?>
      <form method="get" action="sheet_display.php">
        <input type="hidden" name="sheet" value="<?= htmlspecialchars($sheet) ?>">
        <button type="submit"><?= htmlspecialchars($sheet) ?></button>
      </form>
    <?php endforeach; ?>
  </div>

</body>
</html>
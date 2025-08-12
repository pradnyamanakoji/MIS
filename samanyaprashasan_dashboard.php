<?php
// सामान्य प्रशासन विभागाच्या Excel शीट नावे (buttons साठी)
$sheet_names = [
  "सेवानिवृत्त प्रकरणे",
  "प्रलंबित सेवानिवृत्त प्रकरणांच",
  "तालुकानिहाय यादी",
  "प्रलंबित कुटूंब निवृत्तीवेतन प्",
  "प्रलंबित कुटूंब निवृत्ती वेतन प",
  "कुटुंब निवृत्ती वेतन तालुकानिहा",
  "अगामी सहा महिने से.नि.प्रकरणे",
  "अगामी सहा महिने से.नि. यादी",
  "विभागीय चौकशी",
  "जिल्हा परिषद करमचा-यांच्या चौकश",
  "अनाधिकृत गैरहजर कर्मचा-याबाबतची",
  "जिल्हा परिषदांकडील निलंबीत कर्म",
  "मा.आयुक्त तपासणी विभागाकडील निव",
  "मा. आयुक्त तपासणी पंचायत समितीक",
  "प्रलंबित लोकआयुक्तउपलोकआयुक्त प",
  "न्यायालयीन प्रकरणांबाबतची माहित"
];
?>

<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <title>सामान्य प्रशासन विभाग डॅशबोर्ड</title>

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

  <h1>सामान्य प्रशासन विभाग डॅशबोर्ड</h1>

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
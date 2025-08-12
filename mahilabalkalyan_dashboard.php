<?php
session_start();
require_once "db.php"; // This uses mysql_connect()




// Department specific buttons
$department_buttons = [
    'MBK - ZP 10%',
    'MBK - ZP 10% 23.24',
    'MBK-PS10%',
    'AWCconstruction',
    'poshantracker',
    'ICDS - Survey 0-5',
    'ICDS-PoshanAahar',
    'ICDS -Waight',
    'ICDS -0-6Health',
    'ICDS-3%Exp',
    'ICDSAWCInformation'
];
?>

<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8" />
    <title>Mahila Balkalyan Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans Devanagari', sans-serif;
            background: linear-gradient(to bottom right, #e0f7fa, #e1bee7);
            color: #333;
        }

        h1 {
            text-align: center;
            margin: 40px 0 30px;
            color: #4a148c;
            font-size: 2.2rem;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            background-color: #ff6b6b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .logout-btn:hover {
            background-color: #e53935;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .department-title {
            text-align: center;
            font-size: 1.8rem;
            color: #512da8;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #9575cd;
        }

        .buttons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .dashboard-btn {
            background: #000000ff;
            border: none;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            font-size: 1.1rem;
            font-weight: bold;
            color: #f3ededff;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4px);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100px;
            
        }

        .dashboard-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
            background: #ffffffe6;
        }

        .dashboard-btn:active {
            transform: translateY(1px);
        }

        .upload-section {
            background: #ffffffcc;
            border-radius: 16px;
            padding: 25px 30px;
            margin-top: 40px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            backdrop-filter: blur(4px);
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #512da8;
            margin-bottom: 20px;
            border-bottom: 2px solid #9575cd;
            padding-bottom: 6px;
        }

        .upload-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group label {
            font-weight: bold;
            color: #6a1b9a;
        }

        .form-control {
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        .submit-btn {
            background: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: #388e3c;
        }
    </style>
</head>
<body>
    <h1>स्वागत आहे</h1>
    <a href="logout.php" class="logout-btn" onclick="return confirm('आपण लॉगआउट करणार आहात का?')">Logout</a>

    <div class="dashboard-container">
        <div class="department-title">महिला बालकल्याण विभाग</div>
        
        <div class="buttons-grid">
            <?php foreach ($department_buttons as $button): ?>
                <button class="dashboard-btn" onclick="openForm('<?= htmlspecialchars($button) ?>')">
                    <?= htmlspecialchars($button) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="upload-section" id="uploadSection" style="display: none;">
            <div class="section-title" id="formTitle">Upload Form</div>
            <form class="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="selectedForm" name="form_type">
                
                <div class="form-group">
                    <label for="excelFile">Excel फाइल निवडा:</label>
                    <input type="file" id="excelFile" name="excel_file" class="form-control" accept=".xlsx,.xls" required>
                </div>
                
                <div class="form-group">
                    <label for="uploadDate">तारीख:</label>
                    <input type="date" id="uploadDate" name="upload_date" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="remarks">टिप्पणी (वैकल्पिक):</label>
                    <textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
                </div>
                
                <button type="submit" class="submit-btn">अपलोड करा</button>
            </form>
        </div>
    </div>

    <script>
        function openForm(formName) {
            document.getElementById('uploadSection').style.display = 'block';
            document.getElementById('formTitle').textContent = formName + ' - अपलोड फॉर्म';
            document.getElementById('selectedForm').value = formName;
            
            // Scroll to the form
            document.getElementById('uploadSection').scrollIntoView({
                behavior: 'smooth'
            });
            
            // Set today's date as default
            const today = new Date();
            const formattedDate = today.toISOString().substr(0, 10);
            document.getElementById('uploadDate').value = formattedDate;
        }
    </script>
</body>
</html>
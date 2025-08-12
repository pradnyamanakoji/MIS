<?php
session_start();
require_once "db.php"; // This uses mysql_connect()

// Get users under the department

?>

<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8" />
    <title>पशुसंवर्धन विभाग डॅशबोर्ड</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans Devanagari', sans-serif;
            background: white;
            color: #333;
            padding-bottom: 80px; /* Space for bottom button */
        }

        .dashboard-header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 40px;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
        }

        .department-title {
            font-size: 1.8rem;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin: 30px 0 20px;
            background: white;
            font-size: 2rem;
        }

        .logout-btn {
           
            top: 30px;
            right: 30px;
            background-color: #000000ff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border: none;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #0a0a0aff;
        }

        .user-section {
            max-width: 960px;
            margin: 0 auto 30px;
            background: #ffffffcc;
            border-radius: 16px;
            padding: 25px 30px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            backdrop-filter: blur(4px);
            border: 1px solid #d7bde2;
        }

        .user-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
            padding-bottom: 6px;
        }

        .action-btn {
            padding: 8px 14px;
            margin: 0 4px;
            border: none;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .action-btn.download-btn {
            background: #4caf50;
            color: white;
        }

        .action-btn.delete-btn {
            background: #ef5350;
            color: white;
        }

        .action-btn:hover {
            opacity: 0.9;
        }

        .close-btn {
            float: right;
            border: none;
            background: #f44336;
            color: white;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            font-weight: bold;
            cursor: pointer;
        }

        .anihus-bottom-btn {
            
            bottom: 20px;
            right: 20px;
            background-color: #000000;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            font-weight: bold;
            z-index: 100;
        }

        .anihus-bottom-btn:hover {
            background-color: #333333;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <div class="department-title">पशुसंवर्धन विभाग</div>
    </div>

    <h1>स्वागत आहे</h1>

    <center><button class="anihus-bottom-btn" onclick="window.location.href='sheet1_pashu.php'">Anihus</button></center>
    <br>
    <br>
    <center><button class="logout-btn" onclick="window.location.href='logout.php'" >लॉगआउट</button></center>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        // You can add your JavaScript code here if needed
    </script>
</body>
</html>
<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <title>   समाज कल्याण विभाग डॅशबोर्ड
</title>
    <style>
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            text-align: center;
            background-color: #404040;
            color: white;
            padding: 25px 10px;
            font-size: 28px;
            margin: 0;
            position: relative;
        }

        .logout-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: #cc0000;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #a30000;
        }

        .main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        .sidebar {
            width: 280px;
            background-color: #e0e0e0;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
        }

        .button {
            width: 100%;
            height: 50px;
            padding: 10px;
            font-size: 15px;
            font-weight: 600;
            background-color: #bfbfbf;
            color: #000;
            border: 1px solid #a0a0a0;
            border-radius: 8px;
            box-shadow: 1px 1px 4px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .button:hover {
            background-color: #a6a6a6;
            transform: scale(1.02);
        }

        .content {
            flex: 1;
            padding: 0;
            background-color: #f9f9f9;
            overflow: hidden;
        }

        .content iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            padding: 15px;
            background-color: #f0f0f0;
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }

            .button {
                width: 45%;
                margin: 5px;
            }

            .content {
                height: 70vh;
            }
        }

        @media (max-width: 500px) {
            .button {
                width: 90%;
            }
        }
    </style>

    <script>
        function loadPage(page) {
            document.getElementById('contentFrame').src = page;
        }
    </script>
</head>
<body>

<h1>
   समाज कल्याण विभाग डॅशबोर्ड
    <form action="logout.php" method="post" style="display:inline;">
        <button type="submit" class="logout-btn">लॉगआउट</button>
    </form>
</h1>

<div class="main-container">
    <div class="sidebar">
        <button class="button" onclick="loadPage('fund_report5_sk.php')">१. अपंगांवरील खर्च  ग्रामपंचायत स्तर</button>
        <button class="button" onclick="loadPage('fund_report4_sk.php')">२. अपंगांवरील खर्च पंचायत समिति स्तर</button>
        <button class="button" onclick="loadPage('fund_report3_sk.php')">३. अपंगांवरील खर्च जिल्हा परिषद स्तर</button>
        <button class="button" onclick="loadPage('fund_report1_sk.php')">४. विभागांतर्गत खर्च पंचायत समिती स्तर</button>
        <button class="button" onclick="loadPage('fund_report2_sk.php')">५. मागासवर्गीय खर्च ग्रामपंचायत स्तर</button>
        <button class="button" onclick="loadPage('fund_report_sk.php')">६. मागास वर्गीय खर्च जिल्हा परिषद स्तर</button>
        <button class="button" onclick="loadPage('fund_report6_sk.php')">७. अनुसूचित जाती क्षेत्र सुधार - आर्थिक</button>
        <button class="button" onclick="loadPage('progress_report_sk.php')">८. अनुसूचित जाती क्षेत्र सुधार - भौतिक</button>
    </div>

    <div class="content">
        <iframe id="contentFrame" src="welcome.php"></iframe>
    </div>
</div>

<div class="footer">
    © २०२५ समाज कल्याण विभाग, जिल्हा परिषद
</div>

</body>
</html>
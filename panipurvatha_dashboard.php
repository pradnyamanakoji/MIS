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
    <title>आरोग्य विभाग डॅशबोर्ड</title>
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
    ग्रामीण पाणी पुरवठा विभाग डॅशबोर्ड
    <form action="logout.php" method="post" style="display:inline;">
        <button type="submit" class="logout-btn">लॉगआउट</button>
    </form>
</h1>

<div class="main-container">
    <div class="sidebar">
        <button class="button" onclick="loadPage('jal_jivan_gpp.php')">१. जल जीवन मिशन</button>
        <button class="button" onclick="loadPage('tanchai_gpp.php')">२. टंचाई निवारणार्थ घेतलेल्या उपाय योजनांचा प्रगती अहवाल</button>
        <button class="button" onclick="loadPage('jjm8_gpp.php')">३. Status of Works Retrofitting</button>
        <button class="button" onclick="loadPage('jjm7_gpp.php')">४. Schemes Physical & Financial Progress Report</button>
        <button class="button" onclick="loadPage('AAPha1_gpp.php')">५. टंचाई निवारणार्थ उपाय येाजना व खर्च कालावधी ऑक्टोंबर 2023 ते डिसेंबर 2023</button>
        <button class="button" onclick="loadPage('AAPha3_gpp.php')">६. टंचाई निवारणार्थ उपाय येाजना व खर्च कालावधी एप्रिल - 2024 ते जून - 2024</button>
        <button class="button" onclick="loadPage('scarecity_gpp.php')">७. टंचाई निवारणार्थ उपाय येाजना व खर्च कालावधी ऑक्टोंबर -2023 ते जून - 2024</button>
        <button class="button" onclick="loadPage('AAPha2_gpp.php')">८. टंचाई निवारणार्थ उपाय येाजना व खर्च कालावधी जानेवारी -2024 ते मार्च 2024</button>
    </div>

    <div class="content">
        <iframe id="contentFrame" src="welcome.php"></iframe>
    </div>
</div>

<div class="footer">
    © २०२५ ग्रामीण पाणी पुरवठाc विभाग, जिल्हा परिषद
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <title>कृषी विभाग डॅशबोर्ड</title>
    <style>
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
            background-color: #e6f2e6;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #2e7d32;
            color: white;
            margin: 0;
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
        }

        .button {
            padding: 15px 30px;
            margin: 15px;
            font-size: 18px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 300px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #388e3c;
        }

        .footer {
            margin-top: 100px;
            text-align: center;
            color: gray;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>कृषी विभाग डॅशबोर्ड</h1>

<div class="dashboard">
    <!-- Agri Biogas Form -->
    <form action="form1.php" method="get">
        <button type="submit" class="button">Agri-Biogas</button>
    </form>

    <!-- Agri DBAKSY Form -->
    <form action="form2.php" method="get">
        <button type="submit" class="button">Agri-DBAKSY</button>
    </form>

    <!-- Agri BMKKY Form -->
    <form action="form3.php" method="get">
        <button type="submit" class="button">Agri-BMKKY</button>
    </form>
</div>

<div class="footer">
    © 2025 कृषी विभाग, जिल्हा परिषद
</div>

</body>
</html>
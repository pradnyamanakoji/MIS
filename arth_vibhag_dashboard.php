<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <title>arth vibhag डॅशबोर्ड</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Devanagari', 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50; /* Dark blue-gray */
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
            background-color: #2c3e50; /* Blue-gray */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 300px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #34495e; /* Darker blue-gray */
        }

        .logout-wrapper {
            margin: 60px auto 20px;
            text-align: center;
        }

        .logout-wrapper a {
            display: inline-block;
            background-color: #2c3e50; /* Match other buttons */
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 18px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .logout-wrapper a:hover {
            background-color: #34495e; /* Match hover of other buttons */
        }

        .footer {
            margin-top: 30px;
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

<!-- Logout button styled like other buttons -->
<div class="logout-wrapper">
    <a href="?logout=true">बाहेर पडा</a>
</div>

<div class="footer">
    © 2025 कृषी विभाग, जिल्हा परिषद
</div>

</body>
</html>

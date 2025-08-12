<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <title>ZP विभाग</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin: 40px 0 20px 0;
            font-size: 28px;
        }

        .btn-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 80%;
            max-width: 900px;
            margin-bottom: 40px;
        }

        .zp-btn {
            background-color: #00264d;
            color: white;
            padding: 15px 10px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }

        .zp-btn:hover {
            background-color: #004080;
        }

        .logout-container {
            margin-bottom: 20px;
        }

        .logout-btn {
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

    <h2>जिल्हा परिषद विभाग (ZP Departments)</h2>

    <div class="btn-container">
        <button class="zp-btn">index</button>
        <button class="zp-btn">MSRLM1-Target 1</button>
        <button class="zp-btn">कृषी विभाग</button>
        <button class="zp-btn">जलसंधारण विभाग</button>
        <button class="zp-btn">महिला व बालकल्याण विभाग</button>
        <button class="zp-btn">पाणीपुरवठा विभाग</button>
    </div>

    <div class="logout-container">
        <button class="logout-btn"><a href="logout.php">Logout</a></button>
    </div>

</body>
</html>

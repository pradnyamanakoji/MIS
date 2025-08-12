<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>विभाग डॅशबोर्ड | ZP Solapur</title>
    <link rel="icon" href="favicon.png">
    <style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2980b9;
        --accent-color: #e74c3c;
        --light-bg: #f8f9fa;
        --dark-text: #2c3e50;
        --light-text: #ecf0f1;
        --border-color: #ddd;
        --success-color: #27ae60;
        --warning-color: #f39c12;
        --danger-color: #e74c3c;
    }

    body {
        font-family: 'Segoe UI', 'Nirmala UI', 'Arial Unicode MS', sans-serif;
        background-color: var(--light-bg);
        color: var(--dark-text);
        padding: 20px;
        line-height: 1.6;
    }

    h2, h3 {
        color: var(--primary-color);
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--border-color);
    }

    .user-info {
        background-color: white;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
        box-shadow: 0 2px 3px rgba(0,0,0,0.1);
        text-align: center;
        border: 1px solid var(--border-color);
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 15px;
        margin: 20px 0;
    }

    .dashboard-btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 15px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;
    }

    .dashboard-btn:hover {
        background-color: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .logout-btn {
        background-color: var(--danger-color);
        color: white;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        margin: 30px auto;
        transition: all 0.3s;
    }

    .logout-btn:hover {
        background-color: #c0392b;
    }

    @media (max-width: 768px) {
        body {
            padding: 10px;
        }
        .button-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>
<body>

<div class="user-info">
    <h2>Welcome Department User</h2>
    <p>Department: Education</p>
</div>

<div class="button-grid">
    <a href="form_1.php" class="dashboard-btn" role="button" aria-label="Form 1">01. जि.प. सैस योजना 2024-25</a>
    <a href="form_2.php" class="dashboard-btn" role="button" aria-label="Form 2">02. जिल्हा वार्षिक योजना 2024-25</a>
    <a href="form_3.php" class="dashboard-btn" role="button" aria-label="Form 3">03. नवीन शाळा, धोकादायक शाळा दुरुस्ती</a>
    <a href="form_4.php" class="dashboard-btn" role="button" aria-label="Form 4.1">04.1 समय शिक्षा बंधकम प्रगती अहवाल</a>
    <a href="form_5.php" class="dashboard-btn" role="button" aria-label="Form 4.2">04.2 समय शिक्षा (सर्व शिक्षा अभियान)</a>
    <a href="form_6.php" class="dashboard-btn" role="button" aria-label="Form 4.3">04.3 समय शिक्षा PM SHRI</a>
    <a href="form_7.php" class="dashboard-btn" role="button" aria-label="Form 5">भौतिक सुविधा माहिती</a>
    <a href="form_8.php" class="dashboard-btn" role="button" aria-label="Form 6.1">06.1 राष्ट्रीय महामार्ग बाधित शाळा</a>
    <a href="form_9.php" class="dashboard-btn" role="button" aria-label="Form 6.2">06.2 राष्ट्रीय महामार्ग शाळा माहिती</a>
    <a href="form10.php" class="dashboard-btn" role="button" aria-label="Form 7">आरटीई 25% प्रतिपुर्ती माहिती</a>
    <a href="form11.php" class="dashboard-btn" role="button" aria-label="Form 8">भाषा स्तर निश्चिती फॉर्म</a>
    <a href="form12.php" class="dashboard-btn" role="button" aria-label="Form 9">गणित स्तर निश्चिती फॉर्म</a>
    <a href="form13.php" class="dashboard-btn" role="button" aria-label="Form 10">पोषणशक्ती निर्माण योजना खर्च</a>
    <a href="form14.php" class="dashboard-btn" role="button" aria-label="Form 11">प्रलंबित न्यायालयीन प्रकरणे</a>
    <a href="form15.php" class="dashboard-btn" role="button" aria-label="Form 12">आमदार खासदार संदर्भ</a>
    <a href="form16.php" class="dashboard-btn" role="button" aria-label="Form 13">शाळा पायाभूत सुविधा विवरण</a>
</div>

<button onclick="window.location.href='logout.php'" class="logout-btn">लॉगआउट</button>

</body>
</html>
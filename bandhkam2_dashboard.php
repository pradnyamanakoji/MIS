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
  <title>बांधकाम विभाग क्रमांक-1,2</title>
  <style>
    body {
        font-family: 'Noto Sans Devanagari', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    h1 {
        background-color: #404040;
        color: white;
        text-align: center;
        padding: 25px 10px;
        font-size: 28px;
        margin: 0;
    }

    .main-container {
        display: flex;
        flex: 1;
        overflow: hidden;
    }

    .sidebar {
        width: 250px;
        background-color: #e0e0e0;
        padding: 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        overflow-y: auto;
    }

    .sidebar a {
        display: block;
        background-color: #bfbfbf;
        padding: 12px;
        border-radius: 6px;
        text-align: center;
        font-weight: bold;
        color: black;
        text-decoration: none;
        border: 1px solid #a0a0a0;
        transition: all 0.2s ease-in-out;
    }

    .sidebar a:hover {
        background-color: #a6a6a6;
        transform: scale(1.03);
    }

    .content-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .welcome-bar {
        background-color: #d9edf7;
        color: #31708f;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 16px;
        border-bottom: 1px solid #ccc;
        position: relative;
    }

    .dept-name {
        font-weight: bold;
    }

    .username {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        font-weight: bold;
    }

    .logout-btn {
        padding: 6px 15px;
        background-color: #ff4d4d;
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
    }

    .logout-btn:hover {
        background-color: #cc0000;
    }

    .iframe-container {
        flex: 1;
        overflow: hidden;
    }

    iframe {
        width: 100%;
        height: 100%;
        border: none;
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

        .sidebar a {
            width: 48%;
            margin: 1%;
        }

        .welcome-bar {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }

        .username {
            position: static;
            transform: none;
        }
    }
  </style>
</head>
<body>

<h1>बांधकाम विभाग क्रमांक-1,2</h1>

<div class="welcome-bar">
    <div class="dept-name"><?php echo $_SESSION['dept']; ?></div>
    <div class="username">Welcome, <?php echo $_SESSION['user']; ?></div>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="main-container">
  <div class="sidebar">
<a href="works1a_cd2.php" target="contentFrame">Works1a</a>
    <a href="works1b_cd2.php" target="contentFrame">Works1b</a>
    <a href="works2_cd2.php" target="contentFrame">Works2</a>
    <a href="works3_cd2.php" target="contentFrame">Works3</a>
    <a href="works4_cd2.php" target="contentFrame">Works4</a>
    <a href="works5_cd2.php" target="contentFrame">Works5</a>
    <a href="works6_cd2.php" target="contentFrame">Works6</a>
    <a href="works7_cd2.php" target="contentFrame">Works7</a>
    <a href="works8_cd2.php" target="contentFrame">Works8</a>
    <a href="works9_cd2.php" target="contentFrame">Works9</a>
    <a href="works10_cd2.php" target="contentFrame">Works10</a>
    <a href="works11.php" target="contentFrame">Works11</a>
    <a href="works12_cd2.php" target="contentFrame">Works12</a>
    <a href="works13_cd2.php" target="contentFrame">Works13</a>
    <a href="works14_cd2.php" target="contentFrame">Works14</a>
    <a href="works2_18_9_2024_2_cd2.php" target="contentFrame">Works 2 18.9.2024</a>
  </div>

  <div class="content-area">
    <div class="iframe-container">
      <iframe name="contentFrame"></iframe>
    </div>
  </div>
</div>

</body>
</html>

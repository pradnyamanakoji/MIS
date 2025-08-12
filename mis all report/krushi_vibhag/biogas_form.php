<?php
include("config.php"); // Your DB connection

// District list
$zilla_list = [
    1 => "Akkalkot",
    2 => "Barshi",
    3 => "Mohol",
    4 => "Madha",
    5 => "North Solapur",
    6 => "South Solapur",
    7 => "Karmala",
    8 => "Malshiras",
    9 => "Mangalvedha",
    10 => "Pandharpur",
    11 => "Sangola"
];

// Fetch page header from DB
$res_header = mysql_query("SELECT setting_value FROM page_settings WHERE setting_key='page_header'");
if ($res_header && mysql_num_rows($res_header) > 0) {
    $row_header = mysql_fetch_assoc($res_header);
    $page_header = $row_header['setting_value'];
} else {
    $page_header = "Enter Biogas Development Data";
}

// Handle header text update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_header_text') {
    $new_header = mysql_real_escape_string(trim($_POST['page_header_text']));
    if ($new_header !== '') {
        $exists = mysql_query("SELECT * FROM page_settings WHERE setting_key='page_header'");
        if (mysql_num_rows($exists) > 0) {
            mysql_query("UPDATE page_settings SET setting_value='$new_header' WHERE setting_key='page_header'") or die(mysql_error());
        } else {
            mysql_query("INSERT INTO page_settings (setting_key, setting_value) VALUES ('page_header', '$new_header')") or die(mysql_error());
        }
        $page_header = $new_header;
        $header_update_message = "Page header updated successfully.";
    } else {
        $header_update_message = "Header text cannot be empty.";
    }
}

// Handle data form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'save_data') {
    $report_date = mysql_real_escape_string($_POST['report_date']);
    foreach ($zilla_list as $serial_no => $zilla_parishad) {
        // Numeric fields with default 0 if empty
        $annual_target_general = isset($_POST['annual_target_general'][$serial_no]) && $_POST['annual_target_general'][$serial_no] !== '' ? (int)$_POST['annual_target_general'][$serial_no] : 0;
        $annual_target_sc = isset($_POST['annual_target_sc'][$serial_no]) && $_POST['annual_target_sc'][$serial_no] !== '' ? (int)$_POST['annual_target_sc'][$serial_no] : 0;
        $annual_target_st = isset($_POST['annual_target_st'][$serial_no]) && $_POST['annual_target_st'][$serial_no] !== '' ? (int)$_POST['annual_target_st'][$serial_no] : 0;
        $annual_target_total = isset($_POST['annual_target_total'][$serial_no]) && $_POST['annual_target_total'][$serial_no] !== '' ? (int)$_POST['annual_target_total'][$serial_no] : 0;

        $achieved_month_general = isset($_POST['achieved_month_general'][$serial_no]) && $_POST['achieved_month_general'][$serial_no] !== '' ? (int)$_POST['achieved_month_general'][$serial_no] : 0;
        $achieved_month_sc = isset($_POST['achieved_month_sc'][$serial_no]) && $_POST['achieved_month_sc'][$serial_no] !== '' ? (int)$_POST['achieved_month_sc'][$serial_no] : 0;
        $achieved_month_st = isset($_POST['achieved_month_st'][$serial_no]) && $_POST['achieved_month_st'][$serial_no] !== '' ? (int)$_POST['achieved_month_st'][$serial_no] : 0;
        $achieved_month_total = isset($_POST['achieved_month_total'][$serial_no]) && $_POST['achieved_month_total'][$serial_no] !== '' ? (int)$_POST['achieved_month_total'][$serial_no] : 0;

        $achieved_till_general = isset($_POST['achieved_till_general'][$serial_no]) && $_POST['achieved_till_general'][$serial_no] !== '' ? (int)$_POST['achieved_till_general'][$serial_no] : 0;
        $achieved_till_sc = isset($_POST['achieved_till_sc'][$serial_no]) && $_POST['achieved_till_sc'][$serial_no] !== '' ? (int)$_POST['achieved_till_sc'][$serial_no] : 0;
        $achieved_till_st = isset($_POST['achieved_till_st'][$serial_no]) && $_POST['achieved_till_st'][$serial_no] !== '' ? (int)$_POST['achieved_till_st'][$serial_no] : 0;
        $achieved_till_total = isset($_POST['achieved_till_total'][$serial_no]) && $_POST['achieved_till_total'][$serial_no] !== '' ? (int)$_POST['achieved_till_total'][$serial_no] : 0;

        $completion_percentage = isset($_POST['completion_percentage'][$serial_no]) && $_POST['completion_percentage'][$serial_no] !== '' ? mysql_real_escape_string($_POST['completion_percentage'][$serial_no]) : '0%';

        $zilla_parishad_safe = mysql_real_escape_string($zilla_parishad);

        $sql = "INSERT INTO biogas_development_report
            (serial_no, zilla_parishad, annual_target_general, annual_target_sc, annual_target_st, annual_target_total,
             achieved_month_general, achieved_month_sc, achieved_month_st, achieved_month_total,
             achieved_till_general, achieved_till_sc, achieved_till_st, achieved_till_total, completion_percentage, report_date)
            VALUES
            ('$serial_no', '$zilla_parishad_safe', '$annual_target_general', '$annual_target_sc', '$annual_target_st', '$annual_target_total',
             '$achieved_month_general', '$achieved_month_sc', '$achieved_month_st', '$achieved_month_total',
             '$achieved_till_general', '$achieved_till_sc', '$achieved_till_st', '$achieved_till_total', '$completion_percentage', '$report_date')";
        mysql_query($sql) or die("Insert Error: " . mysql_error());
    }
    $message = "All records saved for date $report_date.";
}

// Filtering & exports (same logic as before)
$from_date = isset($_GET['from_date']) ? mysql_real_escape_string($_GET['from_date']) : '';
$to_date = isset($_GET['to_date']) ? mysql_real_escape_string($_GET['to_date']) : '';
$filter_type = isset($_GET['filter_type']) ? $_GET['filter_type'] : '';
$show_recent = isset($_GET['recent']) ? true : false;

$filter_sql = '';
if ($show_recent) {
    $dates_res = mysql_query("SELECT DISTINCT report_date FROM biogas_development_report ORDER BY report_date DESC LIMIT 5");
    $dates_arr = [];
    while ($row = mysql_fetch_assoc($dates_res)) {
        $dates_arr[] = $row['report_date'];
    }
    if (count($dates_arr) > 0) {
        $dates_list_str = "'" . implode("','", $dates_arr) . "'";
        $filter_sql = "WHERE report_date IN ($dates_list_str)";
    } else {
        $filter_sql = "WHERE 0";
    }
} elseif ($filter_type && $from_date) {
    if ($filter_type == 'weekly') {
        $ts = strtotime($from_date);
        $week_start = date('Y-m-d', strtotime('monday this week', $ts));
        $week_end = date('Y-m-d', strtotime('sunday this week', $ts));
        $filter_sql = "WHERE report_date BETWEEN '$week_start' AND '$week_end'";
    } elseif ($filter_type == 'monthly') {
        $month_start = date('Y-m-01', strtotime($from_date));
        $month_end = date('Y-m-t', strtotime($from_date));
        $filter_sql = "WHERE report_date BETWEEN '$month_start' AND '$month_end'";
    } elseif ($filter_type == 'yearly') {
        $year = date('Y', strtotime($from_date));
        $year_start = "$year-01-01";
        $year_end = "$year-12-31";
        $filter_sql = "WHERE report_date BETWEEN '$year_start' AND '$year_end'";
    } elseif ($from_date && $to_date) {
        $filter_sql = "WHERE report_date BETWEEN '$from_date' AND '$to_date'";
    }
} elseif ($from_date && $to_date) {
    $filter_sql = "WHERE report_date BETWEEN '$from_date' AND '$to_date'";
}

// Export logic
if (isset($_GET['export'])) {
    $export_type = $_GET['export'];
    $query = "SELECT * FROM biogas_development_report $filter_sql ORDER BY report_date, serial_no";
    $result = mysql_query($query);

    if ($export_type == 'excel') {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=biogas_report_export.xls");
        echo "Report Date\tSerial No\tZilla Parishad\tAnnual Target General\tAnnual Target SC\tAnnual Target ST\tAnnual Target Total\t";
        echo "Achieved Month General\tAchieved Month SC\tAchieved Month ST\tAchieved Month Total\t";
        echo "Achieved Till General\tAchieved Till SC\tAchieved Till ST\tAchieved Till Total\tCompletion %\n";

        while ($row = mysql_fetch_assoc($result)) {
            echo "{$row['report_date']}\t{$row['serial_no']}\t{$row['zilla_parishad']}\t";
            echo "{$row['annual_target_general']}\t{$row['annual_target_sc']}\t{$row['annual_target_st']}\t{$row['annual_target_total']}\t";
            echo "{$row['achieved_month_general']}\t{$row['achieved_month_sc']}\t{$row['achieved_month_st']}\t{$row['achieved_month_total']}\t";
            echo "{$row['achieved_till_general']}\t{$row['achieved_till_sc']}\t{$row['achieved_till_st']}\t{$row['achieved_till_total']}\t";
            echo "{$row['completion_percentage']}\n";
        }
        exit();
    }
    if ($export_type == 'pdf') {
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=biogas_report_export.pdf");
        echo "Biogas Development Report\n\n";
        echo "Report Date | Serial No | Zilla Parishad | Annual Target General | Annual Target SC | Annual Target ST | Annual Target Total | ";
        echo "Achieved Month General | Achieved Month SC | Achieved Month ST | Achieved Month Total | ";
        echo "Achieved Till General | Achieved Till SC | Achieved Till ST | Achieved Till Total | Completion %\n";
        echo str_repeat("=", 160)."\n";
        while ($row = mysql_fetch_assoc($result)) {
            echo "{$row['report_date']} | {$row['serial_no']} | {$row['zilla_parishad']} | ";
            echo "{$row['annual_target_general']} | {$row['annual_target_sc']} | {$row['annual_target_st']} | {$row['annual_target_total']} | ";
            echo "{$row['achieved_month_general']} | {$row['achieved_month_sc']} | {$row['achieved_month_st']} | {$row['achieved_month_total']} | ";
            echo "{$row['achieved_till_general']} | {$row['achieved_till_sc']} | {$row['achieved_till_st']} | {$row['achieved_till_total']} | ";
            echo "{$row['completion_percentage']}\n";
        }
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($page_header); ?></title>
    <style>
        body { font-family: Arial; background: #f5f5f5; padding: 20px;}
        table { border-collapse: collapse; width: 100%; background: white; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: center; font-size: 14px;}
        th { background: #007BFF; color: white; }
        .message { color: green; margin: 10px 0;}
        .error { color: red; margin: 10px 0;}
        input[type="text"], input[type="number"], input[type="date"], select { padding: 5px; font-size: 14px;}
        .btn { padding: 6px 12px; margin: 5px 3px; background: #007BFF; color: white; border: none; cursor: pointer;}
        .btn:hover { background: #0056b3; }
        .filter-section, .header-edit-section { background: white; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc;}
        .flex { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
    </style>
</head>
<body>

<!-- Editable Page Header -->
<div class="header-edit-section">
    <h2><?php echo htmlspecialchars($page_header); ?></h2>
    <form method="post" action="" style="margin-bottom:20px;">
        <input type="hidden" name="action" value="update_header_text" />
        <input type="text" name="page_header_text" value="<?php echo htmlspecialchars($page_header); ?>" style="width: 50%; padding: 5px; font-size:18px;" />
        <button type="submit" class="btn">Update Header</button>
    </form>
    <?php if (!empty($header_update_message)) echo "<p class='message'>{$header_update_message}</p>"; ?>
</div>

<!-- Data Entry Form -->
<form method="post" action="">
    <input type="hidden" name="action" value="save_data" />
    <label for="report_date">Report Date:</label>
    <input type="date" id="report_date" name="report_date" required value="<?php echo date('Y-m-d'); ?>" />
    <br/><br/>
    <table>
        <tr>
            <th>Sr No</th>
            <th>Zilla Parishad</th>
            <th>Annual Target General</th>
            <th>Annual Target SC</th>
            <th>Annual Target ST</th>
            <th>Annual Target Total</th>
            <th>Achieved Month General</th>
            <th>Achieved Month SC</th>
            <th>Achieved Month ST</th>
            <th>Achieved Month Total</th>
            <th>Achieved Till General</th>
            <th>Achieved Till SC</th>
            <th>Achieved Till ST</th>
            <th>Achieved Till Total</th>
            <th>Completion %</th>
        </tr>

        <?php foreach ($zilla_list as $serial_no => $zilla_name): ?>
            <tr>
                <td><?php echo $serial_no; ?></td>
                <td><?php echo $zilla_name; ?></td>

                <td><input type="number" min="0" name="annual_target_general[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="annual_target_sc[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="annual_target_st[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="annual_target_total[<?php echo $serial_no; ?>]" /></td>

                <td><input type="number" min="0" name="achieved_month_general[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="achieved_month_sc[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="achieved_month_st[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="achieved_month_total[<?php echo $serial_no; ?>]" /></td>

                <td><input type="number" min="0" name="achieved_till_general[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="achieved_till_sc[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="achieved_till_st[<?php echo $serial_no; ?>]" /></td>
                <td><input type="number" min="0" name="achieved_till_total[<?php echo $serial_no; ?>]" /></td>

                <td><input type="text" name="completion_percentage[<?php echo $serial_no; ?>]" placeholder="%" /></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br/>
    <button type="submit" class="btn">Save Report</button>
</form>

<!-- Filter & Export Section -->
<div class="filter-section">
    <h3>Filter Reports</h3>
    <form method="get" action="" class="flex">
        <label>From Date:
            <input type="date" name="from_date" value="<?php echo htmlspecialchars(isset($_GET['from_date'])?$_GET['from_date']:''); ?>" />
        </label>
        <label>To Date:
            <input type="date" name="to_date" value="<?php echo htmlspecialchars(isset($_GET['to_date'])?$_GET['to_date']:''); ?>" />
        </label>
        <label>Filter Type:
            <select name="filter_type">
                <option value="">Select</option>
                <option value="weekly" <?php if(isset($_GET['filter_type']) && $_GET['filter_type']=='weekly') echo 'selected'; ?>>Weekly</option>
                <option value="monthly" <?php if(isset($_GET['filter_type']) && $_GET['filter_type']=='monthly') echo 'selected'; ?>>Monthly</option>
                <option value="yearly" <?php if(isset($_GET['filter_type']) && $_GET['filter_type']=='yearly') echo 'selected'; ?>>Yearly</option>
            </select>
        </label>
        <button type="submit" class="btn">Apply Filter</button>
        <a href="?recent=1" class="btn" style="text-decoration:none;">Show Recent 5 Reports</a>
    </form>

    <form method="get" action="" class="flex" style="margin-top:10px;">
        <input type="hidden" name="from_date" value="<?php echo htmlspecialchars(isset($_GET['from_date'])?$_GET['from_date']:''); ?>">
        <input type="hidden" name="to_date" value="<?php echo htmlspecialchars(isset($_GET['to_date'])?$_GET['to_date']:''); ?>">
        <input type="hidden" name="filter_type" value="<?php echo htmlspecialchars(isset($_GET['filter_type'])?$_GET['filter_type']:''); ?>">
        <button type="submit" name="export" value="excel" class="btn">Export to Excel</button>
        <button type="submit" name="export" value="pdf" class="btn">Export to PDF</button>
    </form>
</div>

<!-- Data Display -->
<div style="margin-top:20px;">
    <h3>Report Data</h3>
    <?php
    $query = "SELECT * FROM biogas_development_report $filter_sql ORDER BY report_date DESC, serial_no ASC";
    $result = mysql_query($query);
    if (mysql_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Report Date</th><th>Sr No</th><th>Zilla Parishad</th><th>Annual Target General</th><th>Annual Target SC</th><th>Annual Target ST</th><th>Annual Target Total</th>";
        echo "<th>Achieved Month General</th><th>Achieved Month SC</th><th>Achieved Month ST</th><th>Achieved Month Total</th>";
        echo "<th>Achieved Till General</th><th>Achieved Till SC</th><th>Achieved Till ST</th><th>Achieved Till Total</th><th>Completion %</th></tr>";
        while ($row = mysql_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['report_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['serial_no']) . "</td>";
            echo "<td>" . htmlspecialchars($row['zilla_parishad']) . "</td>";
            echo "<td>" . htmlspecialchars($row['annual_target_general']) . "</td>";
            echo "<td>" . htmlspecialchars($row['annual_target_sc']) . "</td>";
            echo "<td>" . htmlspecialchars($row['annual_target_st']) . "</td>";
            echo "<td>" . htmlspecialchars($row['annual_target_total']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_month_general']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_month_sc']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_month_st']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_month_total']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_till_general']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_till_sc']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_till_st']) . "</td>";
            echo "<td>" . htmlspecialchars($row['achieved_till_total']) . "</td>";
            echo "<td>" . htmlspecialchars($row['completion_percentage']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found for selected criteria.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
include 'config.php'; // your mysql connection with $con

date_default_timezone_set('Asia/Kolkata');

$talukas = [
    "Akkalkot", "Barshi", "Karmala", "Madha", "Malshiras", "Mangalvedhe",
    "Mohol", "Pandharpur", "Sangole", "Solapur North", "Solapur South"
];

$sections = [
    "construction_new_well" => "Construction of new well",
    "electricity_connection_charges" => "Electricity connection charges",
    "inwell_boring" => "Inwell boring",
    "lining_to_farm_pond" => "Lining to the farm pond",
    "pumpset" => "Pumpset",
    "repairing_old_well" => "Repairing of old well",
    "solar_pump" => "Solar pump"
];

$columns_display = [
    "selected_in_lottery" => "Selected in Lottery",
    "rejected_applications" => "Rejected Applications",
    "canceled_applications" => "Canceled Applications",
    "application_in_process" => "Application In Process",
    "farmer_doc_pending" => "Farmer Doc Pending",
    "farmer_doc_uploaded" => "Farmer Doc Uploaded",
    "aoscp_doc_scrutiny_pending" => "AOSCP Doc Scrutiny Pending",
    "bdo_doc_scrutiny_pending" => "BDO Doc Scrutiny Pending",
    "bdo_site_inspection_report_pending" => "BDO Scrutiny of Site Inspection Report & Estimate Pending",
    "ado_admin_tech_approval" => "ADO Admin. & Tech Approval/ Work Order/ PreSanction Issued",
    "ado_construction_bill_approved" => "ADO Construction Bill Approved For Payment",
    "ado_construction_bill_disbursed" => "ADO Construction Bill Disbursed",
    "payment_in_process" => "Payment In Process",
    "amount_disbursed_1" => "Amount Disbursed (Date 1)",
    "amount_disbursed_2" => "Amount Disbursed (Date 2)",
    "amount_disbursed_3" => "Amount Disbursed (Date 3)",
    "amount_disbursed_4" => "Amount Disbursed (Date 4)",
    "amount_disbursed_5" => "Amount Disbursed (Date 5)",
    "amount_disbursed_6" => "Amount Disbursed (Date 6)"
];

// Helper to sanitize POST numbers or default 0
function get_post_value($key) {
    return isset($_POST[$key]) && $_POST[$key] !== '' ? $_POST[$key] : 0;
}

session_start();
$header_title = "Dr. Babasaheb Ambedkar Krushi Swavalamban Yojana 2022-2023";
if (isset($_POST['header_title']) && trim($_POST['header_title']) !== '') {
    $_SESSION['header_title'] = trim($_POST['header_title']);
}
if (isset($_SESSION['header_title'])) {
    $header_title = $_SESSION['header_title'];
}

// Handle saving for a specific section (table)
$success_msg = "";
if (isset($_POST['save_section']) && isset($_POST['section_table'])) {
    $table = $_POST['section_table'];
    if (!array_key_exists($table, $sections)) {
        die("Invalid section selected.");
    }

    foreach ($talukas as $taluka) {
        $data = [];
        foreach (array_keys($columns_display) as $col) {
            $input_name = $table . "_" . $col . "_" . str_replace(" ", "_", $taluka);
            $val = get_post_value($input_name);
            if ($col === 'selected_in_lottery' || strpos($col, "amount") !== false) {
                $data[$col] = floatval($val);
            } else {
                $data[$col] = intval($val);
            }
        }

        $taluka_safe = mysql_real_escape_string($taluka);

        $check_sql = "SELECT id FROM $table WHERE taluka = '$taluka_safe'";
        $check_res = mysql_query($check_sql, $con);
        if (!$check_res) {
            die("DB Error: " . mysql_error());
        }

        if (mysql_num_rows($check_res) > 0) {
            $row = mysql_fetch_assoc($check_res);
            $id = $row['id'];
            $set_parts = [];
            foreach ($data as $col => $val) {
                $val_escaped = mysql_real_escape_string($val);
                $set_parts[] = "$col = '$val_escaped'";
            }
            $set_sql = implode(", ", $set_parts);
            $update_sql = "UPDATE $table SET $set_sql, updated_at=NOW() WHERE id = $id";
            $update_res = mysql_query($update_sql, $con);
            if (!$update_res) {
                die("Update failed: " . mysql_error());
            }
        } else {
            $cols = "taluka, " . implode(", ", array_keys($data)) . ", updated_at";
            $vals = "'" . mysql_real_escape_string($taluka) . "'";
            foreach ($data as $val) {
                $vals .= ", '" . mysql_real_escape_string($val) . "'";
            }
            $vals .= ", NOW()";
            $insert_sql = "INSERT INTO $table ($cols) VALUES ($vals)";
            $insert_res = mysql_query($insert_sql, $con);
            if (!$insert_res) {
                die("Insert failed: " . mysql_error());
            }
        }
    }
    $success_msg = "Data saved successfully for: " . $sections[$table];
}

// Filtering and export logic unchanged (same as your code)...

$filter_from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-01');
$filter_to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-t');
$filter_period = isset($_GET['period']) ? $_GET['period'] : 'custom';

if (isset($_GET['period']) && $_GET['period'] !== 'custom') {
    switch ($_GET['period']) {
        case 'weekly':
            $filter_from = date('Y-m-d', strtotime('monday this week'));
            $filter_to = date('Y-m-d', strtotime('sunday this week'));
            break;
        case 'monthly':
            $filter_from = date('Y-m-01');
            $filter_to = date('Y-m-t');
            break;
        case 'yearly':
            $filter_from = date('Y-01-01');
            $filter_to = date('Y-12-31');
            break;
    }
}

function fetch_data_filtered($table, $from, $to, $con) {
    $from_safe = mysql_real_escape_string($from);
    $to_safe = mysql_real_escape_string($to);
    $sql = "SELECT * FROM $table WHERE updated_at BETWEEN '$from_safe 00:00:00' AND '$to_safe 23:59:59' ORDER BY taluka";
    $res = mysql_query($sql, $con);
    if (!$res) {
        die("Fetch error: " . mysql_error());
    }
    $results = [];
    while ($row = mysql_fetch_assoc($res)) {
        $results[$row['taluka']] = $row;
    }
    return $results;
}

function export_excel($table, $from, $to, $con, $columns_display, $talukas, $section_title) {
    $data_rows = fetch_data_filtered($table, $from, $to, $con);
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename={$table}_report_{$from}_to_{$to}.xls");
    echo "<table border='1'><tr><th>Taluka</th>";
    foreach ($columns_display as $col) {
        echo "<th>" . htmlspecialchars($col) . "</th>";
    }
    echo "</tr>";
    foreach ($talukas as $taluka) {
        echo "<tr><td>" . htmlspecialchars($taluka) . "</td>";
        if (isset($data_rows[$taluka])) {
            $row = $data_rows[$taluka];
            foreach (array_keys($columns_display) as $col) {
                echo "<td>" . htmlspecialchars($row[$col]) . "</td>";
            }
        } else {
            foreach ($columns_display as $col => $_) {
                echo "<td>0</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    exit;
}

function export_pdf($table, $from, $to, $con, $columns_display, $talukas, $section_title) {
    $data_rows = fetch_data_filtered($table, $from, $to, $con);
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename={$table}_report_{$from}_to_{$to}.pdf");

    $content = $section_title . "\n";
    $content .= "Report for period: $from to $to\n\n";
    $content .= str_pad("Taluka", 20);
    foreach ($columns_display as $col_name) {
        $content .= str_pad(substr($col_name, 0, 20), 20);
    }
    $content .= "\n";

    foreach ($talukas as $taluka) {
        $content .= str_pad($taluka, 20);
        if (isset($data_rows[$taluka])) {
            $row = $data_rows[$taluka];
            foreach (array_keys($columns_display) as $col) {
                $val = isset($row[$col]) ? $row[$col] : "0";
                $content .= str_pad($val, 20);
            }
        } else {
            foreach ($columns_display as $col => $_) {
                $content .= str_pad("0", 20);
            }
        }
        $content .= "\n";
    }

    echo $content;
    exit;
}

if (isset($_GET['export_type'], $_GET['table'])) {
    $export_type = $_GET['export_type'];
    $export_table = $_GET['table'];
    if (!array_key_exists($export_table, $sections)) {
        die("Invalid table selected for export.");
    }
    $export_from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-01');
    $export_to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-t');

    if ($export_type === 'excel') {
        export_excel($export_table, $export_from, $export_to, $con, $columns_display, $talukas, $sections[$export_table]);
    } elseif ($export_type === 'pdf') {
        export_pdf($export_table, $export_from, $export_to, $con, $columns_display, $talukas, $sections[$export_table]);
    } else {
        die("Invalid export type.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title><?php echo htmlspecialchars($header_title); ?></title>
<style>
    body { font-family: Arial,sans-serif; margin: 20px; }
    h1 { background:#007BFF; color:#fff; padding:12px; }
    h2 { background:#0056b3; color:#fff; padding:8px; margin-top:40px;}
    table { border-collapse: collapse; width: 100%; margin-bottom:40px; }
    th, td { border: 1px solid #ccc; padding: 5px; text-align:center; font-size:12px; }
    th { background:#f0f0f0; }
    input[type=number] { width:70px; }
    input[type=text] { width:100%; box-sizing: border-box; }
    .taluka-col { font-weight: bold; }
    .btn { padding: 10px 18px; background: #28a745; color: white; border:none; cursor:pointer; margin: 10px 0; font-weight:bold; }
    .btn:hover { background:#218838; }
    .success { color: green; font-weight:bold; margin-bottom: 10px; }
    .header-input { margin-bottom: 20px; font-size:18px; width: 100%; padding:6px; }
    .filter-box { margin: 20px 0; }
    .filter-box label { margin-right: 8px; }
    .filter-box input[type=date] { padding:4px; margin-right: 12px; }
    .filter-box select { padding:4px; margin-right: 12px; }
    .export-print { margin-top: 10px; }
    .export-print select { padding: 6px; }
</style>
<script>
function printPage() {
    window.print();
}
function validateExport() {
    var table = document.getElementById('tableSelect').value;
    if (table === "") {
        alert("Please select a form to export.");
        return false;
    }
    return true;
}
</script>
</head>
<body>

<h1>
<form method="post" style="display:inline-block; width:100%;">
    <input type="text" name="header_title" class="header-input" value="<?php echo htmlspecialchars($header_title); ?>" />
    <button type="submit" class="btn" name="save_header">Update Title</button>
</form>
</h1>

<?php if ($success_msg): ?>
    <div class="success"><?php echo $success_msg; ?></div>
<?php endif; ?>

<?php foreach ($sections as $table => $section_title): ?>
    <form method="post" style="border:1px solid #ccc; padding:15px; margin-bottom:40px;">
        <h2><?php echo htmlspecialchars($section_title); ?></h2>
        <input type="hidden" name="section_table" value="<?php echo htmlspecialchars($table); ?>" />
        <table>
            <tr>
                <th>Taluka</th>
                <?php foreach ($columns_display as $col_name): ?>
                    <th><?php echo htmlspecialchars($col_name); ?></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($talukas as $taluka): ?>
                <tr>
                    <td class="taluka-col"><?php echo htmlspecialchars($taluka); ?></td>
                    <?php foreach (array_keys($columns_display) as $col):
                        $input_name = $table . "_" . $col . "_" . str_replace(" ", "_", $taluka);
                    ?>
                        <td><input type="number" step="any" min="0" name="<?php echo $input_name; ?>" value="0" required /></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit" name="save_section" class="btn">Save <?php echo htmlspecialchars($section_title); ?></button>
    </form>
<?php endforeach; ?>

<hr>

<h2>Filter and View Data</h2>

<form method="get" class="filter-box">
    <label>From: <input type="date" name="from" value="<?php echo htmlspecialchars($filter_from); ?>" required /></label>
    <label>To: <input type="date" name="to" value="<?php echo htmlspecialchars($filter_to); ?>" required /></label>
    <label>Period:
        <select name="period">
            <option value="custom" <?php if ($filter_period == 'custom') echo 'selected'; ?>>Custom</option>
            <option value="weekly" <?php if ($filter_period == 'weekly') echo 'selected'; ?>>This Week</option>
            <option value="monthly" <?php if ($filter_period == 'monthly') echo 'selected'; ?>>This Month</option>
            <option value="yearly" <?php if ($filter_period == 'yearly') echo 'selected'; ?>>This Year</option>
        </select>
    </label>
    <button type="submit" class="btn">Filter</button>
</form>

<?php
foreach ($sections as $table => $section_title) {
    echo "<h3>$section_title</h3>";
    $data_rows = fetch_data_filtered($table, $filter_from, $filter_to, $con);
    if (count($data_rows) == 0) {
        echo "<p>No data found for selected dates.</p>";
        continue;
    }
    echo "<table><tr><th>Taluka</th>";
    foreach ($columns_display as $col_name) {
        echo "<th>$col_name</th>";
    }
    echo "</tr>";

    foreach ($talukas as $taluka) {
        echo "<tr><td>" . htmlspecialchars($taluka) . "</td>";
        if (isset($data_rows[$taluka])) {
            $row = $data_rows[$taluka];
            foreach (array_keys($columns_display) as $col) {
                echo "<td>" . htmlspecialchars($row[$col]) . "</td>";
            }
        } else {
            foreach ($columns_display as $col => $_) {
                echo "<td>0</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<hr>

<h2>Export Data</h2>

<form method="get" class="filter-box" onsubmit="return validateExport()">
    <label>Select Form:
        <select name="table" id="tableSelect" required>
            <option value="">-- Select Form --</option>
            <?php foreach ($sections as $table => $section_title): ?>
                <option value="<?php echo htmlspecialchars($table); ?>"><?php echo htmlspecialchars($section_title); ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>From: <input type="date" name="from" value="<?php echo htmlspecialchars($filter_from); ?>" required /></label>
    <label>To: <input type="date" name="to" value="<?php echo htmlspecialchars($filter_to); ?>" required /></label>
    <label>Export as:
        <select name="export_type" required>
            <option value="excel">Excel</option>
            <option value="pdf">PDF</option>
        </select>
    </label>
    <button type="submit" class="btn">Download</button>
</form>

<div class="export-print">
    <button onclick="printPage()" class="btn">Print Page</button>
</div>

</body>
</html>

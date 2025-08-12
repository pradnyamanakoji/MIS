<?php
session_start();
include("db.php"); // your mysql_* connection

// --- Zilla Parishad fixed list ---
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

// --- Heading and columns loading code (same as before) ---
$heading_file = "saved_heading.txt";
$columns_file = "saved_columns.json";

$default_heading = "Enter Biogas Development Data";
$default_columns = [
    "Sr No", "Zilla Parishad", "Annual Target General", "Annual Target SC", "Annual Target ST",
    "Annual Target Total", "Achieved Month General", "Achieved Month SC", "Achieved Month ST",
    "Achieved Month Total", "Achieved Till General", "Achieved Till SC", "Achieved Till ST",
    "Achieved Till Total", "Completion %"
];

$page_header = (file_exists($heading_file)) ? trim(file_get_contents($heading_file)) : $default_heading;

$columns = $default_columns;
if (file_exists($columns_file)) {
    $json = file_get_contents($columns_file);
    $arr = json_decode($json, true);
    if (is_array($arr) && count($arr) === count($default_columns)) {
        $columns = $arr;
    }
}

// Initialize message variable to show on page
$message = '';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'save_heading') {
            $new_heading = isset($_POST['heading_text']) ? trim($_POST['heading_text']) : '';
            if ($new_heading === '') {
                echo json_encode(['success'=>false,'message'=>'Heading cannot be empty']);
                exit;
            }
            if (file_put_contents($heading_file, $new_heading) !== false) {
                echo json_encode(['success'=>true]);
            } else {
                echo json_encode(['success'=>false,'message'=>'Failed to save heading']);
            }
            exit;
        }
        if ($_POST['action'] === 'save_columns') {
            $cols_json = isset($_POST['columns']) ? $_POST['columns'] : '';
            $cols_arr = json_decode($cols_json, true);
            if (!is_array($cols_arr) || count($cols_arr) !== count($default_columns)) {
                echo json_encode(['success'=>false,'message'=>'Invalid columns']);
                exit;
            }
            if (file_put_contents($columns_file, json_encode($cols_arr)) !== false) {
                echo json_encode(['success'=>true]);
            } else {
                echo json_encode(['success'=>false,'message'=>'Failed to save columns']);
            }
            exit;
        }
        if ($_POST['action'] === 'save_table') {
            $report_date = isset($_POST['report_date']) ? mysql_real_escape_string($_POST['report_date']) : '';
            $report_period = isset($_POST['report_period']) ? mysql_real_escape_string($_POST['report_period']) : '';
            if ($report_date === '') {
                $message = "<p style='color:red;'>Report date is required.</p>";
            } else {
                // Delete old records for date and period
                mysql_query("DELETE FROM biogas_development_report WHERE report_date='$report_date' AND report_period='$report_period'") or die(mysql_error());

                $count_rows = isset($_POST['zilla_parishad']) ? count($_POST['zilla_parishad']) : 0;

                for ($i=0; $i < $count_rows; $i++) {
                    $serial_no = $i+1;
                    $zilla_parishad = isset($_POST['zilla_parishad'][$i]) ? mysql_real_escape_string(trim($_POST['zilla_parishad'][$i])) : '';
                    if ($zilla_parishad === '') continue;

                    $fields = [
                        'annual_target_general','annual_target_sc','annual_target_st','annual_target_total',
                        'achieved_month_general','achieved_month_sc','achieved_month_st','achieved_month_total',
                        'achieved_till_general','achieved_till_sc','achieved_till_st','achieved_till_total'
                    ];
                    $vals = [];
                    foreach ($fields as $f) {
                        $vals[$f] = (isset($_POST[$f][$i]) && $_POST[$f][$i] !== '') ? intval($_POST[$f][$i]) : 0;
                    }
                    $completion_percentage = isset($_POST['completion_percentage'][$i]) ? mysql_real_escape_string(trim($_POST['completion_percentage'][$i])) : '0%';

                    $sql = "INSERT INTO biogas_development_report
                        (serial_no, zilla_parishad,
                        annual_target_general, annual_target_sc, annual_target_st, annual_target_total,
                        achieved_month_general, achieved_month_sc, achieved_month_st, achieved_month_total,
                        achieved_till_general, achieved_till_sc, achieved_till_st, achieved_till_total,
                        completion_percentage, report_date, report_period)
                        VALUES
                        ('$serial_no', '$zilla_parishad',
                        '{$vals['annual_target_general']}', '{$vals['annual_target_sc']}', '{$vals['annual_target_st']}', '{$vals['annual_target_total']}',
                        '{$vals['achieved_month_general']}', '{$vals['achieved_month_sc']}', '{$vals['achieved_month_st']}', '{$vals['achieved_month_total']}',
                        '{$vals['achieved_till_general']}', '{$vals['achieved_till_sc']}', '{$vals['achieved_till_st']}', '{$vals['achieved_till_total']}',
                        '$completion_percentage', '$report_date', '$report_period')";
                    mysql_query($sql) or die("Insert error: " . mysql_error());
                }
                $message = "<p style='color:green;'>Saved all records for <strong>$report_date</strong> ($report_period)</p>";
            }
        }
        if ($_POST['action'] === 'filter') {
            // No DB changes needed here, just let variables persist
        }
    }
}

// Default filter values or from POST
$filter_from_date = isset($_POST['filter_from_date']) ? $_POST['filter_from_date'] : '';
$filter_to_date = isset($_POST['filter_to_date']) ? $_POST['filter_to_date'] : '';
$filter_report_period = isset($_POST['filter_report_period']) ? $_POST['filter_report_period'] : '';

// Fetch saved data for display based on filter
$where = [];
if ($filter_from_date !== '') {
    $where[] = "report_date >= '" . mysql_real_escape_string($filter_from_date) . "'";
}
if ($filter_to_date !== '') {
    $where[] = "report_date <= '" . mysql_real_escape_string($filter_to_date) . "'";
}
if ($filter_report_period !== '') {
    $where[] = "report_period = '" . mysql_real_escape_string($filter_report_period) . "'";
}
$where_sql = "";
if (count($where) > 0) {
    $where_sql = "WHERE " . implode(" AND ", $where);
}

// If no filter given, default to latest date data
if ($where_sql === "") {
    // Get latest report_date & report_period
    $resLatest = mysql_query("SELECT report_date, report_period FROM biogas_development_report ORDER BY report_date DESC LIMIT 1");
    if ($rowLatest = mysql_fetch_assoc($resLatest)) {
        $latest_date = $rowLatest['report_date'];
        $latest_period = $rowLatest['report_period'];
        $where_sql = "WHERE report_date = '$latest_date' AND report_period = '$latest_period'";
        $filter_from_date = $latest_date;
        $filter_to_date = $latest_date;
        $filter_report_period = $latest_period;
    }
}

$saved_data = [];
$res = mysql_query("SELECT * FROM biogas_development_report $where_sql ORDER BY serial_no ASC");
while ($row = mysql_fetch_assoc($res)) {
    $saved_data[$row['zilla_parishad']] = $row;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($page_header); ?></title>
    <style>
        /* Your CSS styles from before */
        body { font-family: Arial; background: #f9f9f9; padding: 15px; }
        #page-header { font-size: 28px; font-weight: bold; margin-bottom: 12px; border-bottom: 2px solid #007BFF; padding-bottom: 6px; }
        #page-header[contenteditable="true"]:focus { outline: 2px solid #0056b3; }
        table { border-collapse: collapse; width: 100%; background: white; }
        th, td { border: 1px solid #ccc; padding: 6px; font-size: 14px; text-align: center; }
        th { background-color: #007BFF; color: white; cursor: text; }
        input[type="number"], input[type="text"], input[type="date"] {
            width: 80px; padding: 4px; font-size: 14px; box-sizing: border-box;
        }
        input[name="zilla_parishad[]"] {
            width: 130px; background: #eee; border: none; pointer-events: none; /* fixed text, not editable */
        }
        .btn {
            background-color: #007BFF; color: white; border: none; padding: 6px 14px; cursor: pointer; margin: 5px 3px;
        }
        .btn:hover { background-color: #0056b3; }
        .delete-row-btn { background-color: #dc3545; }
        .filter-section, .header-section {
            background: white; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc;
        }
        .filter-section form {
            display: flex; align-items: center; gap: 10px;
        }
        #message { margin-bottom: 15px; font-weight: bold; }
    </style>
</head>
<body>

<div class="header-section">
    <div id="page-header" contenteditable="true" spellcheck="false"><?php echo htmlspecialchars($page_header); ?></div>
    <button id="save-heading-btn" class="btn">Save Heading</button>
    <span id="heading-msg" style="color: green; margin-left: 10px;"></span>
</div>

<div id="message"><?php echo $message; ?></div>

<div class="filter-section">
    <form method="post" action="">
        <input type="hidden" name="action" value="filter" />
        <label>From Date: <input type="date" name="filter_from_date" value="<?php echo htmlspecialchars($filter_from_date); ?>" /></label>
        <label>To Date: <input type="date" name="filter_to_date" value="<?php echo htmlspecialchars($filter_to_date); ?>" /></label>
        <label>Period:
            <select name="filter_report_period">
                <option value="">--All--</option>
                <option value="Weekly" <?php if ($filter_report_period == 'Weekly') echo 'selected'; ?>>Weekly</option>
                <option value="Monthly" <?php if ($filter_report_period == 'Monthly') echo 'selected'; ?>>Monthly</option>
                <option value="Yearly" <?php if ($filter_report_period == 'Yearly') echo 'selected'; ?>>Yearly</option>
            </select>
        </label>
        <button type="submit" class="btn">Filter</button>
    </form>
</div>

<form id="data-form" method="post" action="">
    <input type="hidden" name="action" value="save_table" />
    Report Date: <input type="date" name="report_date" required value="<?php echo htmlspecialchars($filter_to_date ?: date('Y-m-d')); ?>" />
    Report Period:
    <select name="report_period" required>
        <option value="">--Select--</option>
        <option value="Weekly" <?php if (isset($_POST['report_period']) && $_POST['report_period']=='Weekly') echo 'selected'; ?>>Weekly</option>
        <option value="Monthly" <?php if (isset($_POST['report_period']) && $_POST['report_period']=='Monthly') echo 'selected'; ?>>Monthly</option>
        <option value="Yearly" <?php if (isset($_POST['report_period']) && $_POST['report_period']=='Yearly') echo 'selected'; ?>>Yearly</option>
    </select>
    <button type="button" id="add-row-btn" class="btn">Add New Record</button>
    <button type="submit" class="btn">Save All Data</button>
    <button type="button" id="print-btn" class="btn">Print Table</button>
    <button type="button" id="export-pdf-btn" class="btn">Export to PDF</button>

    <table id="data-table" style="margin-top:10px;">
        <thead>
            <tr>
                <?php foreach ($columns as $col): ?>
                    <th contenteditable="true"><?php echo htmlspecialchars($col); ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($zilla_list as $idx => $zilla) {
                echo "<tr>";
                echo "<td><input type='text' name='serial_no[]' value='".intval($idx)."' readonly style='background:#eee; border:none;'/></td>";
                echo "<td><input type='text' name='zilla_parishad[]' value='".htmlspecialchars($zilla)."' readonly /></td>";

                $saved = isset($saved_data[$zilla]) ? $saved_data[$zilla] : [];

                $fields = [
                    'annual_target_general','annual_target_sc','annual_target_st','annual_target_total',
                    'achieved_month_general','achieved_month_sc','achieved_month_st','achieved_month_total',
                    'achieved_till_general','achieved_till_sc','achieved_till_st','achieved_till_total',
                    'completion_percentage'
                ];
                foreach ($fields as $field) {
                    $val = isset($saved[$field]) ? $saved[$field] : '';
                    $type = ($field === 'completion_percentage') ? 'text' : 'number';
                    echo "<td><input type='$type' name='{$field}[]' value='".htmlspecialchars($val)."' /></td>";
                }

                echo "<td><button type='button' class='delete-row-btn btn' style='background:#dc3545;'>Delete</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

<script>
    // JS same as before
    document.getElementById('save-heading-btn').addEventListener('click', function() {
        var headingText = document.getElementById('page-header').innerText.trim();
        if (!headingText) {
            alert("Heading cannot be empty!");
            return;
        }
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200) {
                var resp = JSON.parse(xhr.responseText);
                if (resp.success) {
                    document.getElementById('heading-msg').innerText = "Heading saved!";
                    setTimeout(function() {
                        document.getElementById('heading-msg').innerText = '';
                    }, 3000);
                } else {
                    alert("Error saving heading: " + resp.message);
                }
            }
        };
        xhr.send("action=save_heading&heading_text=" + encodeURIComponent(headingText));
    });

    var headers = document.querySelectorAll("#data-table thead th[contenteditable='true']");
    headers.forEach(function(th) {
        th.addEventListener('blur', saveColumns);
        th.addEventListener('keydown', function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                th.blur();
            }
        });
    });
    function saveColumns() {
        var cols = [];
        headers.forEach(function(th) {
            var txt = th.innerText.trim();
            if (txt === '') {
                alert('Column headers cannot be empty.');
                th.focus();
                throw 'Empty column header';
            }
            cols.push(txt);
        });
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200) {
                var resp = JSON.parse(xhr.responseText);
                if (!resp.success) alert("Failed to save columns: " + resp.message);
            }
        };
        xhr.send("action=save_columns&columns=" + encodeURIComponent(JSON.stringify(cols)));
    }

    document.getElementById('add-row-btn').addEventListener('click', function() {
        var tbody = document.querySelector("#data-table tbody");
        var newRow = document.createElement('tr');
        var colCount = document.querySelectorAll("#data-table thead th").length - 1;

        var tdSr = document.createElement('td');
        var inSr = document.createElement('input');
        inSr.type = 'number';
        inSr.name = 'serial_no[]';
        inSr.value = '';
        tdSr.appendChild(inSr);
        newRow.appendChild(tdSr);

        var tdZilla = document.createElement('td');
        var inZilla = document.createElement('input');
        inZilla.type = 'text';
        inZilla.name = 'zilla_parishad[]';
        inZilla.value = '';
        tdZilla.appendChild(inZilla);
        newRow.appendChild(tdZilla);

        for (var i=2; i < colCount; i++) {
            var td = document.createElement('td');
            var inp = document.createElement('input');
            inp.type = (i === colCount-1) ? 'text' : 'number'; // last column completion % is text
            inp.name = [
                'annual_target_general[]','annual_target_sc[]','annual_target_st[]','annual_target_total[]',
                'achieved_month_general[]','achieved_month_sc[]','achieved_month_st[]','achieved_month_total[]',
                'achieved_till_general[]','achieved_till_sc[]','achieved_till_st[]','achieved_till_total[]',
                'completion_percentage[]'
            ][i-2];
            inp.value = '';
            td.appendChild(inp);
            newRow.appendChild(td);
        }
        var tdDel = document.createElement('td');
        var btnDel = document.createElement('button');
        btnDel.type = 'button';
        btnDel.className = 'delete-row-btn btn';
        btnDel.style.background = '#dc3545';
        btnDel.textContent = 'Delete';
        btnDel.addEventListener('click', function() {
            if(confirm("Delete this row?")) {
                newRow.remove();
            }
        });
        tdDel.appendChild(btnDel);
        newRow.appendChild(tdDel);

        tbody.appendChild(newRow);
    });

    // Delete existing rows
    document.querySelectorAll('.delete-row-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            if (confirm("Delete this row?")) {
                e.target.closest('tr').remove();
            }
        });
    });

    // Print table
    document.getElementById('print-btn').addEventListener('click', function() {
        var table = document.getElementById('data-table').outerHTML;
        var heading = document.getElementById('page-header').innerText;
        var printWindow = window.open('', '', 'height=600,width=900');
        printWindow.document.write('<html><head><title>Print Table</title>');
        printWindow.document.write('<style>table{border-collapse:collapse;width:100%;}th,td{border:1px solid #000;padding:6px;text-align:center;}</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h2>'+heading+'</h2>');
        printWindow.document.write(table);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });

    // Export to PDF using jsPDF
    document.getElementById('export-pdf-btn').addEventListener('click', function() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        var heading = document.getElementById('page-header').innerText;
        doc.setFontSize(18);
        doc.text(heading, 14, 22);

        var res = doc.autoTableHtmlToJson(document.getElementById('data-table'));
        doc.autoTable({
            head: [res.columns],
            body: res.data,
            startY: 30,
            styles: { fontSize: 8 },
            headStyles: { fillColor: [0, 123, 255] },
        });
        doc.save('biogas_report.pdf');
    });
</script>

</body>
</html>

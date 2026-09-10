<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weekly Online Store Sales Analyzer</title>
</head>
<body>
    <h2>WEEKLY SALES REPORT</h2>
    <?php
    $dailySales = [
        "Monday" => 1500,
        "Tuesday" => 5100,
        "Wednesday" => 3900,
        "Thursday" => 1000,
        "Friday" => 1000,
        "Saturday" => 1500,
        "Sunday" => 1500
    ];

    $totalSales = 0;
    $targetDays = 0;

    foreach ($dailySales as $day => $sales) {
        echo $day . ": PHP " . number_format($sales, 2) . "<br>";
        $totalSales += $sales;
        if ($sales >= 5000) {
            $targetDays++;
        }
    }

    $daysCount = count($dailySales);
    $averageSales = $totalSales / $daysCount;

    if ($averageSales >= 5000) {
        $performance = "Excellent";
    } elseif ($averageSales >= 4000) {
        $performance = "Satisfactory";
    } else {
        $performance = "Needs Improvement";
    }

    echo "<hr>";
    echo "Total Sales: PHP " . number_format($totalSales, 2) . "<br>";
    echo "Average Daily Sales: PHP " . number_format($averageSales, 2) . "<br>";
    echo "Days Meeting Target: " . $targetDays . "<br>";
    echo "Performance: " . $performance . "<br>";
    ?>
</body>
</html>
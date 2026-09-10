<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Printing Cost Calculator</title>
</head>
<body>
    <h2>CAMPUS PRINTING COST</h2>
    <?php
    $studentName = "Ana Reyes";
    $numberOfPages = 12;
    $printingType = "Black and White";

    if ($printingType == "Color") {
        $rate = 5.00;
    } else {
        $rate = 2.00;
    }

    $totalCost = $numberOfPages * $rate;

    echo "Student: " . $studentName . "<br>";
    echo "Printing Type: " . $printingType . "<br>";
    echo "Number of Pages: " . $numberOfPages . "<br>";
    echo "Rate per Page: PHP " . number_format($rate, 2) . "<br>";
    echo "Total Cost: PHP " . number_format($totalCost, 2) . "<br>";
    ?>
</body>
</html>
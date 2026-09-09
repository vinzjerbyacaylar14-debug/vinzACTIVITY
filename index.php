<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
</head>
<body>
    <?php
    $name = "vinz jerby";
    $age = 21;
    $grade = 90.9;
    ?>

    <h1>Hello World</h1>
    <p>Welcome to PHP</p>

    <h2>Student Information</h2>
    <p>Name: <?php echo $name; ?></p>
    <p>Age: <?php echo $age; ?></p>
    <p>Grade: <?php echo number_format($grade, 1); ?></p>
</body>
</html>
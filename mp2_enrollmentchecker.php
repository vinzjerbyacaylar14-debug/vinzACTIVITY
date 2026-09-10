<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Enrollment Eligibility Checker</title>
</head>
<body>
    <h2>COURSE ENROLLMENT CHECKER</h2>
    <form method="POST" action="">
        <label>Student Name:</label> <input type="text" name="student_name"><br><br>
        <label>Age:</label> <input type="number" name="age"><br><br>
        <label>Final Grade:</label> <input type="number" name="grade"><br><br>
        <label>Prerequisite Completed:</label>
        <select name="prereq">
            <option value="">--Select--</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br><br>
        <label>Enrollment Status:</label>
        <select name="status">
            <option value="">--Select--</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select><br><br>
        <input type="submit" name="submit" value="Check Eligibility">
    </form>
    <hr>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['student_name'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        $prereq = $_POST['prereq'];
        $status = $_POST['status'];

        // Decision Rules Order
        if (empty($name) || $age === '' || $grade === '' || empty($prereq) || empty($status)) {
            $result = "Please complete all required fields.";
        } elseif ($age < 16 || $age > 100 || $grade < 0 || $grade > 100) {
            $result = "Invalid numeric input.";
        } elseif ($prereq == "No") {
            $result = "Not eligible: Prerequisite not completed.";
        } elseif ($status == "Inactive") {
            $result = "Not eligible: Student is inactive.";
        } elseif ($grade < 80) {
            $result = "Not eligible: Grade requirement not met.";
        } else {
            $result = "Eligible for enrollment.";
        }

        echo "Student: " . htmlspecialchars($name) . "<br>";
        echo "Age: " . htmlspecialchars($age) . "<br>";
        echo "Final Grade: " . htmlspecialchars($grade) . "<br>";
        echo "Prerequisite Completed: " . htmlspecialchars($prereq) . "<br>";
        echo "Enrollment Status: " . htmlspecialchars($status) . "<br>";
        echo "<strong>Result: " . $result . "</strong>";
    }
    ?>
</body>
</html>
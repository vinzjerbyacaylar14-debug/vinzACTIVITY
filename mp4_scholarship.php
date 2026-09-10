<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scholarship Decision Analyzer</title>
</head>
<body>
    <h2>SCHOLARSHIP DECISION ANALYZER</h2>
    <form method="POST" action="">
        <label>Applicant Name:</label> <input type="text" name="applicant_name"><br><br>
        <label>Quiz Grade:</label> <input type="number" name="quiz"><br><br>
        <label>Activity Grade:</label> <input type="number" name="activity"><br><br>
        <label>Examination Grade:</label> <input type="number" name="exam"><br><br>
        <label>Attendance Rate (%):</label> <input type="number" name="attendance"><br><br>
        <label>Enrollment Status:</label>
        <select name="status">
            <option value="">--Select--</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select><br><br>
        <label>Disciplinary Case:</label>
        <select name="disciplinary">
            <option value="">--Select--</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br><br>
        <input type="submit" name="submit" value="Analyze Scholarship">
    </form>
    <hr>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['applicant_name'];
        $quiz = $_POST['quiz'];
        $activity = $_POST['activity'];
        $exam = $_POST['exam'];
        $attendance = $_POST['attendance'];
        $status = $_POST['status'];
        $disciplinary = $_POST['disciplinary'];

        // Basic Empty Check
        if (empty($name) || $quiz === '' || $activity === '' || $exam === '' || $attendance === '' || empty($status) || empty($disciplinary)) {
            echo "<strong>Please complete all required fields.</strong>";
        } else {
            $grades = [
                "Quiz" => $quiz,
                "Activity" => $activity,
                "Examination" => $exam
            ];

            $hasInvalidGrade = false;
            $sumGrades = 0;

            foreach ($grades as $key => $val) {
                if ($val < 0 || $val > 100) {
                    $hasInvalidGrade = true;
                }
                $sumGrades += $val;
            }

            if ($attendance < 0 || $attendance > 100) {
                $hasInvalidGrade = true;
            }

            if ($hasInvalidGrade) {
                echo "<strong>Invalid grade or attendance value.</strong>";
            } else {
                $average = $sumGrades / count($grades);

                // Decision Order Logic
                if ($status == "Inactive") {
                    $decision = "Not qualified: Applicant is inactive.";
                } elseif ($disciplinary == "Yes") {
                    $decision = "Not qualified: Disciplinary case found.";
                } elseif ($attendance < 80) {
                    $decision = "Not qualified: Attendance requirement not met.";
                } elseif ($average >= 90) {
                    $decision = "Qualified: Full scholarship.";
                } elseif ($average >= 85) {
                    $decision = "Qualified: Partial scholarship.";
                } else {
                    $decision = "Not qualified: Academic requirement not met.";
                }

                // Display Details
                echo "Applicant: " . htmlspecialchars($name) . "<br>";
                foreach ($grades as $type => $score) {
                    echo $type . ": " . $score . "<br>";
                }
                echo "Average: " . number_format($average, 2) . "<br>";
                echo "Attendance: " . htmlspecialchars($attendance) . "%<br>";
                echo "Enrollment Status: " . htmlspecialchars($status) . "<br>";
                echo "Disciplinary Case: " . htmlspecialchars($disciplinary) . "<br>";
                echo "<strong>Decision: " . $decision . "</strong>";
            }
        }
    }
    ?>
</body>
</html>
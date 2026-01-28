<!-- page1.php -->
<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html>

<head>
    <title>With Sessions</title>
</head>

<body>


    <h1>Modify array saved in session</h1>
    <form action="Excercise01Ss.php" method="post">
        <label for="position">Position to modify:</label>
        <select id="position" name="position" required>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <br>
        <br>
        <br>

        <label for="name">New value:</label>
        <input type="number" id="value" name="value" value="" required><br><br>
        <input type="submit" value="Modify" name="modify">
        <input type="submit" value="Average" name="average">
        <input type="reset" value="Reset">
    </form>
    <p>Current Array: <?php echo implode(separator: ", ", array: $_SESSION['numbers']); ?></p>
    <?php if (isset($average)) {
        echo "<p>Average: $average </p>";
    } ?>

</body>

</html>
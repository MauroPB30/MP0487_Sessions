<?php
session_start();

// Este if es necesesario porque si no se usa cada vez
// que recargue la pagina se reinicia el array
if (!isset($_SESSION['numbers'])) {
    $_SESSION['numbers'] = array(10, 20, 30);
}

$average = "";
// En esta parte vamos a diseñar las funcionalidades de cada boton
if (isset($_POST['modify'])) {
    // Este modificara el array
    $position = $_POST['position'];
    $newValue = $_POST['newValue'];

    $_SESSION['numbers'][$position] = $newValue;
}

if (isset($_POST['average'])) {
    // Este calculara el promedio de los valores que se encuentren en el array
    $sum = array_sum($_SESSION['numbers']);
    $count = count($_SESSION['numbers']);
    $average = $sum / $count;
}

if (isset($_POST['reset'])) {
    // Este limpiara el Array y volvera a sus valores iniciales
    session_destroy();
    session_start();
    $_SESSION['numbers'] = array(10, 20, 30);

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Excercise 01 Sessions</title>
</head>
<body>
    
    <h1>Modify array saved in session</h1>
    
    <form method="post">
        <!-- Esta parte del body es netamente visual -->
        <label>Position to modify:</label>
        <select name="position" required>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <br>
        <br>

        <label for="name">New value:</label>
        <input type="number" name="newValue" value=""><br><br>
        <button type="submit" name="modify">Modify</button>
        <button type="submit" name="average">Average</button>
        <button type="submit" name="reset">Reset</button><br><br>
    </form>

    <h4>Current Array:
        <?php
        echo implode(", ", $_SESSION['numbers']);

        ?>
    </h4>
<?php

    if($average !== ""){
    echo ("Average: ".$average);
    }
?>

</body>
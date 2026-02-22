<?php
session_start();


if (!isset($_SESSION['milk'])) {
    $_SESSION['milk'] = 0;
}

if (!isset($_SESSION['soft'])) {
    $_SESSION['soft'] = 0;
}

if (!isset($_SESSION['worker'])) {
    $_SESSION['worker'] = "";
}

if (isset($_POST['worker'])) {
    $_SESSION['worker'] = $_POST['worker'];
}

// ADD
if (isset($_POST['add'])) {
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    if ($product == "milk") {
        $_SESSION['milk'] += $quantity;
    }
    if ($product == "soft") {
        $_SESSION['soft'] += $quantity;
    }
}

// REMOVE
if (isset($_POST['remove'])) {
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    if ($product == "milk") {
        if ($quantity <= $_SESSION['milk']) {
            $_SESSION['milk'] -= $quantity;
        }
    }
    if ($product == "soft") {
        if ($quantity <= $_SESSION['soft']) {
            $_SESSION['soft'] -= $quantity;
        }
    }
}

//RESET
if (isset($_POST['reset'])) {
    session_destroy();
    session_start();
    $_SESSION['milk'] = 0;
    $_SESSION['soft'] = 0;
    $_SESSION['worker'] = "";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Excercise 02 Sessions</title>
</head>

<body>

    <h1>Modify array saved in session</h1>

    <form method="post">

        <label>Worker name:</label>
        <input type="text" name="worker" value="<?php echo $_SESSION['worker']; ?>" required>
        <br><br>

        <label>Choose product:</label>
        <select name="product">
            <option value="milk">Milk</option>
            <option value="soft">Soft Drink</option>
        </select>
        <br><br>

        <label>Product quantity:</label>
        <input type="number" name="quantity" min="1">
        <br><br>

        <button type="submit" name="add">Add</button>
        <button type="submit" name="remove">Remove</button>
        <button type="submit" name="reset">Reset</button>

    </form>

    <h3>Inventory:</h3>
    <p>Worker: <?php echo $_SESSION['worker']; ?></p>
    <p>Units milk: <?php echo $_SESSION['milk']; ?></p>
    <p>Units soft drink: <?php echo $_SESSION['soft']; ?></p>

</body>

</html>
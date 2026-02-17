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

if (!isset($_SESSION['worker'])) {
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

    if ($product <= "milk") {
        $_SESSION['milk'] -= $quantity;
    }
    if ($product <= "soft") {
        $_SESSION['soft'] -= $quantity;
    }
}

//RESET
if (isset($_POST['reset'])) {
    session_destroy();
    session_start();
    $_SESSION['milk'] = 0;
    $_SESSION['sotf'] = 0;
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
        <!-- Esta parte del body es netamente visual -->
        <label>Worker name:</label>
        <input type="text" name="worker" value="<?php echo $_SESSION['worker']; ?>" required><br><br>
        <br>
        <br>

        <label>Choose product</label>
        <select name="product" required>
            <option value="Milk">Milk</option>
            <option value="Soft">Soft Drink</option>
        </select>
        <br>
        <br>

        <label for="name">Product Quantity:</label>
        <input type="number" name="quantity" min="1" required><br><br>
        <button type="submit" name="add">Add</button>
        <button type="submit" name="remove">Remove</button>
        <button type="submit" name="reset">Reset</button><br><br>
    </form>

    <h4>
        <h3>INVENTORY:</h3>

        <p>Worker: <?php echo $_SESSION['worker']; ?></p>
        <p>Units milk: <?php echo $_SESSION['milk']; ?></p>
        <p>Units soft drink: <?php echo $_SESSION['soft']; ?></p>


</body>
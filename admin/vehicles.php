<?php
require_once '../models/database.php';
require_once '../models/vehicles_db.php';
require_once '../models/makes_db.php';
require_once '../models/types_db.php';
require_once '../models/classes_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = (int)$_POST['year'];
    $model = trim($_POST['model']);
    $price = (float)$_POST['price'];
    $make_id = (int)$_POST['make_id'];
    $type_id = (int)$_POST['type_id'];
    $class_id = (int)$_POST['class_id'];
    if ($year && $model && $price && $make_id && $type_id && $class_id) {
        add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
        header("Location: vehicles.php");
        exit;
    }
}
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();
?>
<!DOCTYPE html>
<html>
<head><title>Add Vehicle</title></head>
<body>
<h1>Add Vehicle</h1>
<form method="post">
  <input type="number" name="year" placeholder="Year" required>
  <input type="text" name="model" placeholder="Model" required>
  <input type="number" step="0.01" name="price" placeholder="Price" required>
  <select name="make_id" required>
    <option value="">Make</option>
    <?php foreach ($makes as $make): ?>
    <option value="<?= $make['makeID'] ?>"><?= $make['make'] ?></option>
    <?php endforeach; ?>
  </select>
  <select name="type_id" required>
    <option value="">Type</option>
    <?php foreach ($types as $type): ?>
    <option value="<?= $type['typeID'] ?>"><?= $type['type'] ?></option>
    <?php endforeach; ?>
  </select>
  <select name="class_id" required>
    <option value="">Class</option>
    <?php foreach ($classes as $class): ?>
    <option value="<?= $class['classID'] ?>"><?= $class['class'] ?></option>
    <?php endforeach; ?>
  </select>
  <button type="submit">Add Vehicle</button>
</form>
<p><a href="index.php">Back to Admin Home</a></p>
</body>
</html>

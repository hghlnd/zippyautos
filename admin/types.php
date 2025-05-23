<?php
require_once '../models/database.php';
require_once '../models/types_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_type']) && !empty(trim($_POST['type']))) {
        add_type(trim($_POST['type']));
    } elseif (isset($_POST['delete_id'])) {
        delete_type((int)$_POST['delete_id']);
    }
    header("Location: types.php");
    exit;
}
$types = get_all_types();
?>
<!DOCTYPE html>
<html>
<head><title>Manage Types</title></head>
<body>
<h1>Manage Types</h1>
<form method="post">
  <input type="text" name="type" placeholder="New Type">
  <button type="submit" name="add_type">Add</button>
</form>
<table>
  <tr><th>Type</th><th>Action</th></tr>
  <?php foreach ($types as $type): ?>
  <tr>
    <td><?= $type['type'] ?></td>
    <td>
      <form method="post">
        <input type="hidden" name="delete_id" value="<?= $type['typeID'] ?>">
        <button type="submit">Delete</button>
      </form>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<p><a href="index.php">Back to Admin Home</a></p>
</body>
</html>

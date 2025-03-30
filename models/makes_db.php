<?php
function get_all_makes() {
    global $db;
    $query = 'SELECT * FROM makes ORDER BY make';
    return $db->query($query)->fetchAll();
}
function add_make($make) {
    global $db;
    $stmt = $db->prepare("INSERT INTO makes (make) VALUES (:make)");
    $stmt->bindValue(':make', $make);
    $stmt->execute();
}
function delete_make($make_id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM makes WHERE makeID = :id");
    $stmt->bindValue(':id', $make_id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
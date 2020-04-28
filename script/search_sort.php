<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchQuery = !empty($search) ? " WHERE (description LIKE '%" . $search . "%') OR (name LIKE '%" . $search . "%')" : '';

$columns = array('id', 'name', 'description', 'sprice', 'mprice', 'lprice', 'papryczki');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

$up_or_down = str_replace(array('ASC', 'DESC'), array('up', 'down'), $sort_order);

$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';

$sql = "SELECT id, name, description, sprice, mprice, lprice, papryczki FROM ddd_menu_pizza" . $searchQuery . " ORDER BY " . $column . " " . $sort_order;
$result = $mysqli->query($sql);
?>
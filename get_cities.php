
get_cities.php:

<?php
// підключення до бази даних
require_once('db_connect.php');

// зчитуємо всі міста з бази даних
$result = mysqli_query($con, "SELECT name FROM City");

$cityList = [];
while ($row = mysqli_fetch_assoc($result)) {
    $cityList[] = $row['name']; // додаємо міста до масиву
}

// відправляємо назад список всіх міст як JSON
echo json_encode($cityList);

mysqli_close($con);
?>
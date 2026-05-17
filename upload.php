upload.php:

<?php
// підключення до бази даних
require_once('db_connect.php');

// отримуємо дані POST (JSON)
$data = file_get_contents('php://input');

// декодуємо JSON
$cities = json_decode($data, true);

// перевіряємо, що це масив
if (is_array($cities)) {
    foreach ($cities as $city) {
        // додаємо кожне місто до бази даних
        $name = mysqli_real_escape_string($con, $city);
        $sql = "INSERT INTO City (name) VALUES ('$name')";
        if (!mysqli_query($con, $sql)) {
            echo "Помилка при додаванні міста: " . mysqli_error($con);
            exit;
        }
    }
    echo "Міста успішно додано!";
} else {
    echo "Помилка: Неправильний формат даних.";
}

mysqli_close($con);
?>
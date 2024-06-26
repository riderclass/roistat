<?php
print_r($_POST);
/* Не записываем данные в лог, если нет согласия с политикой конфиденциальности */
if($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['policy']) &&
    $_POST['policy'] == 'yes')
{
    $name = trim($_POST['name']);
    $company = trim($_POST['company']);
    $telephone = trim($_POST['telephone']);
    $errors = [];

    /*Дополнительная проверка имени и телефона*/

    if (empty($name)) {
        $errors[] = "Имя обязательно для заполнения.";
    } elseif (!preg_match("/^[a-zA-Zа-яА-Я\-\ ]*$/u", $name)) {
        $errors[] = "Имя может содержать только буквы и пробелы.";
    }

    if (empty($telephone)) {
        $errors[] = "Телефон обязателен для заполнения.";
    }

    if (empty($errors)) {
        echo "Имя: " . htmlspecialchars($name) . "<br>";
        echo "Компания: " . htmlspecialchars($company);
        echo "Телефон: " . htmlspecialchars($telephone) . "<br>";
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
    /* Записываем данные в лог */
    if(isset($_POST['Enter'])) {
        $file = "log.txt";
        $fopen = fopen($file, "a+");
        $current = $_POST['name'] ."\n";
        $current .= $_POST['company']."\n";
        $current .= $_POST['telephone']."\n";
        $current .= "\n\n";
        fwrite($fopen, $current);
        fclose($fopen);
    }

} else 
{
    echo "Нет согласия на обработку данных";
}
?>
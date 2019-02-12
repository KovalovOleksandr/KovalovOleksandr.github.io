<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
</head>
<body>
<div><a href="index.php"><button>Назад на страницу с формой</button></a></div>

<?php
$available = 10000; // доступно денег в банкомате.

// Функция для подсчета количества купюр заданного номинала.
function money($amount, $value)
{
    if ($amount >= $value) {
        for ($count = 0; $amount >= $value; $count++, $amount = $amount - $value)
            echo "";
        echo "$value грн - $count шт.;<br/>";
        return $amount;
    }
    return $amount;
}

if ($_GET["amount"] != null) {
    $amount = $_GET["amount"];
    switch ($amount) {
        case $amount < 0:
            echo "Введено недопустимое значение!<br/>Сумма не может быть отрицательной или равняться нулю.<br/>Необходимо ввести целое позитивное число.";
            break;
        case (string)$amount != (string)(int)$amount:
            echo "Введено недопустимое значение!<br/>Необходимо ввести целое позитивное число.";;
            break;
        case $amount > $available:
            echo "Введенная сумма не может быть выдана!<br/>В банкомате недостаточно денег!<br/>Доступная к выдаче сумма: $available грн.";
            break;
        case $amount % 5 != 0:
            echo "Введенная сумма не может быть выдана!<br/>Минимальная купюра 5 грн.<br/>Введите сумму кратную 5 грн.";
            break;
        default:
            echo "Вам выдано $amount грн, из них:<br/>";
            $amount = money($amount, 500);
            $amount = money($amount, 200);
            $amount = money($amount, 100);
            $amount = money($amount, 50);
            $amount = money($amount, 20);
            $amount = money($amount, 10);
            $amount = money($amount, 5);
    }
}
?>

</body>
</html>

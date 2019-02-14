<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="acct">
    <h1>PHP-Банк</h1>
    <h2>Квитанция</h2>

    <?php

    $banknote = array(5 => 100, 10 => 100, 20 => 100, 50 => 100, 100 => 100, 200 => 100, 500 => 100); // Массив номиналов купюр и их количества.

    // Всего доступно денег в банкомате.
    foreach ($banknote as $key => $value) {
        $available = $available + $key * $value;
    }

    // Функция для подсчета количества выдаваемых купюр заданного номинала.
    function money($amount, $value, $banknote)
    {
        if ($amount >= $value) {
            for ($count = 0; $amount >= $value && $banknote > 0; $count++, $amount = $amount - $value, $banknote--)
                echo "";
            echo "<p>$value грн - $count шт.;</p><br/>";
            return $amount;
        }
        return $amount;
    }

    if ($_GET["amount"] != null) {
        $amount = $_GET["amount"];
        switch ($amount) {
            case $amount < 0:
                echo "<p>Введено недопустимое значение!</p><br/><p>Введенная сумма не может быть отрицательной или равняться нулю.</p><br/><p>Необходимо ввести целое положительное число.</p><br/>";
                break;
            case (string)$amount != (string)(int)$amount:
                echo "<p>Введено недопустимое значение!</p><br/><p>Необходимо ввести целое положительное число.</p><br/>";
                break;
            case $amount > $available:
                echo "<p>Введенная сумма не может быть выдана!</p><br/><p>В банкомате недостаточно денег!</p><br/><p>Доступная к выдаче сумма: $available грн.</p><br/>";
                break;
            case $amount % 5 != 0:
                echo "<p>Введенная сумма не может быть выдана!</p><br/><p>Минимальная купюра 5 грн.</p><br/><p>Введите сумму кратную 5 грн.</p><br/>";
                break;
            default:
                echo "<p>Вам выдано $amount грн, из них:</p><br/>";
                $amount = money($amount, 500, $banknote[500]);
                $amount = money($amount, 200, $banknote[200]);
                $amount = money($amount, 100, $banknote[100]);
                $amount = money($amount, 50, $banknote[50]);
                $amount = money($amount, 20, $banknote[20]);
                $amount = money($amount, 10, $banknote[10]);
                $amount = money($amount, 5, $banknote[5]);
        }
    } else {
        echo "<p>Ошибка, поле ввода не может быть пустым!</p><br/><p>Необходимо ввести целое положительное число.</p><br/>";
    }

    // Вывод даты и времени операции.
    date_default_timezone_set('Europe/Kiev');
    echo "<br/><p>Дата операции: " . date("d.m.Y") . "</p><br/>";
    echo "<p>Время операции: " . date("H:i:s") . "</p><br/>";
    ?>

</div>
<div class="divButton">
    <a href="index.html">
        <button>Назад на страницу с формой</button>
    </a>
</div>
</body>
</html>

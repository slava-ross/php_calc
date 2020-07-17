<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>PHP-калькулятор</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h2>Калькулятор</h2>
        <div class="calc_form">

            <?php
                if (isset($_POST['submit'])) {
                    $operand1 = trim($_POST['operand1']);
                    $operand2 = trim($_POST['operand2']);
                    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

                    function doOperation($arg1, $arg2, $oper) {
                        switch ($oper) {
                            case 'add':
                                return $arg1 + $arg2;
                            case 'sub':
                                return $arg1 - $arg2;
                            case 'mul':
                                return $arg1 * $arg2;
                            case 'div':
                                if (!$arg2) {
                                    return NULL;
                                }
                                else {
                                    return $arg1 / $arg2;
                                }
                            case 'mod':
                                if (!$arg2) {
                                    return NULL;
                                }
                                else {
                                    return $arg1 % $arg2;
                                }
                            case 'pwr':
                                return $arg1 ** $arg2;
                        }
                    }

                    $errors = array();

                    if (empty($operand1) && !is_numeric($operand1)) {
                        $errors[] = "Отсутствует операнд 1!";
                    }
                    elseif (!preg_match("|^[-]?[\d]*[\.]?[\d]*$|", $operand1)) {
                        $errors[] = "Неверный формат операнда 1! ([-]d[.d])";
                    }
                    if (empty($operand2) && !is_numeric($operand2)) {
                        $errors[] = "Отсутствует операнд 2!";
                    }
                    elseif (!preg_match("|^[-]?[\d]*[\.]?[\d]*$|", $operand2)) {
                        $errors[] = "Неверный формат операнда 2! ([-]d[.d])";
                    }

                    if(empty($operation)) {
                        $errors[] = "Не указана операция!";
                    }
                    if (count($errors) === 0) {
                        $result = doOperation($operand1, $operand2, $operation);
                        $display = ($result === NULL) ? "Divider is zero!" : $result;
                    }
                    else {
                        foreach ( $errors as $errorMsg ) {
                            print('<p class="message error">'.$errorMsg.'</p>');
                        }
                    }
                }
            ?>

            <form method="post">
                <p class="message result"><?php echo (isset($display)) ? "$display" : "0" ?></p>
                <p>
                    <label>
                        <b>Операнд 1:</b><br>
                        <input type="text" name="operand1" placeholder="Введите первый операнд" value="<?php if(isset($_POST['operand1'])) print $_POST['operand1'] ?>">
                    </label>
                </p>
                <p>
                    <label>
                        <b>Операнд 2:</b><br>
                        <input type="text" name="operand2" placeholder="Введите второй операнд" value="<?php if(isset( $_POST['operand2'])) print $_POST['operand2'] ?>">
                    </label>
                </p>
                <p>
                    <b>Операция:</b><br>
                    <label>
                        <input type="radio" name="operation" value="add"
                            <?php
                                if(isset($_POST['operation'])) {
                                    if($_POST['operation']=='add') {
                                        print('checked="checked"');
                                    }
                                }
                            ?>
                        > Сложение
                    </label><br>
                    <label>
                        <input type="radio" name="operation" value="sub"
                            <?php
                                if(isset($_POST['operation'])) {
                                    if($_POST['operation']=='sub') {
                                        print('checked="checked"');
                                    }
                                }
                            ?>
                        > Вычитание
                    </label><br>
                    <label>
                        <input type="radio" name="operation" value="mul"
                            <?php
                                if(isset($_POST['operation'])) {
                                    if($_POST['operation']=='mul') {
                                        print('checked="checked"');
                                    }
                                }
                            ?>
                        > Умножение
                    </label><br>
                    <label>
                        <input type="radio" name="operation" value="div"
                            <?php
                                if(isset($_POST['operation'])) {
                                    if($_POST['operation']=='div') {
                                        print('checked="checked"');
                                    }
                                }
                            ?>
                        > Деление
                    </label><br>
                    <label>
                        <input type="radio" name="operation" value="mod"
                            <?php
                                if(isset($_POST['operation'])) {
                                    if($_POST['operation']=='mod') {
                                        print('checked="checked"');
                                    }
                                }
                            ?>
                        > Деление по модулю
                    </label><br>
                    <label>
                        <input type="radio" name="operation" value="pwr"
                            <?php
                                if(isset($_POST['operation'])) {
                                    if($_POST['operation']=='pwr') {
                                        print('checked="checked"');
                                    }
                                }
                            ?>
                        > Возведение в степень
                    </label><br>
                </p>
                <p><input type="submit" name="submit" value="Вычислить"></p>
                <!--p><input type="button" onclick="document.getElementById('myForm').reset()" value="reset"></p-->
                <p><input type="reset" name="reset" value="Сброс"></p>
            </form>
        </div>
    </body>
</html>
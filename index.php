<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>PHP-калькулятор</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
       


        <main>
            <div class="main_section">
                <div class="main_block">
                    <?php 
                        if ( $vars['message'] == '' ) {
                            print ('<h2>Добро!</h2>
                                <p>Лорем ипсум</p>'
                            );
                        }
                        else print ( $vars['message'] );
                    ?>
                </div>
            </div>
        </main>

<main>
    <div class="reg_form">
        <form method="post">
            <p><label><b>Операнд 1:</b><br>
                <input type="text" name="operand1" placeholder="Введите первый операнд" value="<?php if( isset( $_POST['op1'] )) print $_POST['op1'] ?>">
            </label></p>
            <p><label><b>Операнд 2:</b><br>
                <input type="text" name="operand2" placeholder="Введите второй операнд" value="<?php if( isset( $_POST['op2'] )) print $_POST['op2'] ?>">
            </label></p>
            <p><b>Операция:</b><br>
                <label>Сложение:<input type="radio" name="operation" value="add" <?php if(isset($_POST['operation'])) { if($_POST['operation']=='add' ) print( 'checked="checked"' ); } ?> ></label>
                <label>Вычитание:<input type="radio" name="operation" value="sub" <?php if(isset($_POST['operation'])) { if($_POST['operation']=='sub' ) print( 'checked="checked"'); } ?> ></label>
                <label>Умножение:<input type="radio" name="operation" value="mul" <?php if(isset($_POST['operation'])) { if($_POST['operation']=='mul' ) print( 'checked="checked"'); } ?> ></label>
                <label>Деление:<input type="radio" name="operation" value="div" <?php if(isset($_POST['operation'])) { if($_POST['operation']=='div' ) print( 'checked="checked"'); } ?> ></label>
                <label>Деление по модулю:<input type="radio" name="operation" value="mod" <?php if(isset($_POST['operation'])) { if($_POST['operation']=='mod' ) print( 'checked="checked"'); } ?> ></label>
                <label>Возведение в степень:<input type="radio" name="operation" value="power" <?php if(isset($_POST['operation'])) { if($_POST['operation']=='power' ) print( 'checked="checked"'); } ?> ></label>
                <label>Квадратный корнень:<input type="radio" name="operation" value="sqroot" <?php if(isset($_POST['operation'])) { if($_POST['operation']=='sqroot' ) print( 'checked="checked"'); } ?> ></label>
            </p>
            
            <p><input type="submit" name="submit" value="Вычислить"></p>
            <p>
                <?php
                    if ( $vars['is_send'] == true ) {
                        if ( count( $vars['result'] ) == 0 ) {
                            print('<p class="message">Спасибо!</p>');
                        }
                        else {
                            $errorsArr = $vars['result'];
                            foreach ($errorsArr as $errorMsg) {
                                print('<p class="error_msg">'.$errorMsg.'</p>'); 
                            }
                        }
                    }
                ?>
            </p>
        </form>
    </div>
</main>


    </body>
</html>        
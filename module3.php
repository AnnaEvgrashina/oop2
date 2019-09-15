<?php

require 'src/Question.php';

use Question\Question;

$questions = [
    new Question('Какой тип оператора будет анализироваться в первую очередь
                            (имеет больший приоритет) в выражении SQL из представленных:', [
        'унарные + и -',
        'IS ,NULL',
        'NOT',
        'AND',
    ]),
    new Question('Выберите корректный пример использования функции CONCAT:', [
        'select concat(`index`," ", `city`) from Orders',
        'нет правильного примера',
        'select concat IN (`index`, `city`) from Orders',
        'select concat = index and city from Orders',
    ]),
    new Question('Выберите правильный SQL запрос для вставки новой записи в таблицу "Persons"', [
        'INSERT INTO Persons VALUES (\'Jimmy\', \'Jackson\')',
        'INSERT (\'Jimmy\', \'Jackson\') INTO Persons',
        'INSERT VALUES (\'Jimmy\', \'Jackson\') INTO Persons',
        'Нет правильного ответа',
    ]),
    new Question('Какой оператор SQL используется для извлечения данных из базы данных?', [
        'SELECT',
        'GET',
        'EXTRACT',
        'OPEN',
    ]),
    new Question('Какой оператор SQL используется для обновления данных в базе данных?', [
        'UPDATE',
        'SAVE',
        'MODIFY',
        'SAVE AS',
    ]),
    new Question('Какой оператор SQL используется для удаления данных из базы данных?', [
        'DELETE',
        'COLLAPSE',
        'REMOVE'
    ]),
    new Question('Какой оператор SQL используется для вставки новых данных в базу данных?', [
        'INSERT INTO',
        'ADD RECORD',
        'INSERT NEW',
        'ADD NEW',
    ]),
    new Question('Какой оператор SQL используется для возврата только разных значений?', [
        'SELECT DISTINCT',
        'SELECT UNIQUE',
        'SELECT DIFFERENT'
    ]),
    new Question('Какое ключевое слово SQL используется для сортировки набора результатов?', [
        'ORDER BY',
        'SORT BY',
        'ORDER',
        'SORT',
    ]),
    new Question('Какой тип соединения является наиболее распространенным?', [
        'INNER JOIN',
        'JOINED',
        'JOINED TABLE',
        'INSIDE JOIN',
    ]),
];

$flag = true;
$count_true_answer = 0;
$count_false_answer = 0;

if (!empty($_POST)) {
    $answers = array_values($_POST);
    $flag = false;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Основы SQL</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1 class="title">Основы SQL</h1>
    <hr>
    <?php if ($flag) { ?>
        <form method="post" action="module3.php">
            <?php for ($i = 0; $i < count($questions); $i++) { ?>
                <h1><?= $questions[$i]->getQuestion() ?></h1><br>
                <?php foreach ($questions[$i]->getAnswers() as $answer) { ?>
                    <label>
                        <input type="radio" name="question_<?= $i ?>" value="<?= $answer ?>" required> <?= $answer ?>
                    </label><br>
                <?php } ?>
                <br>
            <?php } ?>
            <input class="btn btn-primary" type="submit" value="Проверить">
        </form>
    <?php } else { ?>
        <h1>Ответы</h1>
        <?php for ($i = 0; $i < count($questions); $i++) { ?>
            <h2><?= $questions[$i]->getQuestion() ?></h2>
            Ваш ответ:
            <?php if ($answers[$i] == $questions[$i]->getAnswerTrue()) { ?>
                <?php $count_true_answer++; ?>
                <div style="color: green;">
                    <?= $answers[$i] ?>
                </div>
            <?php } else { ?>
                <?php $count_false_answer++; ?>
                <div style="color: red;">
                    <?= $answers[$i] ?>
                </div>
                Правильный ответ:
                <div style="color: green;">
                    <?= $questions[$i]->getAnswerTrue() ?>
                </div>
            <?php } ?>
        <?php } ?>
        <hr>
        Количество правильных ответов: <?= $count_true_answer; ?><br>
        Количество неправильных ответов: <?= $count_false_answer; ?>
    <?php } ?>
    <hr>
    <a class="btn btn-success" href="/">На главную</a>
</div>
</body>
</html>


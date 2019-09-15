<?php

require 'src/Question.php';

use Question\Question;

$questions = [
    new Question('Какая функция используется в SQL для сортировки полученных данных?', [
        'ORDER BY',
        'DESC',
        'HAVING',
        'GROUP BY',
    ]),
    new Question('Что такое псевдоним?', [
        'Альтернативное имя для поля или значения',
        'Специальные символы, применяемые для поиска части значения',
        'Нет правильного ответа',
        'Комбинирование значений путем присоединения их друг к другу для получения одного «длинного» значения'
    ]),
    new Question('Что показывает значение NULL?', [
        'Отсутствие какого-либо значения',
        'Пустая строка',
        'Несколько пробелов',
        'В строке записано слово «NULL»',
    ]),
    new Question('Для чего предназначена команда DISTINCT?', [
        'Извлечение уникальных строк',
        'Извлечение данных',
        'Сортировка данных в алфавитном порядке по возрастанию',
        'Сортировка данных в алфавитном порядке по убыванию'
    ]),
    new Question('Какая команда создает таблицы?', [
        'CREATE TABLE',
        'ALTER TABLE',
        'DROP TABLE',
        'DELETE TABLE',
    ]),
    new Question('Что такое SQL?', [
        'Язык структурированных запросов',
        'Язык запросов',
        'Язык создания баз данных',
        'Язык определения баз данных'
    ]),
    new Question('Что из перечисленного не является системой управления БД?', [
        'WordPad',
        'MySQL',
        'SQL Server',
        'Microsoft Access',
    ]),
    new Question('Какие типы данных существуют в БД MS Access?', [
        'Все ответы правильные',
        'Текстовый',
        'Логический',
        'Счетчик'
    ]),
    new Question('Какое расширение имеет файл СУБД Access?', [
        '*.accdb',
        '*.doc',
        '*.xls',
        '.exe',
    ]),
    new Question('Что такое нормализация БД?', [
        'Процесс реорганизации данных путем ликвидации избыточности данных',
        'Дублирование данных',
        'Объединение нескольких таблиц в одну',
        'Приведение БД к виду, удобному для пользователя'
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
    <title>Проектирование баз данных</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1 class="title">Проектирование баз данных</h1>
    <hr>
    <?php if ($flag) { ?>
        <form method="post" action="module2.php">
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

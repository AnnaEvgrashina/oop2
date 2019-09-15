<?php

require 'src/Question.php';

use Question\Question;

$questions = [
    new Question('База данных - это:', [
        'Совокупность данных, организованных по определенным правилам',
        'Интерфейс, поддерживающий наполнение и манипулирование данными',
        'Определенная совокупность информации',
        'Совокупность программ для хранения и обработки больших массивов информации',
    ]),
    new Question('Наиболее распространенными в практике являются:', [
        'Реляционные базы данных',
        'Сетевые базы данных',
        'Иерархические базы данных',
        'Распределенные базы данных',
    ]),
    new Question('Наиболее точным аналогом реляционной базы данных может служить:', [
        'Двумерная таблица',
        'Генеалогическое дерево',
        'Вектор',
        'Неупорядоченное множество данных',
    ]),
    new Question('Что из перечисленного не является объектом Access:', [
        'Ключи',
        'Формы',
        'Таблицы',
        'Запросы',
    ]),
    new Question('Таблицы в базах данных предназначены:', [
        'Для хранения данных базы',
        'Для отбора и обработки данных базы',
        'Для ввода данных базы и их просмотра',
        'Для автоматического выполнения группы команд',
    ]),
    new Question('Для чего предназначены запросы:', [
        'Для отбора и обработки данных базы',
        'Для хранения данных базы',
        'Для ввода данных базы и их просмотра',
        'Для выполнения сложных программных действий',
    ]),
    new Question('В каком режиме работает с базой данных пользователь:', [
        'В эксплуатационном',
        'В заданном',
        'В любительском',
        'В проектировочном',
    ]),
    new Question('В каком диалоговом окне создают связи между полями таблиц базы данных:', [
        'Схема данных',
        'Схема связей',
        'Таблица связей',
        'Таблица данных',
    ]),
    new Question('Почему при закрытии таблицы программа Access не предлагает выполнить сохранение внесенных данных:', [
        'Потому что данные сохраняются сразу после ввода в таблицу',
        'Потому что данные сохраняются только после закрытия всей базы данных',
        'Недоработка программы',
        'Программа всегда предлагает сохранять данные при закрытии',
    ]),
    new Question('Без каких объектов не может существовать база данных:', [
        'Без таблиц',
        'Без отчетов',
        'Без форм',
        'Без макросов',
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
    <title>Основные понятия теории баз данных</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Основные понятия теории баз данных</h1>
        <hr>
        <?php if ($flag) { ?>
        <form method="post" action="module1.php">
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

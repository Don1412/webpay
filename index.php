<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/functions.js"></script>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" width="170px" src="https://webpay.by/wp-content/themes/webpay/img/logo.png" alt="">
                <span class="text-muted">Demonstration my skills</span>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <ul class="list-group col-12 mb-12">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Вопрос №1</h6>
                            <small class="text-muted">
                                Дан следующий многомерный массив:
                                <pre>
$arr = [
    ['id' => 1, 'data' => ['sort' => 3], 'type' => 101, 'val' => '1600000001.60085'],
    ['id' => 2, 'data' => ['sort' => 4], 'type' => 321, 'val' => '1000060000.95275'],
    ['id' => 3, 'data' => ['sort' => 1], 'type' => 210, 'val' => '2050000047.31715'],
    ['id' => 4, 'data' => ['sort' => 5], 'type' => 764, 'val' => '3200000000.46325'],
    ['id' => 5, 'data' => ['sort' => 2], 'type' => 357, 'val' => '2146763220.81125']
];
                                </pre>
                            </small>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <small class="text-muted">
                                а) Просуммировать значение "val" всех элементов массива
                            </small>
                            <hr>
                            <h6 class="my-0" data-subtask="a">Результат:</h6>
                        </div>
                        <div>
                            <form method="post">
                                <input class="btn btn-dark" type="submit" data-task="a" name="task_1" value="Выполнить">
                            </form>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <small class="text-muted">
                                b) отсортировать элементы массива так, чтобы значения "sort" были расположены в порядке возрастания
                            </small>
                            <hr>
                            <h6 class="my-0" data-subtask="b">Результат:</h6>
                        </div>
                        <div>
                            <form method="post">
                                <input class="btn btn-dark" type="submit" data-task="b" name="task_1" value="Выполнить">
                            </form>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <small class="text-muted">
                                <p>c) в каждый элемент массива добавить обозначение группы, согласно следующему условию:</p>
                                <p>- если значение "type" начинается на цифру 1, то это группа a</p>
                                <p>- если на 32 или 36, то группа b</p>
                                <p>- если на 3[0-1,3-5,7-9], то группа c</p>
                                <p>- во всех остальных случаях группа d.</p>
                            </small>
                            <hr>
                            <h6 class="my-0" data-subtask="c">Результат:</h6>
                        </div>
                        <div>
                            <form method="post">
                                <input class="btn btn-dark" type="submit" data-task="c" name="task_1" value="Выполнить">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="row">
                <ul class="list-group col-12 mb-12 pt-5">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Вопрос №2</h6>
                            <small class="text-muted">
                                Даны 3 таблицы:
                                <pre>
billing, поля : id, name
account, поля : id, username, first_name, last_name, email
invoice, поля : id, account_id, site_id, total_amt

billing (поле id) связана с invoice (поле site_id)
account (поле id) связана с invoice (поле account_id)
                                </pre>
                                Напишите структуру этих таблиц и SQL запрос, который выберет данные со всех таблиц с условием invoice.site_id равно 5.
                            </small>
                            <hr>
                            <h6 class="my-0">Запрос:</h6>
                            <pre>SELECT * FROM `account` a INNER JOIN
`invoice` i ON a.`id` = i.`account_id` INNER JOIN
`billing` b ON b.`id` = i.`site_id` WHERE i.`site_id` = 5</pre>
                            <h6 class="my-0">Структура:</h6>
                            <pre>
CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_ibfk_1` (`site_id`),
  ADD KEY `account_id` (`account_id`);

ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `billing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
                            </pre>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <footer class="page-footer font-small blue pt-4">
            <div class="footer-copyright text-center py-3">Created by ©
                <a href="https://jobs.tut.by/resume/300c1d46ff021ab77e0039ed1f6d735a714761"> Anton Burak</a>
            </div>
        </footer>
    </body>
</html>
<p>Имя: <?= $data->name ?></p>
<p>Фамилия: <?= $data->surname ?></p>
<p>E-mail: <?= $data->email ?></p>
<p>Телефон: <?= $data->tel ?></p>
<p>Дата заказа: <?= date('d.m.Y H:i',($data->creation_date)+10800) ?></p>
<p>Детали заказа:</p>
<pre>
<?php print_r(json_decode(stripslashes($data->params))) ?>
</pre>

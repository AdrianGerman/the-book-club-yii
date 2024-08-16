<?php

use yii\helpers\Html;

?>

<h2><?= $author->toString() ?></h2>

<h2>Libros: </h2>
<ol>
    <?php foreach ($author->books as $book) { ?>
    <li><?= Html::a($book->title, ['book/detail', 'id' => $book->id]) ?></li>
    <?php } ?>
</ol>
<?php

use yii\helpers\Html;

?>

<h2><?= $author->toString() ?></h2>

<p>EL promedio de todas sus obras es: <?= $author->score ?></p>

<h2>Libros: </h2>
<ol>
    <?php foreach ($author->books as $book) { ?>
    <li>
        <?= Html::a($book->title, ['book/detail', 'id' => $book->id]) ?>
        <?= $book->author->getScore($book->id) ?>
    </li>
    <?php } ?>
</ol>
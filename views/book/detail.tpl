{use class="yii\helpers\Html"}
{title}{$book->title}{/title}
<h1>{$this->title}</h1>

<p>Un libro de {$book->author->name}.</p>

<p>{Html::a("Tengo este libro!", ["book/i-own-this-book", "book_id" => $book->id])}</p>
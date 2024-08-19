{use class='Yii'}
{use class='yii\helpers\Html'}
{use class='app\models\Book'}

<h1>Índice del sitio.</h1>

{if Yii::$app->user->isGuest}
    Hola invitado, {Html::a('login', ['site/login'])}
{else}
    {assign "user" Yii::$app->user->identity}
    hola {$user->username} 👋
    has votado {$user->votesCount} veces,con un promedio de {$user->votesAvg}
{/if}

<p>
  Hay {Html::a("{$book_count} libros", ['book/all'])} y
  {Html::a("{$author_count} autores", ['author/all'])}
  registrados en el sistema.
</p>
<h3>acciones:</h3>
<ul>
  <li>{Html::a('crear libro', ['book/new'])}</li>
  <li>{Html::a('agregar autor', ['author/new'])}</li>
</ul>


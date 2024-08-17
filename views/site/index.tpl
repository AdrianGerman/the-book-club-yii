{use class='Yii'}
{use class='yii\helpers\Html'}
{use class='app\models\Book'}

<h1>Índice del sitio.</h1>

{if Yii::$app->user->isGuest}
    Hola invitado, {Html::a('login', ['site/login'])}
{else}
    hola {Yii::$app->user->identity->username} 👋
{/if}

<p>Hay {$book_count} libros en el sistema</p>

<p>{Html::a('Crear libro', ['book/new'])}</p>


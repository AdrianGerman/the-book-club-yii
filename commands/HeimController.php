<?php

namespace app\commands;


use yii\console\Controller;
use yii\console\ExitCode;

use app\models\Book;
use app\models\Author;

class HeimController extends Controller
{
    /** 
    suma los valores de los 2 parámetros
     **/
    public function actionSuma($a, $b)
    {
        $result = $a + $b;
        printf("%0.2f\n", $result);
        return ExitCode::OK;
    }

    public function actionBooks($file)
    {
        $f = fopen($file, "r");
        while (!feof($f)) {
            $data = fgetcsv($f);
            if (!empty($data[1]) && !empty($data[2])) {
                $author = Author::find()->where(['name' => $data[2]])->one();
                if (empty($author)) {
                    $author = new Author;
                    $author->name = $data[2];
                    $author->save();
                }

                $book = new Book;
                $book->title = $data[1];
                $book->author_id = $author->id;
                $book->save();
                printf("%s\n", $book->toString());
            }
        }
        fclose($f);
        return ExitCode::OK;
    }

    public function actionGetAuthor($author_id)
    {
        $author = Author::findOne($author_id);
        if (empty($author)) {
            printf("No existe el autor\n");
            return ExitCode::DATAERR;
        }
        printf("Nombre: %s\n", $author->name);
        return ExitCode::OK;
    }
}

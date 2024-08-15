<?php

namespace app\commands;


use yii\console\Controller;
use yii\console\ExitCode;

use app\models\Book;

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
                $book = new Book;
                $book->title = $data[1];
                $book->author_id = 1;
                $book->save();
                printf("%s\n", $book->toString());
            }
        }
        fclose($f);
        return ExitCode::OK;
    }
}
<?php

use models\CustomObject;
use models\File;
use models\Functions;
use models\Point;

// Объявляем массив точек
$points = [
    new Point(1.101, 2.00523),
    new Point(2.101, 3.00523),
    new Point(3.101, 4.00523),
    new Point(4.101, 5.00523),

];

// Создаем объект
$object = new CustomObject($points);

// Получаем точку с ключом 0
$point = $object->getPoint(0);

// Меняем координату x у точки с ключом 0
$point->setX(1.102);
echo '<span style="color: darkcyan;">Проверяем изменение координаты точки</span>';
Functions::dump($object->getAllPoints());
Functions::dump($point);
echo '---------------------------------<br>';
// Добавляем новую точку
$object->addPoint(new Point(5.101, 7.712));
echo '<span style="color: darkcyan;">Новая точка</span>';
Functions::dump($object->getAllPoints());

//Удаляем точку с ключом 1
$object->deletePoint(1);

echo '<span style="color: darkcyan;">Удаление точки</span>';
Functions::dump($object->getAllPoints());

echo '---------------------------------<br>';
// Импорт данных из БД в объект
$newObject = new CustomObject();
echo '<span style="color: darkcyan;">Данные до импорта</span>';
Functions::dump($newObject->getAllPoints());
$newObject->setPointsFromDB(1);
echo '<span style="color: darkcyan;">Данные после импорта</span>';
Functions::dump($newObject->getAllPoints());

echo '---------------------------------<br>';
$myCollection = new \models\FilesCollection();
$myCollection->addFile(new File('name', 'type', 'tmp', 0, 100));
$newObject2 = new CustomObject([], $myCollection);

echo '<span style="color: darkcyan;">Создали коллекцию файлов</span>';
Functions::dump($myCollection->getAllFiles());

$newObject2->filesCollection->getFile(0)->setName('name2');
echo '<span style="color: darkcyan;">Добавили ее в объект</span>';
Functions::dump($myCollection->getAllFiles());
Functions::dump($newObject2->filesCollection->getAllFiles());
?>

<form class="mt-5 mb-5" action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" multiple>
    <button type="submit">Загрузить</button>
</form>

<?php
namespace controllers;

use models\CustomObject;
use models\DB;
use models\File;
use models\Functions;
use models\Render;

class Controller
{
    public function index()
    {
        return Render::view('index');
    }

    public function upload()
    {
        if (isset($_FILES['file'])) {
            $files = Functions::reArrayFiles($_FILES['file']);

            $object = new CustomObject();
            foreach ($files as $file) {
                if ($file['error'] == 0) {
                    $object->filesCollection->addFile(
                        new File(
                            $file['name'],
                            $file['type'],
                            $file['tmp_name'],
                            $file['error'],
                            $file['size'])
                    );
                }
            }

            Functions::dump($object->filesCollection->getAllFiles());
            Functions::dump($object->filesCollection->getFile(1)->getName());
        } else {
            header("Location: /");
            exit;
        }
    }
}
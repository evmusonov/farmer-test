<?php
namespace models;

class Functions
{
    public static function dump($content, $exit = false) : void
    {
        echo '<pre>' . print_r($content, 1) . '</pre>';
        if ($exit) {
            exit;
        }
    }

    public static function reArrayFiles(&$filePost)
    {
        $fileArray = [];
        $fileCount = count($filePost['name']);
        $fileKeys = array_keys($filePost);

        for ($i = 0; $i < $fileCount; $i++) {
            foreach ($fileKeys as $key) {
                $fileArray[$i][$key] = $filePost[$key][$i];
            }
        }

        return $fileArray;
    }
}
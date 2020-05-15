<?php

namespace models;

class CustomObject
{
    private array $points;
    public FilesCollection $filesCollection;

    public function __construct(array $points = [], FilesCollection $collection = null)
    {
        $this->points = $points;
        if (is_null($collection)) {
            $this->filesCollection = new FilesCollection();
        } else {
            $this->filesCollection = clone $collection;
        }
    }

    public function getAllPoints() : array
    {
        return $this->points;
    }

    public function getPoint(int $index) : ?Point
    {
        if (isset($this->points[$index])) {
            return $this->points[$index];
        }

        return null;
    }

    public function addPoint(Point $point) : void
    {
        $this->points[] = $point;
    }

    public function deletePoint(int $index) : bool
    {
        if (isset($this->points[$index])) {
            unset($this->points[$index]);
            return true;
        }

        return false;
    }

    public function setPointsFromDB(int $objectId) : bool
    {
        if ($objectId <= 0) {
            return false;
        }

        $db = DB::getDB();
        $query = "SELECT * FROM `points` WHERE `object_id` = {$objectId}";
        $rows = $db->select($query);

        if (count($rows)) {
            $this->points = []; // Обнуляем массив точек
            foreach ($rows as $point) {
                $this->points[] = new Point($point['x'], $point['y']);
            }

            return true;
        }

        return false;
    }


}
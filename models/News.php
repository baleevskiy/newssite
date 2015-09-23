<?php

namespace models;


use mvc\App;
use mvc\Exceptions\NotFoundException;

class News{
    static $data = [
        1 => [
            'title' => 'test1',
            'body' => 'test'
        ],
        2 => [
            'title' => 'test2',
            'body' => 'test2'
        ],
        3 => [
            'title' => 'test3',
            'body' => 'test3'
        ],
        4 => [
            'title' => 'test4',
            'body' => 'test4'
        ],
        5 => [
            'title' => 'test5',
            'body' => 'test6'
        ]
    ];

    public static function getByIdOr404($newsId)
    {
        if(isset(self::$data[$newsId])){
            return self::$data[$newsId];
        }
        throw new NotFoundException();
    }

    public static function lastTwoNews()
    {
        return array_slice(self::$data, 0, 3);
    }

}
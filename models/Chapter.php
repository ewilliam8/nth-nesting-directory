<?php


class Chapter
{
    private $fields = [
        'name' => [
            'field_name' => 'Название раздела',
            'required' => 1,
        ],
        'description' => [
            'field_name' => 'Описание',
            'required' => 0,
        ],
        'parent_id' => [
            'field_name' => 'Описание',
            'required' => 0,
        ],
        'updated_at' => [
            'field_name' => 'update',
            'required' => 1,
        ],
        'created_at' => [
            'field_name' => 'create',
            'required' => 1,
        ],
    ];

    public function abc()
    {

    }
}
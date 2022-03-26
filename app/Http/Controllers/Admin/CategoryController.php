<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;

class CategoryController extends CrudController
{
    public function setup()
    {
        $this->model = Category::class;
        $this->title = 'Категории';
        $this->setRoutes('category', 'categories');

        $this->addColumns([
            [
                'name' => 'id',
                'text' => 'ID',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'text' => 'Имя',
                'type' => 'text',
            ],
            [
                'name' => 'slug',
                'text' => 'Slug',
                'type' => 'text',
            ],
            [
                'name' => 'published',
                'text' => 'Опубликован',
                'type' => 'check',
            ],
        ]);

        $this->addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Название категории',
            ],
            [
                'name' => 'slug',
                'type' => 'text',
                'label' => 'Slug',
            ],
            [
                'name' => 'published',
                'type' => 'check',
                'label' => 'Опубликован',
            ],
        ]);

        $this->addButtons(['edit', 'delete', 'add']);
    }
}

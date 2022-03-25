<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends CrudController
{
    public function setup()
    {
        $this->model = Material::class;
        $this->title = 'Материалы';

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
    }
}

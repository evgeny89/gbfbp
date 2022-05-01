<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends CrudController
{
    protected $validation = [
        'name' => 'required|string|min:3|max:255',
        'slug' => 'required|string|min:3|max:255',
        'published' => 'required|boolean',
    ];

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

    public function create(Request $request)
    {
        $request = $this->validationData($request);

        return parent::create($request);
    }

    public function update(Request $request, $id)
    {
        $request = $this->validationData($request);

        return parent::update($request, $id);
    }

    protected function validationData($request)
    {
        if (!$request->filled('slug')) {
            $request->merge(['slug' => Str::slug($request->name, '-')]);
        }

        $request->validate($this->validation);

        return $request;
    }
}

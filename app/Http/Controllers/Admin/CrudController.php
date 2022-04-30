<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CrudController extends Controller
{
    protected $columns, $model, $title, $all_fields, $create_fields, $update_fields, $buttons, $routes;

    public function __construct()
    {
        $this->title = 'entry';
        $this->columns = collect([]);
        $this->all_fields = collect([]);
        $this->create_fields = collect([]);
        $this->update_fields = collect([]);
        $this->buttons = collect([
            'edit' => false,
            'delete' => false,
            'add' => false,
        ]);
        $this->routes = collect([
            'edit' => '',
            'delete' => '',
            'add' => '',
        ]);
        $this->setup();
    }

    public function setup()
    {
    }

    /**
     * @return View
     * table entries
     */
    public function list(): View
    {
        return view('admin.layout.react-base', [
            'dataAdmin' => $this->getJson()
        ]);
    }

    /**
     * @return View
     * create new entry form
     */
    public function newEntry(): View
    {
        $fields = $this->all_fields->merge($this->create_fields);
        return view('admin.base.new_item', ['fields' => $fields, 'routes' => $this->routes]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * create new entry
     */
    public function create(Request $request): RedirectResponse
    {
        if (!$this->buttons['add']) {
            return redirect()->route('home');
        }
        $this->model::create($request->all());
        return redirect()->route($this->routes['all']);
    }

    /**
     * @param $id
     * @return View
     * edit entry
     */
    public function edit($id): View
    {
        $entry = $this->model::find($id);
        $fields = $this->all_fields->merge($this->update_fields);
        return view('admin.base.item', ['entry' => $entry, 'fields' => $fields, 'routes' => $this->routes]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * update entry properties
     */
    public function update(Request $request, $id)
    {
        if (!$this->buttons['edit']) {
            return redirect()->route('home');
        }
        //return $this->model::find($id)->update($request->all());
        $res = $this->model::find($id)->update($request->all());
        return (bool) $res ? collect(['message' => 'ok']) : collect(['message' => 'error']);

    }

    /**
     * @param $id
     * @return boolean
     * delete entry
     */
    public function delete($id): string
    {
        if (!$this->buttons['delete']) {
            return redirect()->route('home');
        }

        return collect(['result' => $this->model::find($id)->delete()])->toJson();
    }

    /**
     * @param array $column
     * @return void
     * Add new column in columns collection
     */
    protected function addColumn(array $column)
    {
        $this->columns->push($column);
    }

    /**
     * @param array $columns
     * @return void
     * Add many columns in columns collection
     */
    protected function addColumns(array $columns)
    {
        foreach ($columns as $column) {
            $this->addColumn($column);
        }
    }

    /**
     * @param array $field
     * @param string $crud_type
     * @return void
     * add field in crud operation
     */
    protected function addField(array $field, string $crud_type = 'all')
    {
        if ($field['type'] === 'select' && empty($field['values']) && isset($field['model'])) {
            $field['values'] = $field['model']::select('id', $field['relation'])->get();
        }
        $field['type'] = 'admin.fields.'. $field['type'];
        $fields = "{$crud_type}_fields";
        $this->{$fields}->push($field);
    }

    /**
     * @param array $fields
     * @param string $crud_type
     * @return void
     * add fields in crud operation
     */
    protected function addFields(array $fields, string $crud_type = 'all')
    {
        foreach ($fields as $field) {
            $this->addField($field, $crud_type);
        }
    }

    /**
     * @param string $button
     * @return void
     * add crud button
     */
    protected function addButton(string $button)
    {
        $this->buttons[$button] = true;
    }

    /**
     * @param array $buttons
     * @return void
     * add crud buttons array
     */
    protected function addButtons(array $buttons)
    {
        foreach ($buttons as $button) {
            $this->addButton($button);
        }
    }

    /**
     * @param string $name
     * @param string $list
     * @return void
     * add routes entry
     */
    protected function setRoutes(string $name, string $list)
    {
        $this->routes['all'] = route("admin.{$list}");//"admin.$list"; // список
        $this->routes['get'] = route("admin.{$name}", ['id' => "=id="]);//"admin.$name"; // форма редактирования
        $this->routes['edit'] = route("admin.save-{$name}", ['id' => "=id="]);//"admin.save-{$name}";  // сохранение изменений
        $this->routes['save'] = route("admin.save-new-{$name}"); //"admin.save-new-{$name}"; // сохранение новой записи
        $this->routes['delete'] = route("admin.delete-{$name}", ['id' => "=id="]); // "/admin/{$name}/id/delete"; // удаление записи
        $this->routes['create'] = route("admin.new-{$name}");//"admin.new-{$name}"; // форма новой записи
    }

    /**
     * @return View
     * home admin
     */
    public function home(): View
    {
        return view('admin.layout.react-base', [
            'dataAdmin' => $this->getJson('home')
        ]);
    }

    /**
     * @param string|null $mark
     * @return string
     */
    public function getJson(string $mark = null): string
    {
        return collect([
            'entries' => $mark === 'home' ? collect([]) : $this->model::all(),
            'columns' => $this->columns,
            'title' => $this->title,
            'buttons' => $this->buttons,
            'routes' => $this->routes,
        ])->toJson();
    }
}
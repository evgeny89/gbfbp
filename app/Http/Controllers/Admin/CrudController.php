<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $fields = $this->all_fields->merge($this->update_fields);
        return view('admin.base.new_item', ['fields' => $fields, 'routes' => $this->routes]);
    }

    public function create(Request $request): RedirectResponse
    {
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
    public function save(Request $request, $id): RedirectResponse
    {
        $this->model::find($id)->update($request->all());
        return redirect()->route($this->routes['all']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * delete entry
     */
    public function delete($id): RedirectResponse
    {
        $this->model::find($id)->delete();
        return redirect()->route($this->routes['all']);
    }

    /**
     * @param array $column
     * @return void
     * Add new column in columns collection
     */
    protected function addColumn(array $column)
    {
        $column['type'] = $column['type'];
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
        $this->routes['all'] = "admin.$list";
        $this->routes['get'] = "admin.$name";
        $this->routes['edit'] = "admin.save-{$name}";
        $this->routes['delete'] = "admin.delete-{$name}";
        $this->routes['create'] = "admin.new-{$name}";
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
     * @return JSON string data
     * @param string $mark
     */
    public function getJson($mark = null) 
    {
        if ($mark === 'home') {
            return json_encode(
                [
                    'entries' => collect([]),
                    'columns' => $this->columns,
                    'title' => $this->title,
                    'buttons' => $this->buttons,
                    'routes' => $this->routes,
                ]
            );
        } else {
            return json_encode(
                [
                    'entries' => $this->model::all(),
                    'columns' => $this->columns,
                    'title' => $this->title,
                    'buttons' => $this->buttons,
                    'routes' => $this->routes,
                ]
            );
        }
        
        
    }
}

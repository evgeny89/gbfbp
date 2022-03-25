<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    protected $columns, $model, $title;

    public function __construct()
    {
        $this->title = 'entry';
        $this->columns = collect([]);
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
        return view('admin.base.list', ['entries' => $this->model::all(), 'columns' => $this->columns, 'title' => $this->title]);
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $entry = $this->model::find($id);
        dd($entry);
    }

    /**
     * @param array $column
     * @return void
     * Add new column in columns collection
     */
    protected function addColumn(array $column)
    {
        $column['type'] = 'admin.columns.'. $column['type'];
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
}

<?php

namespace App\Http\Controllers\Admin;


class AdminHomeController extends CrudController
{
    public function setup()
    {
        $this->title = 'Панель администрирования';
    }
}

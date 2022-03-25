<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends CrudController
{
    public function setup()
    {
        $this->model = User::class;
        $this->title = 'Пользователи';

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
                'name' => 'email',
                'text' => 'E-mail',
                'type' => 'text',
            ],
            [
                'name' => 'role',
                'relation' => 'name',
                'text' => 'Роль пользователя',
                'type' => 'text',
            ],
        ]);
    }
}

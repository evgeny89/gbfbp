<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;

class UserController extends CrudController
{
    public function setup()
    {
        $this->model = User::class;
        $this->title = 'Пользователи';
        $this->setRoutes('user', 'users');

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

        $this->addFields([
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Имя пользователя',
            ],
            [
                'name' => 'email',
                'type' => 'text',
                'label' => 'E-mail',
            ],
            [
                'name' => 'role_id',
                'type' => 'select',
                'label' => 'Роль',
                'model' => Role::class,
                'relation' => 'name',
            ],
        ]);

        $this->addButton('edit');
    }
}

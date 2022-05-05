<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function list(): View
    {
        return view('admin.layout.react-base', ['dataAdmin' => $this->getJsonData()]);
    }

    public function edit($id): View
    {
        $entry = $this->model::find($id);
        $fields = $this->accessRoles($this->all_fields->merge($this->create_fields));
        return view('admin.base.item', ['entry' => $entry, 'fields' => $fields, 'routes' => $this->routes]);
    }

    public function update(Request $request, $id)
    {
        if (!$this->buttons['edit']) {
            return redirect()->route('home');
        }

        $user = $this->model::find($id);

        $emailValidationRules = $user->email === $request->input('email') ? 'required|email:rfc' : 'required|email:rfc|unique:users,email';

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => $emailValidationRules,
            'role_id' => ['required', 'exists:roles,id', 'in:'. implode(',', Role::where('level', '<', $this->getUserLevelRole())->pluck('id')->toArray())],
        ]);

        $res = DB::table('users')->whereId($id)->update($validated);
        return (bool) $res ? collect(['message' => 'ok']) : collect(['message' => 'error']);
    }

    protected function accessRoles(Collection $fields): Collection
    {
        $userLevelRole = $this->getUserLevelRole();
        foreach ($fields as $key => $field) {
            if (isset($field['model']) && $field['model'] === Role::class) {
                $field['values'] = $field['model']::select('id', 'name', 'level')->where('level', '<', $userLevelRole)->get();
                $fields[$key] = $field;
            }
        }

        return $fields;
    }

    private final function getUserLevelRole()
    {
        return Role::whereId(Auth::user()->role_id)->first()->level;
    }

    private final function getAllUserRole()
    {
        return Role::all();
    }

    private function getJsonData(): string
    {
        return collect([
            'entries' => $this->model::whereIn('role_id', function ($query) {
                $query->select('id')
                    ->from(with(new Role)->getTable())
                    ->where('level', '<', $this->getUserLevelRole());
            })
                ->with('role:id,name')
                ->get(),
            'columns' => $this->columns,
            'title' => $this->title,
            'buttons' => $this->buttons,
            'routes' => $this->routes,
            'roleUsers' => $this->getAllUserRole(),
        ])->toJson();
    }
}

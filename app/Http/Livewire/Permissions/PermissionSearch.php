<?php

namespace App\Http\Livewire\Permissions;

use App\Models\Permission;
use Livewire\Component;

class PermissionSearch extends Component
{
    public $searchTerm = '';
    // public $row_no = 10;
    public $permissions_count = 15;

    public function render()
    {
        $permissions = Permission::where([
            ['active', true],
            ['name', 'LIKE', '%' . $this->searchTerm . '%'],
        ])->orderBy('updated_at')->take($this->permissions_count)->paginate($this->permissions_count);

        return view('livewire.permissions.permission-search', [
            'permissions' => $permissions,
        ]);
    }
}

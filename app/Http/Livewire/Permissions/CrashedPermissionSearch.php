<?php

namespace App\Http\Livewire\Permissions;

use App\Models\Permission;
use Livewire\Component;

class CrashedPermissionSearch extends Component
{
    public $searchTerm = '';
    // public $row_no = 10;
    public $permissions_count = 15;

    public function render()
    {
        $permissions = Permission::where([
            ['active', false],
            ['name', 'LIKE', '%' . $this->searchTerm . '%'],
        ])->get();
        
        return view('livewire.permissions.crashed-permission-search', ['permissions' => $permissions]);
    }
}

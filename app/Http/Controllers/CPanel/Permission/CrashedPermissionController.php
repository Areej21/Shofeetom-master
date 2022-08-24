<?php

namespace App\Http\Controllers\CPanel\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class CrashedPermissionController extends Controller
{
    //
    // Show Crashed Permission
    public function showCrashedPermission()
    {
        return response()->view('cpanel.permissions.crashed-permission');
    }

    // Retrive Permission
    public function retrivePermission($enc_permission_id)
    {
        $permission = Permission::findOrFail(Crypt::decrypt($enc_permission_id));
        $permission->active = true;
        $permission->deleted_at = null;
        $isRetrived = $permission->save();

        return back()->with([
            'msg' => $isRetrived ? 'تم إسترجـــاع الصلاحية بنجاح' : 'فشلت عملية استرجاع الصلاحية',
            'code' => $isRetrived ? 200 : 424,
        ]);
    }

    // Force Delete
    public function forceDeletePermission($enc_permission_id)
    {
        $permission = Permission::findOrFail(Crypt::decrypt($enc_permission_id));
        if ($permission->delete()) {
            return response()->json([
                'icon' => 'success',
                'title' => 'تم الحذف!',
                'text' => 'تم حذف الصلاحية بنجاح',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'success',
                'title' => 'فشل الحذف',
                'text' => 'فشلت عملية حذف الصلاحية',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}

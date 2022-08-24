<?php

namespace App\Http\Controllers\CPanel\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\CPanel\Permission\CreatePermissionRequest;
use App\Http\Requests\CPanel\Permission\UpdatePermissionRequest;
use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::where([
            ['active', true],
            ['deleted_at', null],
        ])->get();
        return response()->view('cpanel.permissions.index', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cpanel.permissions.create', [
            'permission_count' => Permission::count(),
            'permission_count_avg' => Permission::avg('id'),
            'deleted_permission_count' => Permission::where('deleted_at', '!=', null)->count(),
            'deleted_permission_count_avg' => Permission::where('deleted_at', '!=', null)->avg('id'),
            'active_permissions' => Permission::where('active', 1)->count(),
            'active_permissions_avg' => Permission::where('active', 1)->avg('id'),
            'inactive_permissions' => Permission::where('active', 0)->count(),
            'inactive_permissions_avg' => Permission::where('active', 0)->avg('id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {
        //
        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->guard_name = $request->input('for_guard');
        // $permission->created_by = value
        $permission->active = $request->input('active');
        $isSaved = $permission->save();

        return back()->with([
            'msg' => $isSaved ? 'أنشأت الصلاحية بنجاح' : 'فشلت عملية إنشاء الصلاحية',
            'code' => $isSaved ? 201 : 424,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($enc_permission_id)
    {
        //
        return Permission::findOrFail(Crypt::decrypt($enc_permission_id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($enc_permission_id)
    {
        //
        $permission = Permission::findOrFail(Crypt::decrypt($enc_permission_id));
        return response()->view('cpanel.permissions.edit', [
            'permission' => $permission,
            'permission_count' => Permission::count(),
            'permission_count_avg' => Permission::avg('id'),
            'deleted_permission_count' => Permission::where('deleted_at', '!=', null)->count(),
            'deleted_permission_count_avg' => Permission::where('deleted_at', '!=', null)->avg('id'),
            'active_permissions' => Permission::where('active', 1)->count(),
            'active_permissions_avg' => Permission::where('active', 1)->avg('id'),
            'inactive_permissions' => Permission::where('active', 0)->count(),
            'inactive_permissions_avg' => Permission::where('active', 0)->avg('id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $enc_permission_id)
    {
        //
        $permission = Permission::findOrFail(Crypt::decrypt($enc_permission_id));
        $permission->name = $request->input('name');
        $permission->guard_name = $request->input('for_guard');
        // $permission->created_by = value
        $permission->active = $request->input('active');
        $isUpdated = $permission->save();

        return back()->with([
            'msg' => $isUpdated ? 'تم تعديل الصلاحية بنجاح' : 'فشلت عملية تعديل الصلاحية',
            'code' => $isUpdated ? 200 : 424,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($enc_permission_id)
    {
        //
        $permission = Permission::findOrFail(Crypt::decrypt($enc_permission_id));
        $permission->deleted_at = Carbon::now();
        $permission->active = false;
        $isDeleted = $permission->save();

        if ($isDeleted) {
            return response()->json([
                'icon' => 'success',
                'title' => 'تم الحذف!',
                'text' => 'تمت عملية حذف الصلاحية بنجاح',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'فشل الحذف!',
                'text' => 'فشلت عملية حذف الصلاحية',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}

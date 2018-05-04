<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\Permission;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_role.title'));

        return view('admin.role.index');
    }

    public function datatable()
    {
        $data = $this->role->datatable();

        return Datatables::of($data)
            ->addColumn(
                'action', function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.role.edit', $data->id),
                        'link_delete' => route('admin.role.destroy', $data->id),
                        'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_role.create'));

        $roles = $this->role->all();

        $config_permissions = config("permission");

        $permissions = Permission::get()->keyBy("slug")->toArray();

        return view('admin.role.create_edit', compact(
            'roles',
            'config_permissions',
            'permissions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->role->store($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_role.role')]));

        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_role.edit'));

        $role = $this->role->find($id);

        $roles = $this->role->all();

        $config_permissions = config("permission");

        $permissions = Permission::get()->keyBy("slug")->toArray();

        $role_permission = $role->permissions->keyBy("slug")->toArray();

        return view(
            'admin.role.create_edit', compact(
                'role',
                'roles',
                'config_permissions',
                'permissions',
                'role_permission'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->role->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_role.role')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->role->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_role.role')]));

        return redirect()->back();
    }
}

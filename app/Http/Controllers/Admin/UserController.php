<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Models\Permission;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    protected $role;

    public function __construct(UserRepository $user, RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    
    public function index()
    {
        Breadcrumb::title(trans('admin_user.title'));

        return view('admin.user.index');
        
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function datatable()
    {
        $data = $this->user->datatable();

        return Datatables::of($data)
            ->addColumn(
                'action', function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.user.edit', $data->id),
                        'link_delete' => $data->id > 1 ? route('admin.user.destroy', $data->id) : null,
                        'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        Breadcrumb::title(trans('admin_user.create'));

        $roles = $this->role->all();

        $config_permissions = config("permission");

        $permissions = Permission::get()->keyBy("slug")->toArray();

        return view('admin.user.create_edit', compact(
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
    public function store(UserCreateRequest $request)
    {
        $input = $request->all();

        $this->user->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_user.user')]));

        return redirect()->route('admin.user.index');
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
        Breadcrumb::title(trans('admin_user.edit'));

        $user = $this->user->find($id);

        $roles = $this->role->all();

        $config_permissions = config("permission");

        $permissions = Permission::get()->keyBy("slug")->toArray();

        $user_role = $user->roles()->get()->pluck("id")->toArray();

        $user_permission = $user->userPermissions->keyBy("slug")->toArray();

        return view(
            'admin.user.create_edit', compact(
                'user',
                'roles',
                'config_permissions',
                'user_role',
                'permissions',
                'user_permission'
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

        $this->user->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_user.user')]));

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
        $user = $this->user->find($id);

        if ($user->id > 1) {
            
            $this->user->delete($id);

            session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_user.user')]));

            return redirect()->back();

        }

        else {

            session()->flash('error', 'Bạn không thể xóa tài khoản này!');

            return redirect()->back();

        }

    }
}

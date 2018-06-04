<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\SizeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class SizeController extends Controller
{
    protected $size;

    public function __construct(SizeRepository $size)
    {
        $this->size = $size;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_size.title'));

        return view('admin.size.index');
    }

    public function datatable()
    {
        $data = $this->size->datatable();

        return Datatables::of($data)
            ->addColumn(
                'action', function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.size.edit', $data->id),
                        'link_delete' => route('admin.size.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_size.create'));

        return view('admin.size.create_edit');
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

        $this->size->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_size.size')]));

        return redirect()->route('admin.size.index');
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
        Breadcrumb::title(trans('admin_size.edit'));

        $size = $this->size->find($id);

        return view(
            'admin.size.create_edit', compact(
                'size'
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

        $this->size->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_size.size')]));

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
        $this->size->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_size.size')]));

        return redirect()->back();
    }
}

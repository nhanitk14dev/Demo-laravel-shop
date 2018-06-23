<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\ColorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class ColorController extends Controller
{
    protected $color;

    public function __construct(ColorRepository $color)
    {
        $this->color = $color;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_color.title'));

        return view('admin.color.index');
    }

    public function datatable()
    {
        $data = $this->color->datatable();

        return Datatables::of($data)
            ->addColumn(
                'translations', function ($data) {
                    return $data->name;
                }
            )
            ->addColumn(
                'action', function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.color.edit', $data->id),
                        'link_delete' => route('admin.color.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_color.create'));

        return view('admin.color.create_edit');
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

        $this->color->store($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_color.color')]));

        return redirect()->route('admin.color.index');
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
        Breadcrumb::title(trans('admin_color.edit'));

        $color = $this->color->find($id);

        return view(
            'admin.color.create_edit', compact(
                'color'
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

        $this->color->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_color.color')]));

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
        $this->color->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_color.color')]));

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\ThemeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ThemeController extends Controller
{
    protected $theme;

    public function __construct(ThemeRepository $theme)
    {
        $this->theme = $theme;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_theme.title'));
        return view('admin.theme.index');
    }

    public function datatable()
    {
        $data = $this->theme->load();
        $cl = collect($data);
        return Datatables::of($cl)
            ->addColumn('name', function ($cl) {
                return fileNameFromPath($cl->getFilename());
            })
            ->addColumn(
                'action',
                function ($cl) {
                    $file_name = fileNameFromPath($cl->getFilename(), false);
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.theme.edit', $file_name),
                            'link_delete' => route('admin.theme.destroy', $file_name),
                            'id_delete' => $file_name
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        Breadcrumb::title(trans('admin_theme.create'));

        return view('admin.theme.create_edit');
    }

    public function store(Request $request)
    {
        $input = $request->only(['name', 'content']);

        $this->theme->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_theme.theme')]));

        return redirect()->route('admin.theme.index');
    }

    public function edit($id)
    {
        Breadcrumb::title(trans('admin_theme.edit'));

        $theme = $this->theme->find($id);

        return view(
            'admin.theme.create_edit',
            compact(
                'theme'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->theme->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_theme.theme')]));

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
        $this->theme->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_theme.theme')]));

        return redirect()->back();
    }

}

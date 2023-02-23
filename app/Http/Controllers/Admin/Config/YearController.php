<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\YearRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Year;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class YearController extends Controller
{
    public function add()
    {
        $cate = Category::where('status','=','1')->where('deleted_at','=',null)->get();
        return view('Admin.Config.Year.Add', compact('cate'));
    }
    public function list()
    {
        return view('Admin.Config.Year.List');
    }

    public function yearDatatable()
    {
        $data = Year::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('sub_category_id', function ($data) {
                $subCat = SubCategory::where('sub_category_id', $data->sub_category_id)->value('sub_category_en');
                $sub_category_id = $subCat;
                return $sub_category_id;
            })->addColumn('category_id', function ($data) {
            $cate = Category::where('category_id', $data->category_id)->value('category_en');
            $category_id = $cate;
            return $category_id;
        })
            ->addColumn('action', function ($data) {
                $Edit = "<a href=' " . route("admin.year.edit", ['id' => $data->year_id]) . "' class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                $delete = "<a href=' " . route("admin.year.delete", ['id' => $data->year_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                return $Edit . " " . $delete;
            })
            ->rawColumns(["action", "category_id", "sub_category_id"])
            ->make(true);
    }

    public function store(YearRequest $request)
    {
        $year = new Year;
        $year->year_ar = $request->year_ar;
        $year->year_en = $request->year_en;
        $year->category_id = $request->category_id;
        $year->sub_category_id = $request->sub_category_id;
        $year->save();
        return redirect()->route('admin.year.list')->with('status', trans('admin.year_add_successfully'));

    }
    public function edit($id)
    {
        $year = Year::findorfail($id);
        $cate = Category::all();
        return view('Admin.Config.Year.Edit', compact('year', 'cate'));

    }

    public function update(YearRequest $request, $id)
    {
        $year = Year::find($id);
        $year->year_ar = $request->year_ar;
        $year->year_en = $request->year_en;
        $year->category_id = $request->category_id;
        $year->sub_category_id = $request->sub_category_id;
        $year->save();
        return redirect()->route('admin.year.list')->with('status', trans('admin.year_updated_successfully'));
    }
    public function delete($id)
    {
        Year::findorfail($id)->delete();
        return redirect()->route('admin.year.list')->with('status', trans('admin.year_delete_successfully'));

    }
}

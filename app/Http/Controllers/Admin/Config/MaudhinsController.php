<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MaudhinsRequest;
use App\Models\Category;
use App\Models\Maudhins;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MaudhinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        $cate = Category::all();
        return view('Admin.Config.Maudhins.Add', compact('cate'));
    }



    /* Add Maudhins */
    public function store(MaudhinsRequest $request)
    {
        $maudhinsEn = $request->maudhins_en;
        $maudhinsAr = $request->maudhins_ar;
        $maudhinsUrdu = $request->maudhins_urdu;
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;

        $maudhins = new Maudhins();
        $maudhins->category_id = $categoryId;
        $maudhins->sub_category_id = $subCategoryId;
        $maudhins->maudhins_en = $maudhinsEn;
        $maudhins->maudhins_ar = $maudhinsAr;
        $maudhins->maudhins_urdu = $maudhinsUrdu;
        $maudhins->save();
        return redirect()->route('admin.maudhins.list')->with('status', trans('admin.maudhins_add_successfully'));

    }

    public function list()
    {
        return view('Admin.Config.Maudhins.List');
    }

    /* Maudhins Datatable*/
    public function showMaudhinsDatatable()
    {
        $data = Maudhins::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('sub_category_id', function ($data) {
                $subCat = SubCategory::where('sub_category_id', $data->sub_category_id)->value('sub_category_en');
                $sub_category_id = $subCat;
                return $sub_category_id;
            })
            ->addColumn('category_id', function ($data) {
                $cate = Category::where('category_id', $data->category_id)->value('category_en');
                $category_id = $cate;
                return $category_id;
            })
            ->addColumn('action', function ($data) {
                $Edit = "<a href=' " . route("admin.maudhinsEdit", ['id' => $data->maudhins_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                $dele = "<a href=' " . route("admin.maudhinsDelete", ['id' => $data->maudhins_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                return $Edit . " " . $dele;
            })
            ->rawColumns(["action"])
            ->make(true);
    }


    public function showMaudhinsEditView($id)
    {
        $cate = Category::all();
        $maudhins = Maudhins::where('maudhins_id', $id)->first();
        return view('Admin.Config.Maudhins.Edit', compact('maudhins', 'cate'));
    }

    /* Edit Maudhins */
    public function maudhinsEdit(MaudhinsRequest $request, $id)
    {
        $maudhinsEn = $request->maudhins_en;
        $maudhinsAr = $request->maudhins_ar;
        $maudhinsUrdu = $request->maudhins_urdu;
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;

        $getMaudhins = Maudhins::where('maudhins_id', $id)->first();

        if (!empty($getMaudhins)) {
            $getMaudhins->category_id = $categoryId;
            $getMaudhins->sub_category_id = $subCategoryId;
            $getMaudhins->maudhins_en = $maudhinsEn;
            $getMaudhins->maudhins_ar = $maudhinsAr;
            $getMaudhins->maudhins_urdu = $maudhinsUrdu;
            $getMaudhins->save();
            return redirect()->route('admin.maudhins.list')->with('status', trans('admin.maudhins_update_successfully'));
        }
    }

    public function maudhinsDelete($id)
    {
        Maudhins::findOrfail($id)->delete();
        return redirect()->route('admin.maudhins.list')->with('status', trans('admin.Maudhins_delete_successfully'));
    }


}

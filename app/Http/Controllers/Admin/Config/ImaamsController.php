<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImmamRequest;
use App\Models\Category;
use App\Models\Imaam;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ImaamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        $cate = Category::all();
        return view('Admin.Config.Imaam.Add', compact('cate'));
    }

    public function getSubCate($id)
    {
        $subcate = SubCategory::where('category_id', $id)->pluck('sub_category_en', 'sub_category_id');
        return json_encode($subcate);

    }

    /* Add Immam */
    public function store(ImmamRequest $request)
    {
        $imaamEn = $request->imaam_en;
        $imaamAr = $request->imaam_ar;
        $imaamDescriptionEn = $request->imaam_description_en;
        $imaamDescriptionAr = $request->imaam_description_ar;
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;

        $imaam = new Imaam();
        $imaam->category_id = $categoryId;
        $imaam->sub_category_id = $subCategoryId;
        $imaam->imaam_en = $imaamEn;
        $imaam->imaam_ar = $imaamAr;
        $imaam->imaam_description_en = $imaamDescriptionEn;
        $imaam->imaam_description_ar = $imaamDescriptionAr;
        $imaam->save();
        return redirect()->route('admin.imaam.list')->with('status', trans('admin.immam_add_successfully'));

    }

    public function list()
    {
        $cate = Category::all();
        return view('Admin.Config.Imaam.List', compact('cate'));
    }

    // /* Immam Datatable*/  
    public function showImaamDatatable()
    {
        $data = Imaam::all();
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
                $Edit = "<a href=' " . route("admin.imaamEdit", ['id' => $data->imaam_id]) . "' class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                $delete = "<a href=' " . route("admin.imaamDelete", ['id' => $data->imaam_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                return $Edit . " " . $delete;
            })
            ->rawColumns(["action", "category_id", "sub_category_id"])
            ->make(true);
    }


    public function showImaamEditView($id)
    {
        $cate = Category::all();
        $imaam = Imaam::where('imaam_id', $id)->first();
        return view('Admin.Config.Imaam.Edit', compact('imaam', 'cate'));
    }

    /* Edit Immam */
    public function immamEdit(ImmamRequest $request, $id)
    {
        $immamEn = $request->imaam_en;
        $imaamAr = $request->imaam_ar;
        $imaamDescriptionEn = $request->imaam_description_en;
        $imaamDescriptionAr = $request->imaam_description_ar;
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;

        $getImmam = Imaam::where('imaam_id', $id)->first();

        if (!empty($getImmam)) {
            $getImmam->category_id = $categoryId;
            $getImmam->sub_category_id = $subCategoryId;
            $getImmam->imaam_en = $immamEn;
            $getImmam->imaam_ar = $imaamAr;
            $getImmam->imaam_description_en = $imaamDescriptionEn;
            $getImmam->imaam_description_ar = $imaamDescriptionAr;
            $getImmam->save();
            return redirect()->route('admin.imaam.list')->with('status', trans('admin.immam_update_successfully'));
        }
    }


    public function imaamsDelete($id)
    {
        Imaam::findOrfail($id)->delete();
        return redirect()->route('admin.imaam.list')->with('status', trans('admin.immam_delete_successfully'));
    }
}
<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        $cate = Category::all();
        return view('Admin.SubCategory.Add', compact('cate'));
    }

    /* Sub Category List */
    public function list()
    {

        return view('Admin.SubCategory.List');
    }

    /* Sub Category Add*/
    public function store(SubCategoryRequest $request)
    {
        $categoryId = $request->category_id;
        $subCategoryEn = $request->sub_category_en;
        $subCategoryUrdu = $request->sub_category_urdu;
        $subCategoryAr = $request->sub_category_ar;

        $subcategory = new SubCategory();
        $subcategory->category_id = $categoryId;
        $subcategory->sub_category_en = $subCategoryEn;
        $subcategory->sub_category_urdu = $subCategoryUrdu;
        $subcategory->sub_category_ar = $subCategoryAr;
        $subcategory->status = '1';
        $subcategory->save();
        return redirect()->route('admin.submosque.list')->with(['status' => trans('admin.sub_category_save')]);
    }

    /* Sub Category List Datatable*/
    public function showSubCategoryDatatable()
    {
        $subCate = SubCategory::all();

        return DataTables::of($subCate)
            ->addIndexColumn()
            ->editColumn('category_id', function ($subCate) {
                $category_id = Category::where('category_id', $subCate->category_id)->value('category_en');
                return $category_id;
            })
            ->editColumn('status', function ($subCate) {
                if ($subCate->status == 1) {
                    $status = '<span class="btn btn-success ">Active</span>';
                } else {
                    $status = '<span class="badge btn btn-warning ">Inactive</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($subCate) {
                $Edit = "<a href=' " . route("admin.submosqueEdit", ['id' => $subCate->sub_category_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                return $Edit;
            })
            ->rawColumns(["action", "status", "category_id"])
            ->make(true);
    }


    public function subcategoryView($id)
    {
        $subcate = SubCategory::with('category')->where('sub_category_id', $id)->first();
        return view('Admin.SubCategory.Edit', compact('subcate'));
    }

    /* Edit Sub Category */
    public function subcategoryEdit(Request $request, $id)
    {
        $request->validate([
            'sub_category_en' => 'required',
            'sub_category_ar' => 'required'
        ],
        [
            'sub_category_en.required' =>  trans('admin.sub_mosque_en_req'),
            'sub_category_ar.required' =>  trans('admin.sub_mosque_ar_req'),
        ]);

        $categoryId = $id;
        $subCategoryEn = $request->sub_category_en;
        // $subCategoryUrdu = $request->sub_category_urdu;
        $subCategoryAr = $request->sub_category_ar;

        $subcategory = SubCategory::where('sub_category_id', $categoryId)->first();

        if (!empty($subcategory)) {
            $subcategory->sub_category_en = $subCategoryEn;
            // $subcategory->sub_category_urdu = $subCategoryUrdu;
            $subcategory->sub_category_ar = $subCategoryAr;
            $subcategory->save();
            return redirect()->route('admin.submosque.list')->with(['status' => trans('admin.sub_category_update')]);
        }
    }
}
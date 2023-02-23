<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\AudioData;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Category List */
    public function list()
    {
        return view('Admin.Category.List');
    }

    // /* Category List Datatable*/

    public function showCategoryDatatable()
    {
    $data = Category::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('cat_image', function ($data) {
                $cat_image = '';
                if ($data->cat_image != "") {
                    $cat_image = '<img src="' . asset($data->cat_image) . '" height="50px" width="50" title="image" alt="image">';
                }
                return $cat_image;
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 1) {
                    $status = '<span class="btn btn-success ">Active</span>';
                } else {
                    $status = '<span class="badge btn btn-warning ">Inactive</span>';
                }
                return $status;
            })
            ->addColumn('action', function ($data) {
                $Edit = "<a href=' " . route("admin.mosqueEdit", ['id' => $data->category_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                return $Edit;
            })
            ->rawColumns(["action", "cat_image", "status"])
            ->make(true);
    }


    public function categoryView($id)
    {
        $cate = Category::where('category_id', $id)->first();
        return view('Admin.Category.Edit', compact('cate'));
    }

    /* Edit Category */
    public function categoryEdit(CategoryRequest $request, $id)
    {
        $categoryId   = $id;
        $categoryEn   = $request->category_en;
        $categoryUrdu = $request->category_urdu;
        $categoryAr   = $request->category_ar;

        $getCategory = Category::where('category_id', $categoryId)->first();

        if($getCategory)
         {
            $getCategory->category_en   = $categoryEn;
            $getCategory->category_ar   = $categoryAr;
            //$getCategory->category_urdu = $categoryUrdu;
            $getCategory->save();
            return redirect()->route('admin.mosque.list')->with('status',trans('admin.category_update'));
         }

        // if (!empty($getCategory)) {
        //     $getCategory->category_en   = $categoryEn;
        //     //$getCategory->category_urdu = $categoryUrdu;
        //     $getCategory->category_ar   = $categoryAr;
        //     $getCategory->save();
        //     return redirect()->route('admin.mosque.list')->with(['success' => trans('admin.category_update')]);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

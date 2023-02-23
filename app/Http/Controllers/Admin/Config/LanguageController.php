<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\SubCategory;
use Yajra\DataTables\Facades\DataTables;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Language List */
    public function list()
    {
        return view('Admin.Config.Language.List');
    }

    /* Language ShowDataTable List */
    public function showLanguageList()
    {
        $data = Language::all();
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
                $Edit = "<a href=' " . route("admin.language.edit", ['id' => $data->language_id]) . "' class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                return $Edit;
            })
            ->rawColumns(["action", "category_id", "sub_category_id"])
            ->make(true);

    }

    /* Language Add */
    public function add()
    {
        $cate = Category::all();
        return view('Admin.Config.Language.Add', compact('cate'));
    }


    /* Language Store */
    public function store(LanguageRequest $request)
    {
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;
        $languageEn = $request->language_en;
        $languageAr = $request->language_ar;

        $language = new Language();
        $language->category_id = $categoryId;
        $language->sub_category_id = $subCategoryId;
        $language->language_en = $languageEn;
        $language->language_ar = $languageAr;
        $language->save();
        return redirect()->route('admin.language.list')->with('status', trans('admin.language_add_successfully'));

    }

    /* Language edit */
    public function edit($id)
    {
        $langs = Language::where('language_id', $id)->first();
        $cate = Category::all();
        return view('Admin.Config.Language.Edit', compact('cate', 'langs'));

    }

    public function update(LanguageRequest $request, $id)
    {
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;
        $languageEn = $request->language_en;
        $languageAr = $request->language_ar;

        $language = Language::where('language_id', $id)->first();
        $language->category_id = $categoryId;
        $language->sub_category_id = $subCategoryId;
        $language->language_en = $languageEn;
        $language->language_ar = $languageAr;
        $language->save();
        return redirect()->route('admin.language.list')->with('status', trans('admin.language_updated_successfully'));
    }




}
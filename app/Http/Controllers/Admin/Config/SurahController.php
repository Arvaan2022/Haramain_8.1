<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SurahRequest;
use App\Models\Category;
use App\Models\Imaam;
use Illuminate\Http\Request;
use App\Models\SurahList;
use App\Models\SubCategory;
use Yajra\DataTables\Facades\DataTables;

class SurahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Surah List */
    public function list()
    {
        return view('Admin.Config.Surah.List');
    }

    /* Surah ShowDataTable List */
    public function showSurahList()
    {
        $data = SurahList::all();
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
                $Edit = "<a href=' " . route("admin.surah.edit", ['id' => $data->surah_id]) . "' class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                $delete = "<a href=' " . route("admin.surah.delete", ['id' => $data->surah_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                return $Edit . " " . $delete;
            })
            ->rawColumns(["action", "category_id", "sub_category_id"])
            ->make(true);

    }

    /* Surah Add */
    public function add()
    {
        $cate = Category::all();
        return view('Admin.Config.Surah.Add', compact('cate'));
    }

    public function getImaams($id)
    {
        $Imaam = Imaam::where('sub_category_id', $id)->pluck('imaam_en', 'imaam_id');
        return json_encode($Imaam);
    }

    /* Surah Store */
    public function store(SurahRequest $request)
    {
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;
        $imaamId = $request->imaam_id;
        $surahEn = $request->surah_name;

        $Surah = new SurahList();
        $Surah->category_id = $categoryId;
        $Surah->sub_category_id = $subCategoryId;
        $Surah->imaam_id = $imaamId;
        $Surah->surah_name = $surahEn;
        $Surah->save();
        return redirect()->route('admin.surah.list')->with('status', trans('admin.surah_add_successfully'));

    }

    /* Surah edit */
    public function edit($id)
    {
        $cate = Category::all();
        $surah = SurahList::where('surah_id', $id)->first();
        return view('Admin.Config.Surah.Edit', compact('surah', 'cate'));
    }


    public function update(SurahRequest $request, $id)
    {
        $categoryId = $request->category_id;
        $subCategoryId = $request->sub_category_id;
        $imaamId = $request->imaam_id;
        $surahEn = $request->surah_name;

        $Surah = SurahList::where('surah_id', $id)->first();
        $Surah->category_id = $categoryId;
        $Surah->sub_category_id = $subCategoryId;
        $Surah->imaam_id = $imaamId;
        $Surah->surah_name = $surahEn;
        $Surah->save();
        return redirect()->route('admin.surah.list')->with('status', trans('admin.surah_updated_successfully'));
    }


    public function delete($id)
    {
        SurahList::where('surah_id', $id)->forceDelete();
        return redirect()->route('admin.surah.list')->with('status', trans('admin.surah_deleted_successfully'));

    }
}
<?php

namespace App\Http\Controllers\Admin\Mosque;

use App\Http\Controllers\Controller;
use App\Models\AudioData;
use App\Models\Language;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MosqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nabawiList($id)
    {
        $data = SubCategory::where('category_id', $id)->get();
        return view('Admin.Mosque.Nabawi.List')->with('data', $data);
    }

    public function haramList($id)
    {
        $data = SubCategory::where('category_id', $id)->get();
        return view('Admin.Mosque.Haram.List')->with('data', $data);
    }
}

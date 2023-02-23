<?php

namespace App\Http\Controllers\Admin\Mosque;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MaudhinsRequest;
use App\Models\AudioData;
use App\Models\Category;
use App\Models\Language;
use App\Models\Maudhins;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HaramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function haramaDataList($id)
    {
        switch($id) {
            case 1:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 2:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 3:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 4:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 5:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 6:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 7:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 8:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 9:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 38:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 39:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 40:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            case 41:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
                break;
            default:
                return view('Admin.MasjidAlHaram.NoDataFound')->with('listId', $id);
        }
     }

     public function showHaramListDatatable()
     {
         $data = AudioData::all();
         return DataTables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function ($data) {
                 $Edit = "<a href=' " . route("admin.mosqueEdit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                 return $Edit;
             })
             ->editColumn('language_en', function ($data) {
                 $language_en = Language::where('language_id',$data->language_id)->value('language_en');
                 return $language_en;
             })
             ->rawColumns(["action", "language_en",])
             ->make(true);
     }



}

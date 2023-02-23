<?php

namespace App\Http\Controllers\Admin\Competition;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Yajra\DataTables\Facades\DataTables;

class CompetitionController extends Controller
{
    public function list()
     {
         return view('Admin.Competition.List');
     }

    public function showCompetitionDatatable()
     {
        $data = Competition::all();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($data) {
            $Delete = "<a href=' " . route("admin.competitionDelete", ['id' => $data->id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
            return $Delete;
        })
        ->rawColumns(["action"])
        ->make(true);
        return view();
     }

     public function competitionDelete($id)
      {
        Competition::findOrfail($id)->delete();
        return redirect()->route('admin.competition.list')->with('status', trans('admin.competition_delete_successfully'));
      }
}

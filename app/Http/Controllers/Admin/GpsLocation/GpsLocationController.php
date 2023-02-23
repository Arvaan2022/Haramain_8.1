<?php

namespace App\Http\Controllers\Admin\GpsLocation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\mainHeadingRequest;
use App\Http\Requests\Admin\subHeadingRequest;
use App\Models\GpsLocationHeadings;
use App\Models\GpsLocationSubHeadings;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GpsLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('Admin.GpsLocation.Dashboard');
    }

    public function gpsDashboard($id)
    {
        $gpsHeadings = GpsLocationHeadings::where('category_id', $id)->get();
        return view('Admin.GpsLocation.GpsDashboard')->with('gpsHeadings', $gpsHeadings)->with('cat_id', $id);
    }

    public function gpsDashboardAdd(mainHeadingRequest $request)
    {
        if (!empty($request->gps_heading_id)) {
            $addDashboard = GpsLocationHeadings::where("gps_heading_id", $request->gps_heading_id)->first();
        } else {
            $addDashboard = new GpsLocationHeadings;
            $addDashboard->category_id = $request->category_id;
        }
        $addDashboard->gps_heading_en = $request->gps_heading_en;
        $addDashboard->gps_heading_ar = $request->gps_heading_ar;
        $addDashboard->save();
        return redirect()->back()->with('status', trans('admin.saved'))->with('cate_id', $request->category_id);
    }

    public function getSubHeading($id)
    {
        $gpsHeadings = GpsLocationHeadings::where('gps_heading_id', $id)->get();
        return json_encode($gpsHeadings);
    }

    public function showSubHeadingDatatable($id)
    {
        $data = GpsLocationSubHeadings::where('gps_heading_id', $id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $Edit = "<a href='#'  onclick='editsubbtn(this)' data-id='" . $data->gps_sub_heading_id . "'  class='btn  btn-info editsubbtn'><i class='fa fa-pencil'></i></a>";
                $delete = "<a href='#' onclick='deletesubbtn(this)' data-id='" . $data->gps_sub_heading_id . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                return $Edit . " " . $delete;
            })
            ->rawColumns(["action"])
            ->make(true);
    }

    public function getEditHeading($id)
    {
        $gpsHeading = GpsLocationHeadings::where('gps_heading_id', $id)->first();
        return json_encode($gpsHeading);
    }
    public function deleteHeading($id)
    {
        GpsLocationHeadings::findorfail($id)->delete();
    }

    public function gpsSubHeadingAdd(subHeadingRequest $req)
    {
        // return $req->all();
        if (!empty($req->gps_sub_heading_id) || $req->gps_sub_heading_id !== null) {
            $GpsLocationSubHeadings = GpsLocationSubHeadings::where("gps_sub_heading_id", $req->gps_sub_heading_id)->first();
        } else {
            $GpsLocationSubHeadings = new GpsLocationSubHeadings;
            $GpsLocationSubHeadings->gps_heading_id = $req->gps_heading_id;
        }
        $GpsLocationSubHeadings->gps_place_en = $req->gps_place_en;
        $GpsLocationSubHeadings->gps_place_ar = $req->gps_place_ar;
        $GpsLocationSubHeadings->latitude = $req->latitude;
        $GpsLocationSubHeadings->longitude = $req->longitude;
        $GpsLocationSubHeadings->save();
        return redirect()->back()->with('status', trans('admin.saved'))->with('cate_id', $req->category_id);

    }

    public function subEditHeading($id)
    {
        $gpsSubHeading = GpsLocationSubHeadings::where('gps_sub_heading_id', $id)->first();
        return json_encode($gpsSubHeading);
    }



    public function deleteSubHeading($id)
    {
        GpsLocationSubHeadings::findorfail($id)->delete();

    }

}

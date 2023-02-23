<?php

namespace App\Http\Controllers\Admin\Prayer;

use App\Http\Controllers\Controller;
use App\Imports\PrayerImport;
use App\Models\Category;
use App\Models\Prayer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PrayerController extends Controller
{
    public function showPrayer()
    {
        return view('Admin.Prayer.Dashboard');
    }

    public function add()
    {
        $category = Category::where('status','=','1')->where('deleted_at','=',null)->get();
        return view('Admin.Prayer.Add')->with('category', $category);
    }

    public function store(Request $request)
    {
        $categoryId = $request->category_id;
        $month = $request->month;
        $year = $request->year;

        /* Excel Data Import Code */
        Excel::import(new PrayerImport($categoryId,$month,$year), $request->file('file')->store('temp'));
        /* End */
        // $prayer = new Prayer();
        // $prayer->category_id = $categoryId;
        // $prayer->month = $month;
        // $prayer->year = $year;
        // $prayer->save();
        return redirect()->route('admin.prayer.dashboard')->with('status', trans('admin.prayer_add_successfully'));
    }

    public function view()
    {
        $category = Category::all();
        return view('Admin.Prayer.View')->with('category', $category);
    }

    public function getPrayer(Request $request)
    {
        $data['category'] = Prayer::distinct()->get(['category_id']);
        return view('getPrayer', $data);
    }



    public function showPrayerDatatable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Custom search filter
        $searchCat = $request->get('searchCat');
        $searchMonth = $request->get('searchMonth');
        $searchYear = $request->get('searchYear');


        // Total records
        $records = Prayer::select('count(*) as allcount');

        ## Add custom filter conditions
        if (!empty($searchCat) && !empty($searchMonth) && !empty($searchYear)) {
            $records->where(['category_id' => $searchCat, 'month' => $searchMonth, 'year' => $searchYear]);
            // $records->where('category_id', $searchCat);
        }

        $totalRecords = $records->count();

        // Total records with filter
        $records = Prayer::where(['category_id' => $searchCat, 'month' => $searchMonth, 'year' => $searchYear]);



        ## Add custom filter conditions
        if (!empty($searchCat) && !empty($searchMonth) && !empty($searchYear)) {
            $records->where(['category_id' => $searchCat, 'month' => $searchMonth, 'year' => $searchYear]);
            // $records->where('category_id', $searchCat);
        }

        $totalRecordswithFilter = $records->count();

        // Fetch records
        if (!empty($searchValue)) {
            $records = Prayer::orderBy($columnName, $columnSortOrder)->select('prayer_times.*')
                ->where('prayer_times.day', 'like', '%' . $searchValue . '%')
                ->orwhere('prayer_times.fajr', 'like', '%' . $searchValue . '%')
                ->orwhere('prayer_times.sunrise', 'like', '%' . $searchValue . '%')
                ->orwhere('prayer_times.dhuhar', 'like', '%' . $searchValue . '%')
                ->orwhere('prayer_times.asr', 'like', '%' . $searchValue . '%')
                ->orwhere('prayer_times.maghrib', 'like', '%' . $searchValue . '%')
                ->orwhere('prayer_times.isha', 'like', '%' . $searchValue . '%');
        }

        ## Add custom filter conditions
        // if (!empty($searchCat) && !empty($searchMonth) && !empty($searchYear)) {
        //     $records->where(['category_id' => $searchCat, 'month' => $searchMonth, 'year' => $searchYear]);
        //     $records->where('category_id', $searchCat);
        // }
        $Prayer = $records->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        foreach ($Prayer as $pray) {

            $day = $pray->day;
            $fajr = $pray->fajr;
            $sunrise = $pray->sunrise;
            $dhuhar = $pray->dhuhar;
            $asr = $pray->asr;
            $maghrib = $pray->maghrib;
            $isha = $pray->isha;
            $action = "<a href='#'  onclick='editbtn(this)' data-id='" . $pray->prayer_id . "'  class='btn  btn-info editsubbtn'><i class='fa fa-pencil'></i></a>";
            $data_arr[] = array(
                "day" => $day,
                "fajr" => $fajr,
                "sunrise" => $sunrise,
                "dhuhar" => $dhuhar,
                "asr" => $asr,
                "maghrib" => $maghrib,
                "isha" => $isha,
                "action" => $action,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "data" => $data_arr
        );

        return response()->json($response);
    }

    public function editPrayer($id)
    {
        $Prayer = Prayer::where('prayer_id', $id)->first();
        return json_encode($Prayer);
    }

    public function addPrayerTimes(Request $request)
    {
        if (!empty($request->prayer_id)) {
            $id = $request->prayer_id;
            $Prayer = Prayer::where('prayer_id', $id)->first();
        } else {
            $Prayer = new Prayer;
        }
        $Prayer->fajr = $request->fajr;
        $Prayer->fajr_jamma = $request->fajr_jamma;
        $Prayer->sunrise = $request->sunrise;
        $Prayer->sunrise_jamma = $request->sunrise_jamma;
        $Prayer->dhuhar = $request->dhuhar;
        $Prayer->dhuhar_jamma = $request->dhuhar_jamma;
        $Prayer->asr = $request->asr;
        $Prayer->asr_jamma = $request->asr_jamma;
        $Prayer->maghrib = $request->maghrib;
        $Prayer->maghrib_jamma = $request->maghrib_jamma;
        $Prayer->isha = $request->isha;
        $Prayer->isha_jamma = $request->isha_jamma;
        $Prayer->save();
        return redirect()->back()->with('status', trans('admin.saved'));

    }

}

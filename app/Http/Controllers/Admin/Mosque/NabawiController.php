<?php

namespace App\Http\Controllers\Admin\Mosque;

use App\Http\Controllers\Controller;
use App\Models\AudioData;
use App\Models\Imaam;
use App\Models\Language;
use App\Models\Maudhins;
use App\Models\SurahList;
use App\Models\Year;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NabawiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function nabawiDataList($subcatId)
     {
        $catId = "2";

         switch($subcatId) {
             case 10:
                 return view('Admin.MasjidAlNabawi.LiveStreamOfKhutbah.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 11:
                 return view('Admin.MasjidAlNabawi.FridayKhutbahs.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 12:
                return view('Admin.MasjidAlNabawi.LiveStream.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 13:
                 return view('Admin.MasjidAlNabawi.Adhaan.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 14:
                 return view('Admin.MasjidAlNabawi.EidKhutbahs.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 15:
                 return view('Admin.MasjidAlNabawi.EidTakbeerat.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 16:
                 return view('Admin.MasjidAlNabawi.ImaamsRecitaion.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 17:
                 return view('Admin.MasjidAlNabawi.PreviousTaraweehSalaah.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 18:
                 return view('Admin.MasjidAlNabawi.DailySalaah.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 42:
                 return view('Admin.MasjidAlNabawi.JanazahSalaah.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 43:
                 return view('Admin.MasjidAlNabawi.TableeghStyles.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             case 44:
                 return view('Admin.MasjidAlNabawi.Talbiyah.List')->with('catId', $catId)->with('subCatId', $subcatId);
                 break;
             default:
             return view('Admin.MasjidAlNabawi.NoDataFound')->with('catId', $catId)->with('subCatId', $subcatId);
         }
     }

     public function showNabawiListDatatable($id)
     {
        if ($id == 10)
         {
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.livestream.khutbah.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.livestream.khutbah.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->editColumn('language_en', function ($data) {
                    $language_en = Language::where('language_id',$data->language_id)->value('language_en');
                    return $language_en;
                })
                ->rawColumns(["action", "language_en",])
                ->make(true);
         }
        elseif($id == 11)
         {
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.friday.khutbahs.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.friday.khutbahs.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);

         }
        elseif ($id == 12)
          {
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.livestream.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.livestream.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }
        elseif ($id == 13)
          {
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.adhaan.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.adhaan.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }
        elseif ($id == 14)
          {
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.edi.khutbahs.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.edi.khutbahs.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }

        elseif ($id == 15)
          {
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.edi.takbeerat.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.edi.takbeerat.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }
         elseif ($id == 16)
          {
            //ImaamsRecitaion
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.imaams.recitaion.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.imaams.recitaion.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }
        elseif ($id == 17)
          {
            //PreviousTaraweehSalaah
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.previous.taraweeh.salaah.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.previous.taraweeh.salaah.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }

         elseif ($id == 18)
          {
            //PreviousTaraweehSalaah
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.previous.taraweeh.salaah.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.previous.taraweeh.salaah.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }
         elseif ($id == 42)
          {
            //JanazahSalaah
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.janazah.salaah.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.janazah.salaah.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }
         elseif ($id == 43)
          {
            //TableeghStyles
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.tableegh.styles.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.tableegh.styles.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }
         elseif ($id == 44)
          {
            //Talbiyah
            $data = AudioData::where('sub_category_id',$id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $Edit = "<a href=' " . route("admin.nabawi.talbiyah.data.edit", ['id' => $data->audio_id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i> </a>";
                    $Delete = "<a href=' " . route("admin.nabawi.talbiyah.data.delete", ['id' => $data->audio_id]) . "' class='btn  btn-circle btn-icon-only  btn-warning'><i class='fa fa-trash'></i> </a>";
                    return $Edit." ".$Delete;
                })
                ->rawColumns(["action"])
                ->make(true);
          }

     }

     public function livestreamAdd($id)
      {
        $data = Language::all(); //get()->groupBy('language_en');
        $nId = $id;
        return view('Admin.MasjidAlNabawi.LiveStreamOfKhutbah.Add')->with('data',$data)->with('nId',$nId);
      }

      public function livestreamStore(Request $request)
      {
        $request->validate([
            'language_id' => 'required',
            'audio_url' => 'required',
        ], [
            'language_id.required' => trans('admin.select_language'),
            'audio_url.required'   => trans('admin.audio_url_required'),
        ]);

         $languageId =  $request->language_id;
         $audioUrl   =  $request->audio_url;
         $nId        =  $request->nId;

         $audiodata = new AudioData();
         $audiodata->language_id     = $languageId;
         $audiodata->audio_url       = $audioUrl;
         $audiodata->sub_category_id = $nId;
         $audiodata->save();
         return redirect()->route('admin.nabawi.data.list',['id' => $nId])->with('status',trans('admin.save'));
      }

      public function livestreamEdit($id)
      {
        $data     = AudioData::where('audio_id',$id)->first();
        $language = Language::all();
        return view('Admin.MasjidAlNabawi.LiveStreamOfKhutbah.Edit')->with('data',$data)->with('language',$language);
      }

      public function livestreamUpdate(Request $request)
      {
        $request->validate([
            'language_id' => 'required',
            'audio_url' => 'required',
        ], [
            'language_id.required' => trans('admin.select_language'),
            'audio_url.required'   => trans('admin.audio_url_required'),
        ]);

         $languageId =  $request->language_id;
         $audioUrl   =  $request->audio_url;
         $audioId    =  $request->audio_id;
         $nId        =  $request->nId;

         $data = AudioData::where('audio_id',$audioId)->first();
         $data->language_id = $languageId;
         $data->audio_url   = $audioUrl;
         $data->save();
         return redirect()->route('admin.nabawi.data.list',['id' => $nId])->with('status',trans('admin.update'));
      }

      public function livestreamDelete($id)
      {
         $data = AudioData::where('audio_id',$id)->first();
         $data->delete();
         return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
      }

      public function fridayKhutbahsAdd($id)
      {
          $year = Year::all(); //get()->groupBy('language_en');
          $language = Language::all();
          $nId = $id;
          return view('Admin.MasjidAlNabawi.FridayKhutbahs.Add')->with('year',$year)->with('language',$language)->with('nId',$nId);
      }

      public function fridayKhutbahsStore(Request $request)
      {
          $request->validate([
              'year_id'      => 'required',
              'language_id'  => 'required',
             // 'audio_file'   => 'required',
              'audio_title'  => 'required',
              'audio_auther' => 'required',
              'audio_artist' => 'required',
          ], [
                  'year_id.required'      => trans('admin.select_year'),
                  'language_id.required'  => trans('admin.select_language'),
                //  'audio_file.required'   => trans('admin.audio_file_required'),
                  'audio_title.required'  => trans('admin.audio_title'),
                  'audio_auther.required' => trans('admin.audio_auther'),
                  'audio_artist.required' => trans('admin.audio_artist'),
              ]);

          $nId = $request->nId;

          return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
      }

      public function fridayKhutbahsEdit($id)
      {
        $data = AudioData::where('audio_id',$id)->first();
        $year = Year::all();
        $language = Language::all();
        return view('Admin.MasjidAlNabawi.FridayKhutbahs.Edit')->with('data',$data)->with('year',$year)->with('language',$language);
      }

      public function fridayKhutbahsUpdate(Request $request)
      {
          $request->validate([
              'year_id'      => 'required',
              'language_id'  => 'required',
             // 'audio_file'   => 'required',
              'audio_title'  => 'required',
              'audio_auther' => 'required',
              'audio_artist' => 'required',
          ], [
                  'year_id.required'      => trans('admin.select_year'),
                  'language_id.required'  => trans('admin.select_language'),
                //'audio_file.required'   => trans('admin.audio_file_required'),
                  'audio_title.required'  => trans('admin.audio_title'),
                  'audio_auther.required' => trans('admin.audio_auther'),
                  'audio_artist.required' => trans('admin.audio_artist'),
              ]);

          $nId = $request->nId;

          return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
      }
      public function fridayKhutbahsDelete($id)
        {
           $data = AudioData::where('audio_id',$id)->first();
           $data->delete();
           return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
        }

    public function livestrEdit($id)
    {
        $data     = AudioData::where('audio_id',$id)->first();
        return view('Admin.MasjidAlNabawi.LiveStream.Edit')->with('data',$data);
    }

    public function livestrUpdate(Request $request)
      {
        $request->validate([
            'audio_url' => 'required',
            'video_url' => 'required',
        ], [
            'audio_url.required' => trans('admin.audio_url_required'),
            'video_url.required'   => trans('admin.video_url_required'),
        ]);

         $videoUrl   =  $request->video_url;
         $audioUrl   =  $request->audio_url;
         $audioId    =  $request->audio_id;
         $nId        =  $request->nId;

         $data = AudioData::where('audio_id',$audioId)->first();
         $data->video_url = $videoUrl;
         $data->audio_url   = $audioUrl;
         $data->save();
         return redirect()->route('admin.nabawi.data.list',['id' => $nId])->with('status',trans('admin.update'));
      }



    public function livestrDelete($id)
      {
         $data = AudioData::where('audio_id',$id)->first();
         $data->delete();
         return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
      }

    public function adhaanAdd($id)
    {
        $data = Maudhins::all(); //get()->groupBy('language_en');
        $nId = $id;
        return view('Admin.MasjidAlNabawi.Adhaan.Add')->with('data',$data)->with('nId',$nId);
    }

    public function adhaanStore(Request $request)
    {
        $request->validate([
            'maudhins_id'  => 'required',
           // 'audio_file'   => 'required',
            'audio_title'  => 'required',
            'audio_auther' => 'required',
            'audio_artist' => 'required',
        ], [
                'maudhins_id.required'  => trans('admin.select_maudhin'),
              //  'audio_file.required'   => trans('admin.audio_file_required'),
                'audio_title.required'  => trans('admin.audio_title'),
                'audio_auther.required' => trans('admin.audio_auther'),
                'audio_artist.required' => trans('admin.audio_artist'),
            ]);

        $nId = $request->nId;

        return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
    }
    public function adhaanEdit($id)
    {
      $data     = AudioData::where('audio_id',$id)->first();
      $maudhins = Maudhins::all();
      return view('Admin.MasjidAlNabawi.Adhaan.Edit')->with('data',$data)->with('maudhins',$maudhins);
    }

    public function adhaanUpdate(Request $request)
    {
        $request->validate([
            'maudhins_id'  => 'required',
           // 'audio_file'   => 'required',
            'audio_title'  => 'required',
            'audio_auther' => 'required',
            'audio_artist' => 'required',
        ], [
                'maudhins_id.required'  => trans('admin.select_maudhin'),
              //  'audio_file.required'   => trans('admin.audio_file_required'),
                'audio_title.required'  => trans('admin.audio_title'),
                'audio_auther.required' => trans('admin.audio_auther'),
                'audio_artist.required' => trans('admin.audio_artist'),
            ]);

        $nId = $request->nId;

        return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
    }

    public function adhaanDelete($id)
      {
         $data = AudioData::where('audio_id',$id)->first();
         $data->delete();
         return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
      }

    public function eidKhutbahsAdd($id)
    {
        $year = Year::all(); //get()->groupBy('language_en');
        $language = Language::all();
        $nId = $id;
        return view('Admin.MasjidAlNabawi.EidKhutbahs.Add')->with('year',$year)->with('language',$language)->with('nId',$nId);
    }

    public function eidKhutbahsStore(Request $request)
    {
        $request->validate([
            'year_id'      => 'required',
            'language_id'  => 'required',
           // 'audio_file'   => 'required',
            'audio_title'  => 'required',
            'audio_auther' => 'required',
            'audio_artist' => 'required',
        ], [
                'year_id.required'      => trans('admin.select_year'),
                'language_id.required'  => trans('admin.select_language'),
              //  'audio_file.required'   => trans('admin.audio_file_required'),
                'audio_title.required'  => trans('admin.audio_title'),
                'audio_auther.required' => trans('admin.audio_auther'),
                'audio_artist.required' => trans('admin.audio_artist'),
            ]);

        $nId = $request->nId;

        return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
    }

    public function eidKhutbahsEdit($id)
    {
      $data = AudioData::where('audio_id',$id)->first();
      $year = Year::all();
      $language = Language::all();
      return view('Admin.MasjidAlNabawi.EidKhutbahs.Edit')->with('data',$data)->with('year',$year)->with('language',$language);
    }

    public function eidKhutbahsUpdate(Request $request)
    {
        $request->validate([
            'year_id'      => 'required',
            'language_id'  => 'required',
           // 'audio_file'   => 'required',
            'audio_title'  => 'required',
            'audio_auther' => 'required',
            'audio_artist' => 'required',
        ], [
                'year_id.required'      => trans('admin.select_year'),
                'language_id.required'  => trans('admin.select_language'),
              //'audio_file.required'   => trans('admin.audio_file_required'),
                'audio_title.required'  => trans('admin.audio_title'),
                'audio_auther.required' => trans('admin.audio_auther'),
                'audio_artist.required' => trans('admin.audio_artist'),
            ]);

        $nId = $request->nId;

        return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
    }
    public function eidKhutbahsDelete($id)
      {
         $data = AudioData::where('audio_id',$id)->first();
         $data->delete();
         return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
      }

    public function eidTakbeeratAdd($id)
    {
        $data = Maudhins::all();
        $nId = $id;
        return view('Admin.MasjidAlNabawi.EidTakbeerat.Add')->with('data',$data)->with('nId',$nId);
    }

    public function eidTakbeeratStore(Request $request)
    {
        $request->validate([
            'maudhins_id'  => 'required',
           // 'audio_file'   => 'required',
            'audio_title'  => 'required',
            'audio_auther' => 'required',
            'audio_artist' => 'required',
        ], [
                'maudhins_id.required'  => trans('admin.select_maudhin'),
              //  'audio_file.required'   => trans('admin.audio_file_required'),
                'audio_title.required'  => trans('admin.audio_title'),
                'audio_auther.required' => trans('admin.audio_auther'),
                'audio_artist.required' => trans('admin.audio_artist'),
            ]);

        $nId = $request->nId;

        return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
    }
    public function eidTakbeeratEdit($id)
    {
      $data     = AudioData::where('audio_id',$id)->first();
      $maudhins = Maudhins::all();
      return view('Admin.MasjidAlNabawi.EidTakbeerat.Edit')->with('data',$data)->with('maudhins',$maudhins);
    }

    public function eidTakbeeratUpdate(Request $request)
    {
        $request->validate([
            'maudhins_id'  => 'required',
           // 'audio_file'   => 'required',
            'audio_title'  => 'required',
            'audio_auther' => 'required',
            'audio_artist' => 'required',
        ], [
                'maudhins_id.required'  => trans('admin.select_maudhin'),
              //  'audio_file.required'   => trans('admin.audio_file_required'),
                'audio_title.required'  => trans('admin.audio_title'),
                'audio_auther.required' => trans('admin.audio_auther'),
                'audio_artist.required' => trans('admin.audio_artist'),
            ]);

        $nId = $request->nId;

        return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
    }

    public function eidTakbeeratDelete($id)
      {
         $data = AudioData::where('audio_id',$id)->first();
         $data->delete();
         return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
      }


      public function imaamsRecitaionAdd($id)
      {
          $imaam = Imaam::all(); //get()->groupBy('language_en');
          $surah = SurahList::all();
          $nId = $id;
          return view('Admin.MasjidAlNabawi.ImaamsRecitaion.Add')->with('surah',$surah)->with('imaam',$imaam)->with('nId',$nId);
      }

      public function imaamsRecitaionStore(Request $request)
      {
          $request->validate([
              'imaam_id'      => 'required',
              'surah_id'  => 'required',
             // 'audio_file'   => 'required',
              'audio_title'  => 'required',
              'audio_auther' => 'required',
              'audio_artist' => 'required',
          ], [
                  'imaam_id.required'      => trans('admin.select_imaam'),
                  'surah_id.required'  => trans('admin.select_surah'),
                //  'audio_file.required'   => trans('admin.audio_file_required'),
                  'audio_title.required'  => trans('admin.audio_title'),
                  'audio_auther.required' => trans('admin.audio_auther'),
                  'audio_artist.required' => trans('admin.audio_artist'),
              ]);

          $nId = $request->nId;

          return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
      }

      public function imaamsRecitaionEdit($id)
      {
        $data = AudioData::where('audio_id',$id)->first();
        $imaam = Imaam::all();
        $surah = SurahList::all();
        return view('Admin.MasjidAlNabawi.ImaamsRecitaion.Edit')->with('data',$data)->with('imaam',$imaam)->with('surah',$surah);
      }

      public function imaamsRecitaionUpdate(Request $request)
      {
          $request->validate([
              'imaam_id'      => 'required',
              'surah_id'  => 'required',
             // 'audio_file'   => 'required',
              'audio_title'  => 'required',
              'audio_auther' => 'required',
              'audio_artist' => 'required',
          ], [
                  'imaam_id.required'     => trans('admin.select_imaam'),
                  'surah_id.required'     => trans('admin.select_surah'),
                //'audio_file.required'   => trans('admin.audio_file_required'),
                  'audio_title.required'  => trans('admin.audio_title'),
                  'audio_auther.required' => trans('admin.audio_auther'),
                  'audio_artist.required' => trans('admin.audio_artist'),
              ]);

          $nId = $request->nId;

          return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
      }
      public function imaamsRecitaionDelete($id)
        {
           $data = AudioData::where('audio_id',$id)->first();
           $data->delete();
           return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
        }

        public function previousTaraweehSalaahAdd($id)
        {
            $year = Year::all(); //get()->groupBy('language_en');
            $surah = SurahList::all();
            $nId = $id;
            return view('Admin.MasjidAlNabawi.PreviousTaraweehSalaah.Add')->with('year',$year)->with('surah',$surah)->with('nId',$nId);
        }

        public function previousTaraweehSalaahStore(Request $request)
        {
            $request->validate([
                'year_id'      => 'required',
                'surah_id'  => 'required',
               // 'audio_file'   => 'required',
                'audio_title'  => 'required',
                'audio_artist' => 'required',
            ], [
                    'year_id.required'      => trans('admin.select_year'),
                    'surah_id.required'  => trans('admin.select_surah_req'),
                  //  'audio_file.required'   => trans('admin.audio_file_required'),
                    'audio_title.required'  => trans('admin.audio_title'),
                    'audio_artist.required' => trans('admin.audio_artist'),
                ]);

            $nId = $request->nId;

            return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
        }

        public function previousTaraweehSalaahEdit($id)
        {
          $data = AudioData::where('audio_id',$id)->first();
          $year = Year::all();
          $surah = SurahList::all();
          return view('Admin.MasjidAlNabawi.PreviousTaraweehSalaah.Edit')->with('data',$data)->with('year',$year)->with('surah',$surah);
        }

        public function previousTaraweehSalaahUpdate(Request $request)
        {
            $request->validate([
                'year_id'      => 'required',
                'surah_id'  => 'required',
               // 'audio_file'   => 'required',
                'audio_title'  => 'required',
                'audio_artist' => 'required',
            ], [
                    'year_id.required'      => trans('admin.select_year'),
                    'surah_id.required'  => trans('admin.select_surah_req'),
                  //  'audio_file.required'   => trans('admin.audio_file_required'),
                    'audio_title.required'  => trans('admin.audio_title'),
                    'audio_artist.required' => trans('admin.audio_artist'),
                ]);

            $nId = $request->nId;

            return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
        }
        public function previousTaraweehSalaahDelete($id)
          {
             $data = AudioData::where('audio_id',$id)->first();
             $data->delete();
             return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
          }

          public function janazahSalaahAdd($id)
          {
              $data = Maudhins::all(); //get()->groupBy('language_en');
              $nId = $id;
              return view('Admin.MasjidAlNabawi.JanazahSalaah.Add')->with('data',$data)->with('nId',$nId);
          }

          public function janazahSalaahStore(Request $request)
          {
              $request->validate([
                  'maudhins_id'  => 'required',
                 // 'audio_file'   => 'required',
                  'audio_title'  => 'required',
                  'audio_auther' => 'required',
                  'audio_artist' => 'required',
              ], [
                      'maudhins_id.required'  => trans('admin.select_maudhin'),
                    //  'audio_file.required'   => trans('admin.audio_file_required'),
                      'audio_title.required'  => trans('admin.audio_title'),
                      'audio_auther.required' => trans('admin.audio_auther'),
                      'audio_artist.required' => trans('admin.audio_artist'),
                  ]);

              $nId = $request->nId;

              return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
          }
          public function janazahSalaahEdit($id)
          {
            $data     = AudioData::where('audio_id',$id)->first();
            $maudhins = Maudhins::all();
            return view('Admin.MasjidAlNabawi.JanazahSalaah.Edit')->with('data',$data)->with('maudhins',$maudhins);
          }

          public function janazahSalaahUpdate(Request $request)
          {
              $request->validate([
                  'maudhins_id'  => 'required',
                 // 'audio_file'   => 'required',
                  'audio_title'  => 'required',
                  'audio_auther' => 'required',
                  'audio_artist' => 'required',
              ], [
                      'maudhins_id.required'  => trans('admin.select_maudhin'),
                    //  'audio_file.required'   => trans('admin.audio_file_required'),
                      'audio_title.required'  => trans('admin.audio_title'),
                      'audio_auther.required' => trans('admin.audio_auther'),
                      'audio_artist.required' => trans('admin.audio_artist'),
                  ]);

              $nId = $request->nId;

              return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
          }

          public function janazahSalaahDelete($id)
            {
               $data = AudioData::where('audio_id',$id)->first();
               $data->delete();
               return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
            }

            public function tableeghStylesAdd($id)
            {
                $data = Maudhins::all(); //get()->groupBy('language_en');
                $nId = $id;
                return view('Admin.MasjidAlNabawi.TableeghStyles.Add')->with('data',$data)->with('nId',$nId);
            }

            public function tableeghStylesStore(Request $request)
            {
                $request->validate([
                    'maudhins_id'  => 'required',
                   // 'audio_file'   => 'required',
                    'audio_title'  => 'required',
                    'audio_auther' => 'required',
                    'audio_artist' => 'required',
                ], [
                        'maudhins_id.required'  => trans('admin.select_maudhin'),
                      //  'audio_file.required'   => trans('admin.audio_file_required'),
                        'audio_title.required'  => trans('admin.audio_title'),
                        'audio_auther.required' => trans('admin.audio_auther'),
                        'audio_artist.required' => trans('admin.audio_artist'),
                    ]);

                $nId = $request->nId;

                return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
            }
            public function tableeghStylesEdit($id)
            {
              $data     = AudioData::where('audio_id',$id)->first();
              $maudhins = Maudhins::all();
              return view('Admin.MasjidAlNabawi.TableeghStyles.Edit')->with('data',$data)->with('maudhins',$maudhins);
            }

            public function tableeghStylesUpdate(Request $request)
            {
                $request->validate([
                    'maudhins_id'  => 'required',
                   // 'audio_file'   => 'required',
                    'audio_title'  => 'required',
                    'audio_auther' => 'required',
                    'audio_artist' => 'required',
                ], [
                        'maudhins_id.required'  => trans('admin.select_maudhin'),
                      //  'audio_file.required'   => trans('admin.audio_file_required'),
                        'audio_title.required'  => trans('admin.audio_title'),
                        'audio_auther.required' => trans('admin.audio_auther'),
                        'audio_artist.required' => trans('admin.audio_artist'),
                    ]);

                $nId = $request->nId;

                return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
            }

            public function tableeghStylesDelete($id)
              {
                 $data = AudioData::where('audio_id',$id)->first();
                 $data->delete();
                 return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
              }

              public function talbiyahAdd($id)
              {
                  $data = Maudhins::all(); //get()->groupBy('language_en');
                  $nId = $id;
                  return view('Admin.MasjidAlNabawi.Talbiyah.Add')->with('data',$data)->with('nId',$nId);
              }

              public function talbiyahStore(Request $request)
              {
                  $request->validate([
                      'maudhins_id'  => 'required',
                     // 'audio_file'   => 'required',
                      'audio_title'  => 'required',
                      'audio_auther' => 'required',
                      'audio_artist' => 'required',
                  ], [
                          'maudhins_id.required'  => trans('admin.select_maudhin'),
                        //  'audio_file.required'   => trans('admin.audio_file_required'),
                          'audio_title.required'  => trans('admin.audio_title'),
                          'audio_auther.required' => trans('admin.audio_auther'),
                          'audio_artist.required' => trans('admin.audio_artist'),
                      ]);

                  $nId = $request->nId;

                  return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
              }
              public function talbiyahEdit($id)
              {
                $data     = AudioData::where('audio_id',$id)->first();
                $maudhins = Maudhins::all();
                return view('Admin.MasjidAlNabawi.Talbiyah.Edit')->with('data',$data)->with('maudhins',$maudhins);
              }

              public function talbiyahUpdate(Request $request)
              {
                  $request->validate([
                      'maudhins_id'  => 'required',
                     // 'audio_file'   => 'required',
                      'audio_title'  => 'required',
                      'audio_auther' => 'required',
                      'audio_artist' => 'required',
                  ], [
                          'maudhins_id.required'  => trans('admin.select_maudhin'),
                        //  'audio_file.required'   => trans('admin.audio_file_required'),
                          'audio_title.required'  => trans('admin.audio_title'),
                          'audio_auther.required' => trans('admin.audio_auther'),
                          'audio_artist.required' => trans('admin.audio_artist'),
                      ]);

                  $nId = $request->nId;

                  return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
              }

             public function talbiyahDelete($id)
                {
                   $data = AudioData::where('audio_id',$id)->first();
                   $data->delete();
                   return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
                }

                public function dailySalaahAdd($id)
                {
                    $imaam = Imaam::all();
                    $nId = $id;
                    return view('Admin.MasjidAlNabawi.DailySalaah.Add')->with('imaam',$imaam)->with('nId',$nId);
                }

                public function dailySalaahStore(Request $request)
                {
                    $request->validate([
                        'imaam_id'  => 'required',
                       // 'audio_file'   => 'required',
                        'audio_title'  => 'required',
                        'audio_auther' => 'required',
                        'audio_artist' => 'required',
                    ], [
                            'imaam_id.required'  => trans('admin.select_imaam_req'),
                          //  'audio_file.required'   => trans('admin.audio_file_required'),
                            'audio_title.required'  => trans('admin.audio_title'),
                            'audio_auther.required' => trans('admin.audio_auther'),
                            'audio_artist.required' => trans('admin.audio_artist'),
                        ]);

                    $nId = $request->nId;

                    return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
                }
                public function dailySalaahEdit($id)
                {
                  $data     = AudioData::where('audio_id',$id)->first();
                  $imaam = Imaam::all();
                  return view('Admin.MasjidAlNabawi.DailySalaah.Edit')->with('data',$data)->with('imaam',$imaam);
                }

                public function dailySalaahUpdate(Request $request)
                {
                    $request->validate([
                        'imaam_id'  => 'required',
                       // 'audio_file'   => 'required',
                        'audio_title'  => 'required',
                        'audio_auther' => 'required',
                        'audio_artist' => 'required',
                    ], [
                            'imaam_id.required'  => trans('admin.select_imaam_req'),
                          //  'audio_file.required'   => trans('admin.audio_file_required'),
                            'audio_title.required'  => trans('admin.audio_title'),
                            'audio_auther.required' => trans('admin.audio_auther'),
                            'audio_artist.required' => trans('admin.audio_artist'),
                        ]);

                    $nId = $request->nId;

                    return redirect()->route('admin.nabawi.data.list', ['id' => $nId])->with('status', trans('admin.save'));
                }

               public function dailySalaahDelete($id)
                  {
                     $data = AudioData::where('audio_id',$id)->first();
                     $data->delete();
                     return redirect()->route('admin.nabawi.data.list',['id' => $data->sub_category_id])->with('status',trans('admin.update'));
                  }

}

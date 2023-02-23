<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;
use App\Http\Requests\Admin\VideoSubcategoryRequest;
use App\Models\Video;
use App\Models\VideoLink;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

    class VideoController extends Controller
    {
        public function dashboardVideo()
        {
            return view('Admin.Video.Dashboard');
        }

        public function videoCategory($id)
        {
            $cat_id = $id;
            $data = Video::where('parent_id', $id)->get();
            return view('Admin.Video.CategoryList')->with('cat_id', $cat_id)->with('data', $data);
        }

        public function videoCategoryStore(VideoRequest $request)
        {
            $name        = $request->txtCategory;
            $nameArabic  = $request->txtCategoryArabic;
            $parentId    = $request->cat_id;

            $video               = new Video();
            $video->name         = $name;
            $video->name_arabic  = $nameArabic;
            $video->parent_id    = $parentId;
            $video->save();
            return redirect()->back()->with('status', trans('admin.video_category_add_successfully'));
        }

        public function videoCategoryEditView($id)
        {
            $cat_id =  Video::where('id', $id)->value('parent_id');
            $data   =  Video::where('id', $id)->first();
            return view('Admin.Video.CategoryEdit')->with('cat_id', $cat_id)->with('data', $data);
        }

        public function videoCategoryUpdate(Request $request)
        {

            $request->validate([
                'name'        => 'required',
                'name_arabic' => 'required',
            ], [
                'name.required'         => trans('admin.category_name_english'),
                'name_arabic.required'  => trans('admin.category_name_arabic'),
            ]);

            $id          = $request->id;
            $name        = $request->name;
            $nameArabic  = $request->name_arabic;
        
            $data = Video::where('id', $id)->first();
            if (!empty($data)) {
                $data->name         = $name;
                $data->name_arabic  = $nameArabic;
                $data->save();
                return redirect()->back()->with('status', trans('admin.video_category_update_successfully'));
            } else {
                return redirect()->back()->with('status', trans('admin.video_category_update_successfully'));
            }
        }

        public function videoSubCategory($id)
        {
            $mId  = Video::where('id', $id)->value('parent_id');
            $name = Video::where('id', $id)->value('name');
            $data = VideoLink::where('subcategory_id',$id)->get();
            return view('Admin.Video.SubCategoryData')->with('data',$data)->with('name',$name)->with('mId',$mId)->with('id',$id);
        }

        public function videoSubCategoryStore(VideoSubcategoryRequest $request)
        {
            $subCatId    = $request->subCatId;
            $name        = $request->subCatName;
            $nameArabic  = $request->subCatArabic;
            $link	     = $request->subCatLink;

            $videoLink                    = new VideoLink();
            $videoLink->subcategory_id    = $subCatId;
            $videoLink->name              = $name;
            $videoLink->name_arabic       = $nameArabic;
            $videoLink->link              = $link;
            $videoLink->save();
            return redirect()->back()->with('status', trans('admin.video_sub_category_add_successfully'));

        }

        public function showVideoSubcategoryDatatable(Request $request)
        {
            $id = $request->id;
            $data = VideoLink::where('subcategory_id',$id)->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $Edit = "<a href=' " . route("admin.video.subcategoryEdit", ['id' => $data->id]) . "'  class='btn  btn-info'><i class='fa fa-pencil'></i></a>";
                return $Edit;
            })
            ->rawColumns(["action"])
            ->make(true);
            
        }

        public function videoSubCategoryEdit($id)
        {
            $data = VideoLink::where('id',$id)->first();
            $mId  = $data->subcategory_id;
            $name = Video::where('id',$mId)->value('name');
            return view('Admin.Video.SubCategoryEdit')->with('data',$data)->with('name',$name)->with('mId',$mId);
        }

        public function videoSubCategoryUpdate(Request $request)
        {
            $request->validate([
                'subCatName'   => 'required',
                'subCatArabic' => 'required',
                'subCatLink'   => 'required',
            ],[
                'subCatName'   =>  trans('admin.category_name_english'),
                'subCatArabic' =>  trans('admin.category_name_arabic'),
                'subCatLink'   =>  trans('admin.redirect_link'),
            ]);

            $name       = $request->subCatName;
            $nameArabic = $request->subCatArabic;
            $link       = $request->subCatLink;
            $id         = $request->id;
     
            $data = VideoLink::where('id', $id)->first();
            if(!empty($data))
                {
                    $data->name        = $name;
                    $data->name_arabic = $nameArabic;
                    $data->link        = $link;
                    $data->save(); 
                    return redirect()->back()->with('status', trans('admin.video_sub_category_update_successfully'));
                }
        }
   }

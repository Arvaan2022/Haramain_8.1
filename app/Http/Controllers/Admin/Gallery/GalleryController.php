<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryCategoryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data = GalleryCategory::where('parent_id','=','0')->get();
        return view('Admin.Gallery.Dashboard', compact('data'));
     }

    public function add()
    {
         return view('Admin.Gallery.Add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryEn'     => 'required',
            'categoryArabic' => 'required',
            'type'           => 'required',
        ],[
            'categoryEn.required'     => trans(''),
            'categoryArabic.required' => trans(''),
            'type.required'           => trans(''),
        ]);

        $categoryEn     = $request->categoryEn;
        $categoryArabic = $request->categoryArabic;
        $type           = $request->type;

        $gallery                       = new GalleryCategory();
        $gallery->gallery_category_en  = $categoryEn;
        $gallery->gallery_category_ar  = $categoryArabic;
        $gallery->upload_type          = $type;
        $gallery->save();
        return redirect()->route('admin.gallery.dashboard')->with('status', trans('admin.category_save_successfully'));
     }

    public function addGallery($id)
    {
        $upload = GalleryCategory::where('gallery_category_id', $id)->value('upload_type');
        $galleryCategroy = GalleryCategory::where('gallery_category_id', $id)->value('gallery_category_en');
        $galleryCategoryId = $id;
        $data = GalleryCategoryImages::where('gallery_category_id',$id)->orderBy('gallery_category_image_id', 'DESC')->get();
        return view('Admin.GalleryImages.List')->with('data',$data)->with('galleryCategoryId',$galleryCategoryId)->with('galleryCategroy',$galleryCategroy)->with('upload',$upload);
    }

    public function storeGallery(Request $request)
    {

        if($request->upload_type == "PDF"){

            $request->validate([
                "file" => "required|mimes:pdf|max:10000"
               ], [
                'file.required'   => 'Please Upload Your File',
               ]);

            if ($request->hasFile('file')) {
                $file     = $request->file('file');
                $fileName =  $file->getClientOriginalName(). '.' . $file->getClientOriginalExtension();
                $file->move('storage/uploads/quran/', $fileName);
                $thumPath = "quran/".$fileName;
                $imagePath = "quran/".$fileName;
             }
        }
        else{

            $request->validate([
                'file'  => ['required','image', 'mimes:jpeg,png,jpg', 'max:4096'],
              ], [
                'file.required' => 'Please Upload Your File',
               ]);

             if ($request->hasFile('file')) {
                $file     = $request->file('file');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('storage/uploads/gallery_images/', $fileName);
                $thumPath = "gallery_images/thumb/".$fileName;
                $imagePath = "gallery_images/".$fileName;
               // $file->move('storage/uploads/gallery_images/thumb', $fileName);
            }
          }

          $galleryCategoryImages =  new GalleryCategoryImages();
          $galleryCategoryImages->gallery_category_id = $request->gallery_categroy_id;
          $galleryCategoryImages->file_type           = $request->upload_type;
          $galleryCategoryImages->image_thumb_url     = $thumPath;
          $galleryCategoryImages->image_url           = $imagePath;
          $galleryCategoryImages->save();
          return redirect()->back()->with('status', trans('admin.file_upload_successfully'));
    }

     public function index()
    {
        //
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

<?php

namespace App\Http\Controllers\Api\Mosque;

use App\Http\Controllers\Controller;
use App\Models\AudioData;
use App\Models\Category;
use App\Models\GalleryCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MosqueController extends Controller
{

    public function getMosqueList()
    {
        $data = [];
        $cateData = Category::where('status','=','1')->get();

        foreach($cateData as $key => $catValue)
         {
             $slug     = $catValue->slug;
             $catId    = $catValue->category_id;
             $catName  = $catValue->category_en;
             $catImage = $catValue->cat_image;
             $subCategory = SubCategory::select('sub_category_id','sub_category_en as sub_category_name','slug')->where('category_id',$catId)->where('status','1')->get();

             $a['category_id'] = $catId;
             $a['category_name'] = $catName;
             $a['cat_image'] = $catImage;
             $a['audio_url'] = "";
             $a['video_url'] = "";
             $a['cat_image'] = "";
             $a['sub_category_detail'] = $subCategory;
             $data[$slug] =  $a;
         }

        $message = "Category Retrived Successfully";
        return $this->successResponse($message,$data);
    }
}

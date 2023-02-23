<?php

namespace App\Http\Controllers\Translation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Translation\StoreTranslationRequest;
use App\Http\Requests\Translation\UpdateTranslationRequest;
use App\Models\Setting;
use Exception;
use Spatie\TranslationLoader\LanguageLine;
use Yajra\DataTables\DataTables;

class TranslationController extends Controller
{
    public function index()
    {
        return view('Admin.Translation.Add');
    }

    public function store(StoreTranslationRequest $request)
    {
        // pre($request->all());
        try {
            $validated = $request->validated();
            if (strpos($validated['key'], '.') !== false) {
                $exploded = explode('.', $validated['key'], 2);
                LanguageLine::create([
                    'group' => $exploded[0],
                    'key' => $exploded[1],
                    'text' => ['en' => $validated['text']],
                ]);

                // $sett = Setting::firstOrNew(['text_key' => 'translation_status']);
                // $sett->text_value = 1;
                // $sett->text_key = 'translation_status';
                // $sett->type = 1;
                // $sett->save();
                return redirect()->route('admin.Translation.List')->withSuccess(trans('admin.tranlation_store_success'));


            } else {
                return redirect()->route('admin.Translation.List')->withErrors(trans('admin.error_translation_wrong_format'));
            }
        } catch (Exception $e) {
            return redirect()->route('admin.Translation.List')->withErrors($e->getMessage());
        }
    }

    public function list()
    {
        return view('Admin.Translation.List');
    }

    public function listDatatable()
    {
        $data = LanguageLine::all();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $str = '<a href="' . route('admin.Translation.Edit', $data->id) . '"class="btn  btn-info"><i class="fa fa-pencil"></i></a>';
                return $str;
            })
            ->editColumn('group', function ($data) {
                return $data->group . "." . $data->key;
            })
            ->editColumn('text', function ($data) {
                $text = $data->text;
                return $text['en'] ?? "";
            })->addColumn("empty", function ($data) {
            return '&nbsp;';
        })
            ->rawColumns(["action", "text"])
            ->make(true);
    }

    public function edit($id)
    {
        $data = LanguageLine::where("id", "=", $id)->first();
        return view('Admin.Translation.Edit')->with(["data" => $data]);
    }

    public function update(UpdateTranslationRequest $request, $translation_id)
    {
        try {
            $translationUpdateData = LanguageLine::where('id', '=', $translation_id)->first();
            if (!empty($translationUpdateData)) {
                $validated = $request->validated();
                $translationUpdateData->text = ['en' => $validated['text']];
                $translationUpdateData->save();
                return redirect()->route('admin.Translation.List')->with('status',trans('admin.tranlation_update_success'));
            } else {
                return redirect()->route('admin.Translation.List')->withErrors(trans('admin.error_translation_data_update'));
            }
        } catch (Exception $e) {
            return redirect()->route('admin.Translation.List')->withErrors($e->getMessage());
        }
    }

}
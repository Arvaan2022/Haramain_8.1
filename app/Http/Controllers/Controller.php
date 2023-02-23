<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($message = '',$data)
    {
        return response()->json(['status_code'=>200,'message' => $message, 'data' => $data], Response::HTTP_OK);
    }

    public function errorResponse($message = 'something went wrong')
    {
        return response()->json(['status_code'=>500,'message' => $message, 'data' => []], Response::HTTP_INTERNAL_SERVER_ERROR);
    }


    public function validationErrorResponse($message)
    {
        return response()->json(['status_code'=>202,'message' => $message, 'data' => []], Response::HTTP_ACCEPTED);
    }

    public function validationErrorMessage($message)
    {

        return redirect()->back()->withErrors($message);
    }
}

<?php 
include_once('define.php');
use Illuminate\Http\Response;
 
function  validationErrorResponse($message)
{
    // return response()->json(['message' => $message, 'data' => []], Response::HTTP_UNPROCESSABLE_ENTITY);
    return response()->json(['status'=>202,'message' => $message], Response::HTTP_ACCEPTED);

}

function randomToken() {
    return sha1(md5(time()) . time() . rand());
}

?>
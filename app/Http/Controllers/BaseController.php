<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessage;

class BaseController extends Controller
{
    use FlashMessage;

    protected $data = null;

    protected function setTitlePage($title, $subTitle){
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }

    protected function showErrorPage($errorCode = 404, $message = null){
        $data['message'] = $message;
        return response()->view('error.'.$errorCode, $data, $errorCode);
    }

    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null) {
        return response()->json([
            'error' => $error,
            'response' => $responseCode,
            'message' => $message,
            'data' => $data,
        ]);
    }

    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false){
        $this->setFlashMessage($message, $type);
        $this->showFlashMessage();
        if ($error && $withOldInputWhenError){
            return redirect()->back()->withInput();
        }
        return redirect()->route($route);
    }

    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false){
        $this->setFlashMessage($message, $type);
        $this->showFlashMessage();

        return redirect()->back();
    }

}

<?php

namespace App\Traits;

trait FlashMessage {

    protected $errorMessage = [];

    protected $infoMessage = [];

    protected $successMessage = [];

    protected $warningMessage = [];

    protected function setFlashMessage($message, $type){
        $model = 'infoMessage';

        switch ($type) {
            case 'info': {
                $model = 'infoMessage';
            }
                break;
            case 'error': {
                $model = 'errorMessage';
            }
                break;
            case 'success': {
                $model = 'successMessage';
            }
                break;
            case 'warningMessage': {
                $model = 'warningMessage';
            }
                break;
        }

        if (is_array($message)){
            foreach ($message as $value){
                array_push($message, $value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }

    protected function getFlashMessage(){
        return [
            'error' => $this->errorMessage,
            'info' => $this->infoMessage,
            'success' => $this->successMessage,
            'warningMessage' => $this->warningMessage
        ];
    }

    protected function showFlashMessage(){
        session()->flash('error', $this->errorMessage);
        session()->flash('info', $this->infoMessage);
        session()->flash('success', $this->successMessage);
        session()->flash('warning', $this->warningMessage);
    }

}

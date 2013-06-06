<?php
class DefaultController extends RestController
{
    public function actionError()
    {
        $error = app()->errorHandler->error;
        if ($error) {
            $data = array(
                'errcode' => $error['code'],
                'message' => $error['message'],
            );
            
            if (REST_DEBUG) {
                $data['type'] = $error['type'];
                $data['trace'] = $error['trace'];
            }
            
            $value['error'] = $data;
            
            echo CJSON::encode($value);
        	exit(0);
        }
    }
}
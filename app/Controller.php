<?php

namespace App;

class Controller
{
    //hiển thị lỗi vào đây
    public function logErrors($message)
    {
        $date = date('d-m-Y');
        $message = date('d-m-Y H:i:s') . '-' . $message . PHP_EOL;
        error_log($message, 3, "storage/logs/$date.log");
    }

    //validate
    public function validate($validator, $data, $rules)
    {
        $validate = $validator->make($data, $rules);
        $validate->validate();
        if ($validate->fails()) {
            return $validate->errors()->firstOfAll();
        }
        return [];
    }


    public function uploadFile(array $file, $path = null)
    {
        $fileTmpPath = $file['tmp_name'];
        $fileName = time(). '-'.$file['name'];
        $uploadPath = 'storage/uploads/' . $path . '/';
        if(!is_dir($uploadPath)){
            mkdir($uploadPath,0755,true);
        }
        $endPath = $uploadPath . $fileName;

        if (move_uploaded_file($fileTmpPath, $endPath)) {
            return $endPath;
        }
        throw new \Exception("Lỗi upload file");
    }
}

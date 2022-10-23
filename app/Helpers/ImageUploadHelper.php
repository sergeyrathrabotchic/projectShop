<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class ImageUploadHelper
{
    public static function imageUpload(UploadedFile $file) :string
    {
       $fileExtension = $file->getClientOriginalExtension();
       $fileName = uniqid('_n') . '.' . $fileExtension;

       return $file->storeAs('slaid', $fileName, 'image');
    }
}

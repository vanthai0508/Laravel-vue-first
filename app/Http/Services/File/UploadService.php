<?php

namespace App\Http\Services\File;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    protected $file;
    public function __construct(File $file)
    {
        $this->file = $file;
    }
    public function __invoke($request)
    {
        $fileRequest = $request->file('files');
        $fileName = $fileRequest->getClientOriginalName();
        $filePath = 'files/' . $fileName;
 
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->file('files')));
 
        if ($isFileUploaded) {
            $file = new File();
            $file->name = $fileName;
            $file->path = $filePath;
            $file->code = $this->randString(10);
            $file->type = $fileRequest->getMimeType();
            $file->size = floor($fileRequest->getSize()/1024);
            
            $file->save();
            return $file;
        } else {
            return false;
        }
       
    }

    function randString( $length ) {
        $str =null;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }
        return $str;
    }
}

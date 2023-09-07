<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileService
{
    public function convertImage($image)
    {
        $uploadImage = Image::make($image);
        $width = $uploadImage->width();
        $height = $uploadImage->height();

        if ($width > $height && $width > 320) {
            $file = $uploadImage->resize(320,240);
        } elseif ($height > $width && $height > 320) {
            $file = $uploadImage->resize(240,320);
        }

        return $file ?? $image;
    }

    public function saveStorage($request, $comment)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $uploadFile = in_array($extension, ['jpg', 'png', 'jpeg'])
                ? $this->convertImage($file) : $file;
            $path = 'comments/' . $comment->id;
            $store = Storage::disk('public')->putFile($path,$uploadFile);
            $url = Storage::url($store);
        }

         return $url ?? '';
    }
}

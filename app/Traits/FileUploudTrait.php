<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploudTrait
{
    // handle file uploud
    function uploudFile(
        Request $request,
        string $inputName,
        ?string $oldPath = null,
        string $path = '/uplouds'
    ) {
        if ($request->hasFile($inputName)) {
            $file = $request->{$inputName};
            $ext = $file->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $ext;
            $file->move(public_path($path), $fileName);

            return $path . '/' . $fileName;
        }
    }
}

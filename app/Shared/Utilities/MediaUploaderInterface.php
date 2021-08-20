<?php

namespace App\Shared\Utilities;

use Illuminate\Http\UploadedFile;

interface MediaUploaderInterface
{
    /**
     * Tải lên một file
     *
     * @param UploadedFile $file file tải lên
     * @return string            đường dẫn tới file
     */
    public function uploadOne(UploadedFile $file) : string;

    /**
     * Tải lên một danh sách file
     *
     * @param array $files  mảng cấc file tải lên
     * @return array        mảng các đường đẫn tới file
     */
    public function uploadMany(array $files) : array;
}

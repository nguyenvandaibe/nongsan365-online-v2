<?php

namespace App\Shared\Utilities;

use App\Shared\Configurations\FileSystemConfig;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaUploader implements MediaUploaderInterface
{

    private $directory = FileSystemConfig::UPLOADED_MEDIA_DIR;

    /**
     * Tải lên một file
     *
     * @param UploadedFile $file file tải lên
     * @return string            đường dẫn tới file
     */
    public function uploadOne(UploadedFile $file): string
    {
        return Storage::put($this->directory, $file);
    }

    /**
     * Tải lên một danh sách file
     *
     * @param array $files  mảng cấc file tải lên
     * @return array        mảng các đường đẫn tới file
     */
    public function uploadMany(array $files): array
    {
        $paths = array();

        foreach ($files as $file) {
            $path = $this->uploadOne($file);
            array_push($paths, $path);
        }

        return $paths;
    }
}

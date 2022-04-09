<?php

namespace App\Classes;

class UploadFile {
    protected $filename;
    protected $maxFilesize = 2097152; // why this number?
    protected $extension;
    protected $path;

    /**
     * Get the file name
     * @return mixed
     */
    public function getName() {
        return $this->filename;
    }

    /**
     * Set the name of the file
     * @param $file
     * @param string $name 
     */
    protected function setName($file, $name = "") {
        if ($name === "") {
            $name = pathinfo($file, PATHINFO_FILENAME);
        }

        $name = strtolower(str_replace(['_', ' '], '-', $name));
        $hash = md5(microtime());
        $ext = $this->fileExtension($file);
        $this->filename = "{$name}-{$hash}.{$ext}";
    }

    /**
     * Set file extension
     * @param $file
     * @return mixed
     */
    protected function fileExtension($file) {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    /**
     * Validate file size
     * @param $file
     * @return bool
     */
    public static function fileSize($file) {
        $fileObj = new static;
        return $file > $fileObj->maxFilesize ? true : false;
    }

    /**
     * Validate file upload
     * @param $file
     * @return bool
     */
    public static function isImage($file) {
        $fileObj = new static;
        $ext = $fileObj->fileExtension($file);
        $validExt = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
        if (!in_array(strtolower($ext), $validExt)) {
            return false;
        }
        return true;
    }

    /**
     * Get the path where the file was uploaded to
     * @return mixed
     */
    public function path() {
        return $this->path;
    }

    /**
     * Move the file to intended location
     * @param $tempPath
     * @param $folder
     * @param $file
     * @param $newFilename
     * @return null/static
     */
    public static function move($tempPath, $folder, $file, $newFilename = '') {
        $fileObj = new static;
        $ds = DIRECTORY_SEPARATOR;

        $fileObj->setName($file, $newFilename);
        $fileName = $fileObj->getName();

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $fileObj->path = "{$folder}{$ds}{$fileName}";
        $absolutePath = BASE_PATH."{$ds}public{$ds}$fileObj->path";
        if (move_uploaded_file($tempPath, $absolutePath)) {
            return $fileObj;
        }
        return null;
    }
}
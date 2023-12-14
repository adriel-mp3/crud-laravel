<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait UserImageTrait
{
    private $isValidFile;

    public function __construct()
    {
        $this->isValidFile = false;
    }

    /**
     * Upload an image and return the generated image name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $fieldName
     * @param  string  $destinationPath
     * @return string|null
     */
    public function uploadImage($request, $fieldName, $destinationPath)
    {
        $this->isValidFile = $request->hasFile($fieldName) && $request->file($fieldName)->isValid();

        if ($this->isValidFile) {
            $image = $request->file($fieldName);
            $extension = '.' . $image->getClientOriginalExtension();
            $imageName = (string) Str::uuid() . $extension;
            $image->move($destinationPath, $imageName);
            return $imageName;
        }

        return null;
    }

    /**
     * Update an image and return the updated image name or the existing image path.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $fieldName
     * @param  string  $existingImagePath
     * @param  string|null  $defaultImagePath
     * @return string
     */
    public function updateImage($request, $fieldName, $existingImagePath, $defaultImagePath = null)
    {
        $this->isValidFile = $request->hasFile($fieldName) && $request->file($fieldName)->isValid();

        if ($this->isValidFile) {
            $this->deleteImage($existingImagePath, $defaultImagePath);
            return $this->uploadImage($request, $fieldName, public_path('/img'));
        }

        return $existingImagePath;
    }

    /**
     * Delete an image if it exists and is not the default image path.
     *
     * @param  string  $filePath
     * @param  string|null  $defaultImagePath
     * @return void
     */
    public function deleteImage($filePath, $defaultImagePath = null)
    {
        if ($this->imageExists($filePath, $defaultImagePath)) {
            File::delete($filePath);
        }
    }

    /**
     * Check if an image exists and is not the default image path.
     *
     * @param  string  $filePath
     * @param  string|null  $defaultImagePath
     * @return bool
     */
    public function imageExists($filePath, $defaultImagePath = null)
    {
        return File::exists($filePath) && $filePath !== $defaultImagePath;
    }
}

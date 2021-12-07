<?php
namespace App\Traits;

trait WithImageUploader
{
    public $photos = [];

    public $mediaIndex;

    public function saveMedia($model)
    {
        foreach ($this->photos as $photo) {
            $fileName = $photo->getClientOriginalName();
            $model
                ->addMedia($photo->getRealPath())
                ->usingName($fileName)
                ->sanitizingFileName(function ($fileName) {
                    return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                })
                ->toMediaCollection();
        }
        $this->photos = [];
    }

    public function confirmRemoveMedia($index)
    {
        $this->mediaIndex = $index;
    }

    protected function deleteSavedMedia($model)
    {
        $model->deleteMedia($this->mediaIndex);
        $model->refresh();
    }

    public function removeUploadedImage($index)
    {
        $this->resetValidation();
        array_splice($this->photos, $index, 1);
    }
}
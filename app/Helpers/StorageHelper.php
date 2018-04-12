<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class StorageHelper
{

    public $files = [];

    public function saveFile($data, $fieldName, $model, $column)
    {
        if (!is_array($data->file($fieldName))) {
            $this->file[] = $data->file($fieldName);
            $this->storeFile($model, $column, $this->file, $data->type_doc);
        } else {
            $this->storeFile($model, $column, $data->file($fieldName), $data->type_doc);
        }

    }

    public function getFile($name)
    {
        if ($file = Storage::disk('local')->exists($name)) {
            $fileName = DB::table('fileentrys')->where('filename', $name)->first();
            return $file = Storage::download($name, $fileName->original_filename);
        } else {
            return array("message" => "File not found!");
        }

    }


    /**
     * @param $model
     * @param $column
     * @param $file
     * @param $entry
     */
    private function storeFile($model, $column, $files, $typeDoc = null)
    {
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
            $entry['mime'] = $file->getClientMimeType();
            $entry['original_filename'] = $file->getClientOriginalName();
            $entry['filename'] = $file->getFilename() . '.' . $extension;
            $entry['extension'] = $extension;
            $entry[$column] = $model->id;
            $entry['type_doc_id'] = $typeDoc;
            $model->fileentry()->create($entry);
        }
    }


    public function delete($file = null, $id = null)
    {
        if (!empty($file)) {
            $file = \App\Models\Fileentry::where('filename', '=', $file)->first();
        } elseif (!empty($file)) {
            $file = \App\Models\Fileentry::find($id);
        } else {
            return response()->json(['message' => 'Could not remove document']);
        }


        $file->delete();
    }

}
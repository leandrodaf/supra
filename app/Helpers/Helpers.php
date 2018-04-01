<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Helpers
{

    //Função formata os números decimais para o formato Double

    public function formataValoresMonetarios($value)
    {
        if ($value != null) {
            $stringSubstituted = str_replace("R$", "", $value);
            $stringSubstituted = str_replace(" ", "", $stringSubstituted);
            $stringSubstituted = str_replace(".", "", $stringSubstituted);
            $stringSubstituted = str_replace(",", ".", $stringSubstituted);

            return $stringSubstituted;
        } else {
            return null;
        }
    }


    //Formata a data do padrão BR para o padrão americano
    public function formataDataPtBr($date)
    {
        $arrayDate = [];

        if ($date != null) {

            if (strpos($date, '-') !== false) {
                $arrayDate = explode('-', $date);
            }

            if (strpos($date, '/') !== false) {
                $arrayDate = explode('/', $date);
            }

            return $arrayDate[2] . '-' . $arrayDate[1] . '-' . $arrayDate[0];
        } else {
            return null;
        }

    }


    public static function returnSateCity($number)
    {
        $states = array('AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO');
        return $states[$number];
    }


//    Facilitar as regras de validação
    public static function canRole(Array $roles, Array $comparation = null)
    {

        if ($comparation != null) {
            foreach ($roles as $role) {
                if (in_array($role, $comparation)) {
                    return true;
                }
            }
        } else {
            $userAuthRoles = Auth::user()->getRoleNames()->toArray();

            foreach ($roles as $role) {
                if (in_array($role, $userAuthRoles)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function saveFile($data, $fieldName, $model)
    {
        foreach ($data->file($fieldName) as $file) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
            $entry['mime'] = $file->getClientMimeType();
            $entry['original_filename'] = $file->getClientOriginalName();
            $entry['filename'] = $file->getFilename() . '.' . $extension;
            $entry['extension'] = $extension;
            $entry['activitie_id'] = $model->id;
            $model->fileentry()->create($entry);
        }
    }

    public function getFile($name)
    {

        if ($file = Storage::disk('local')->exists($name)) {
            return $file = Storage::download($name);
        } else {
            return array("message" => "File not found!");
        }

    }


}
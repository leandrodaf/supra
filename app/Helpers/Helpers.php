<?php


namespace App\Helpers;


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
        if ($date != null) {
            $arrayDate = explode('/', $date);
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


}
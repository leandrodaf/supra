<?php

namespace Tests\Unit;

use App\Helpers\Helpers;
use Tests\TestCase;

class HelpersTest extends TestCase
{

    public function testFormataDataBrParaPadraoAmericano()
    {
        $helper = new Helpers();
        $this->assertEquals($helper->formataDataPtBr('11/04/1995'), '1995-04-11');
    }

    public function testValidaSeItemExiteDentroDoArray()
    {
        $this->assertTrue(Helpers::canRole(['Teste de String', 'teste2', 'Teste'], ['Teste de String']));
    }

    public function testValidaArrayDeEstados()
    {
        $this->assertEquals(Helpers::returnSateCity(6), 'DF');
    }

    public function testFormatacaoValorMonetarioBr()
    {
        $helper = new Helpers();
        $this->assertEquals($helper->formataValoresMonetarios('R$ 1.900.978,68'), '1900978.68');
    }


}

<?php
use PHPUnit\Framework\TestCase;

include("/Users/orbitive/www/back-end-challenge/autoload.php");

class ConversaoTest extends TestCase {

    private $conversao;
    private $moeda;

    public function testConverter() {
        
        ////////////////////
        // De Real para Dólar
        $this->moeda        = new Moeda("BRL", "USD");
        $this->conversao    = new Conversao("BRL", "USD", 2071.90, 5.75);

        $array = [
            "resultado" => $this->moeda->formatarNumero(2071.90 / 5.75),
            "simbolo" => "U$"
        ];
        
        //var_dump($this->conversao->json());

        $this->assertJsonStringEqualsJsonString(
                $this->conversao->converter(), json_encode($array)
        );

        unset($this->conversao);
        unset($this->moeda);
        unset($valor);
        unset($array);
        
        ////////////////////
        // De Dólar para Real
        $this->moeda        = new Moeda("USD","BRL");
        $this->conversao    = new Conversao("USD","BRL", 2071.90, 5.56);

        $array = [
            "resultado" => $this->moeda->formatarNumero(2071.90 * 5.56),
            "simbolo" => "R$"
        ];
        
        //var_dump($this->conversao->json());

        $this->assertJsonStringEqualsJsonString(
                $this->conversao->converter(),
                json_encode($array)
        );

        unset($this->conversao);
        unset($this->moeda);
        unset($valor);
        unset($array);
        
        ////////////////////
        // De Real para Euro
        $this->moeda        = new Moeda("BRL","EUR");
        $this->conversao    = new Conversao("BRL","EUR", 2071.90, 6.68);

        $array = [
            "resultado" => $this->moeda->formatarNumero(2071.90 / 6.68),
            "simbolo" => "€"
        ];
        
        //var_dump($this->conversao->json());

        $this->assertJsonStringEqualsJsonString(
                $this->conversao->converter(),
                json_encode($array)
        );

        unset($this->conversao);
        unset($this->moeda);
        unset($valor);
        unset($array);

        // De Euro para Real
        $this->moeda        = new Moeda("EUR","BRL");
        $this->conversao    = new Conversao("EUR","BRL", 2071.90, 6.68);

        $array = [
            "resultado" => $this->moeda->formatarNumero(2071.90 * 6.68),
            "simbolo" => "R$"
        ];
        
        //var_dump($this->conversao->json());

        $this->assertJsonStringEqualsJsonString(
                $this->conversao->converter(),
                json_encode($array)
        );

        unset($this->conversao);
        unset($this->moeda);
        unset($valor);
        unset($array);

    }
    
}
?>

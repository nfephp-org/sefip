<?php

namespace NFePHP\Sefip;

use NFePHP\Common\Strings;
use \DateTime;

class Sefip
{
    /**
     * @var array 
     */
    protected $collect;


    public function __construct()
    {
        $this->collect = [];
    }
    
    public function register00(\stdClass $std)
    {
        $parameters = [
            "tpremessa" => ['integer', 1, true, '1|3'],
            "tpinscricao" => ['integer', 1, true, '1|2|3'],
            "nrinscricao" =>  ['integer', 14, true, ''],
            "razaosocial" => ['string', 30, true, '([A-Z0-9])\1{2}'],
            "contato" => ['alpha', 20, true, '([A-Z])\1{2}'],
            "endereco" => ['string', 50, true, '([A-Z0-9])\1{2}'],
            "bairro" => ['string', 20, true, '([A-Z0-9])\1{2}'],
            "cep" => ['integer', 8, true, ''],
            "cidade" => ['string', 20, true, '([A-Z0-9])\1{2}'], 
            "uf" => ['alpha', 2, true, ''],
            "telefone" => ['integer', 12, true, ''],
            "email" => ['string', 60, false, ''],
            "competencia" => ['integer', 6, true, ''],
            "codrecfgts" => ['integer', 3, true, ''],
            "indrecfgts" => ['integer', 1, false, ''],
            "modalidade" => ['mix', 1, false, ''],
            "datarecfgts" => ['date', 8, true, ''],
            "indrecprev" => ['integer', 1, true, ''],
            "datarecprev" => ['date', 8, false, ''],
            "indicerecatrasoprev" => ['mix', 7, false, ''],
            "tipoinscfornecedorfolha" => ['integer', 1, true, ''],
            "inscfornecfolha" => ['integer', 14, true, ''],
        ];
        
        $header = '00' . str_repeat(' ', 51);
        $footer = str_repeat(' ', 18) . '*';
        $field = $this->build("Registro 00", $header, $parameters, $std);
        $this->collect[] = $field.$footer;
        return $field.$footer;
    }
    
    public function register10(\stdClass $std)
    {
        $parameters = [
            "tpinscricao" => ['integer', 1, true, '1|2'],
            "nrinscricao" =>  ['integer', 14, true, ''],
            "zeros" => ['integer', 36, false, ''],
            "razaosocial" => ['string', 40, true, ''],
            "endereco" => ['string', 50, true, ''],
            "bairro" => ['string', 20, true, ''],
            "cep" => ['integer', 8, true, ''],
            "cidade" => ['string', 20, true, ''],
            "uf" => ['alpha', 2, true, ''],
            "telefone" => ['integer', 12, true, ''],
            "indaltendereco" => ['alpha', 1, true, 'S|N'],
            "cnae" => ['integer', 7, true, ''],
            "indaltcnae" => ['alpha', 1, true, 'S|N'],
            "aliqrat" => ['mixfloat', 2, true, ''],
            "codcentraliz" => ['integer', 1, true, '0|1|2'],
            "simples" => ['mix', 1, true, '1|2|3|4|5|6| '],
            "fpas" => ['integer', 3, true, ''],
            "codoutrasent" => ['mix', 4, true, ''],
            "codpaggps" => ['mix', 4, false, ''],
            "percisenfilantropia" => ['mixfloat', 5, false, ''],
            "salariofamilia" => ['float', 15, false, ''],
            "salariomaternidade" => ['float', 15, false, ''],
            "contescemp" => ['integer', 15, false, ''],
            "indval" => ['integer', 1, false, ''],
            "valdevprev" => ['integer', 14, false, ''],
            "banco" => ['mix', 3, false, ''],
            "agencia" => ['mix', 4, false, ''],
            "cc" => ['string', 9, false, '']
        ];
        $header = '10';
        $footer = str_repeat('0', 45) . str_repeat(' ', 4) . '*';
        $field = $this->build("Registro 10", $header, $parameters, $std);
        $this->collect[] = $field.$footer;
        return $field.$footer;
    }
    
    public function register12(\stdClass $std)
    {
        $header = '12';
        $this->collect[] = $field;
    }
    
    public function register13(\stdClass $std)
    {
        $header = '13';
        $this->collect[] = $field;
    }
    
    public function register14(\stdClass $std)
    {
        $header = '14';
        $this->collect[] = $field;
    }
    
    public function register20(\stdClass $std)
    {
        $header = '20';
        $this->collect[] = $field;
    }
    
    public function register21(\stdClass $std)
    {
        $header = '21';
        $this->collect[] = $field;
    }
    
    public function register30(\stdClass $std)
    {
        $parameters = [
            "tpinscricao" => ['integer', 1, true, '1|2'],
            "nrinscricao" =>  ['integer', 14, true, ''],
            "tpinsctomadorobracivil" => ['mix', 1, false, ''],
            "nrinsctomadorobracivil" =>  ['mix', 14, false, ''],
            "pis" => ['integer', 11, true, ''],
            "dtadmis" => ['date', 8, true, ''],
            "categtrab" => ['integer', 2, true, ''],
            "nome" => ['alpha', 70, true, ''],
            "matricula" => ['mix', 11, false, ''],
            "ctps" => ['mix', 7, false, ''],
            "seriectps" => ['mix', 5, false, ''],
            "dtopcao" => ['date', 8, false, ''],
            "dtnasc" => ['date', 8, true, ''],
            "cbo" => ['string', 5, true, ''],
            "vlremun" => ['float', 15, true, ''],
            "vlremun13" => ['float', 15, true, ''],
            "clascontrib" => ['mix', 2, true, ''],
            "ocorr" => ['mix', 2, true, ''],
            "vldescseg" => ['float', 15, true, ''],
            "vlremumbc" => ['float', 15, true, ''],
            "vlbc13" => ['float', 15, true, ''],
            "vlbcgps13" => ['float', 15, true, '']
        ];
        $header = '30';
        $footer = str_repeat(' ', 98) . '*';
        $field = $this->build("Registro 30", $header, $parameters, $std);
        $this->collect[] = $field.$footer;
        return $field.$footer;
    }
    
    public function register32(\stdClass $std)
    {
        $header = '32';
        $this->collect[] = $field;
    }
    
    public function register50(\stdClass $std)
    {
        $header = '50';
        $this->collect[] = $field;
    }
    
    public function register51(\stdClass $std)
    {
        $header = '51';
        $this->collect[] = $field;
    }
    
    public function render()
    {
        $this->register90();
        return implode("\n", $this->collect);
    }
    
    protected function register90()
    {
        $field = '90' . str_repeat('9', 51) . str_repeat(' ', 306) . '*';
        $this->collect[] = $field;
    }
    
    private function standardize($parameters, \stdClass $std)
    {
        $newstd = new \stdClass();
        foreach ($parameters as $key => $param) {
            if (!isset($std->$key)) {
                $std->$key = '';
            }
            $newstd->$key = $std->$key;
        }
        return $newstd;
    }
    
    private function build($origin, $string, $patterns, \stdClass $std) {
        $std = $this->standardize($patterns, $std);
        foreach($patterns as $key => $pattern) {
            if (!$this->validate($pattern, $std->$key)) {
                throw new \Exception("{$origin} => A variável {$key} com o valor"
                    . " = {$std->$key}, não atende ao regex {$pattern[3]}.");
            }
            $string .= $this->format($pattern[0],$pattern[1],$std->$key);
        }
        return $string;
    }
    
    private function validate($pattern, $value)
    {
        $type = $pattern[0];
        $required = $pattern[2];
        $regex = $pattern[3];
        
        if (empty($value) && !$required) {
            return true;
        }
        switch ($type) {
            case 'string':
                $regex = '([A-Z0-9])\1{2}';
                $match = false;
                break;
            case 'alpha':
                $regex = '([A-Z])\1{2}';
                $match = false;
                break;
            default:
                $match = true;
        }
        if (empty($regex)) {
            return true;
        }
        if ($match) {
            return preg_match("/{$regex}/", $value); 
        }
        return !preg_match("/{$regex}/", $value); 
    }
    
    private function format($type, $length, $value)
    {
        if ($type == 'integer') {
            $value = !empty($value) ? $value : '0';
            //somente numeros
            $value = Strings::onlyNumbers($value);
            return str_pad($value, $length, '0', STR_PAD_LEFT);
        } elseif ($type == 'string') {
            //sem espacos ante ou depois
            $value = trim($value);
            //sem acentos simbolos ou espaços duplos
            $value = Strings::toASCII($value);
            //apenas maiusculas
            $value = strtoupper($value);
            //apenas letras de A a Z e numeros
            $value = preg_replace("/[^A-Z0-9 @.-]/", "", $value);
            //cortar se maior
            $value = substr($value, 0, $length);
            return str_pad($value, $length, ' ', STR_PAD_RIGHT);
        } elseif ($type == 'alpha') {
            //sem espacos ante ou depois
            $value = trim($value);
            //sem acentos simbolos ou espaços duplos
            $value = Strings::toASCII($value);
            //apenas maiusculas
            $value = strtoupper($value);
            //apenas letras de A a Z
            $value = preg_replace("/[^A-Z ]/", "", $value);
            //cortar se maior
            $value = substr($value, 0, $length);
            return str_pad($value, $length, ' ', STR_PAD_RIGHT);
        } elseif ($type == 'mix') {
            if (is_numeric($value)) {
                return str_pad($value, $length, 0, STR_PAD_LEFT);
            }
            return str_repeat(' ', $length);
        } elseif ($type == 'mixfloat') {
            if (is_numeric($value)) {
                return substr(str_pad(ceil($value * 100), $length, '0', STR_PAD_LEFT), 0, $length);
            }
            return str_repeat(' ', $length);
        } elseif ($type == 'float') {
            return str_pad(ceil($value * 100), $length, '0', STR_PAD_LEFT);
        } elseif ($type == 'date') {
            if (empty($value)) {
                return str_repeat(' ', 8);
            }
            return (new Datetime($value))->format('dmY');
        }
    }
}

<?php

function validate($str) {

    if ($str !== null) {


            if (strlen($str) >= 11 || strlen($str) <= 14){

                $str=str_replace('.','',$str);
                $str=str_replace('.','',$str);
                $str=str_replace('-','',$str);
                $str=str_replace(' ','',$str);

                if (count(array_count_values(str_split($str)))>1) {

                    try {
                        $d1 = 0;
                        $d2 = 0;
                        $dg1 = 0;
                        $dg2 = 0;
                        $rest = 0;
                        $digito = 0;
                        $nDigResult = 0;

                        for ($nCount = 1; $nCount <= strlen($str) -1; $nCount++) {
                            // if (isNaN((int) ($str.sub$string(nCount -1, nCount)))) {
                            // 	return false;
                            // } else {

                            $digito = (int)substr($str, $nCount - 1, $nCount);
                            $d1 = $d1 + (11 - $nCount) * $digito;

                            $d2 = $d2 + (12 - $nCount) * $digito;
                            // }
                        }

                        $rest = ($d1 % 11);

                        $dg1 = ($rest < 2) ? $dg1 = 0 : 11 - $rest;
                        $d2 += 2 * $dg1;
                        $rest = ($d2 % 11);
                        $nDigVerific = '';
                        if ($rest < 2) {
                            $dg2 = 0;
                        } else {
                            $dg2 = 11 - $rest;

                            $nDigVerific = substr($str, strlen($str) - 2, strlen($str));
                            $nDigResult = (string) $dg1 + (string) $dg2;

                        }

                        return $nDigVerific == $nDigResult;

                    }catch (Exception $e){
                        die("Erro " . $e->getMessage());
                    }

                } else {
                        return false;
                    }

            }else return false;


    } else {
        return false;
    }

}

print(validate("111.111.111-11") ? "Válido" : "CPF Inválido" . PHP_EOL);
print(validate("123.456.789-99") ? "Válido" : "CPF Inválido"  . PHP_EOL);
print(validate("935.411.347-80") ? "Válido" : "CPF Inválido"   . PHP_EOL);
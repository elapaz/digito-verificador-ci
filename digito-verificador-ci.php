#!/usr/bin/php
<?php
function calculo_digito($cedula){
	 $num="2987634";
	 $acumulo = 0;
	 $error = "";
         $sinpunto=str_replace(".","",$cedula);
         $singuion=str_replace("-","",$sinpunto);
         $sindigito=substr($singuion,0,7);
         $sindigito=str_replace(" ","",$sindigito);
         if(strlen($sindigito)<6){
         	return "el numero de cédula no tiene un formato válido";
       	 }
         $digito=strrev($cedula);
         $digito=substr($digito,0,1);
         for($x=0;$x<7;$x++){
         		$n=substr($sindigito,$x,1);
         		$y=substr($num,$x,1);
                $resultado=$n*$y;
                $resultado=10-substr(strrev($resultado),0,1);
                $acumulo=$acumulo+$resultado;
         }
         $xdigito=substr(strrev($acumulo),0,1);
         return $xdigito;
}
if (isset($argv[1])) {
	$cedula = $argv[1];
	$digito_verificador=calculo_digito($cedula);
	if (is_numeric($digito_verificador) ) {
	     print $cedula.$digito_verificador;
	} else if ((!isset($argv[2]))) {
	     print $digito_verificador;
	}
	if (!isset($argv[2])) {
		print "\n";
	}
} else {
	//Imprimo ayuda
	print "Uso:\n";
	print "    digito-verificador-ci cedula [q]\n";
	print "q = Modo silencioso (para ser usado desde un script)\n";
	print "ejemplo: \n";
	print "         digito-verificador-ci 1234567\n";
}
?>

#!/bin/bash
if [ -z "$1" ]; then
   echo "Usage: digito-verificador-ci 1234567"
   exit
fi
cedula=$1
num="2987634"
acumulo=0
error=""
sinpunto=`echo -n $cedula | sed 's/\.//g'`
singuion=`echo -n $sinpunto | sed 's/,//g'`
sindigito=`echo -n $singuion | cut -c-7 | sed 's/ //g'`
if [ ${#sindigito} -lt 6 ]; then
  echo "el numero de cédula no tiene un formato válido" 
  exit
fi
digito=`echo -n $sindigito | rev`
digito=`echo -n $digito | cut -c1`
for ((i=1; i<=7; i++)); do
  n=`echo -n $sindigito | cut -c$i`
  y=`echo -n $num | cut -c$i`
  resultado=$((n*y))
  modulo=`echo -n $resultado | rev | cut -c1`
  resultado=$((10-modulo))
  acumulo=$((acumulo+resultado))
done
xdigito=`echo -n $acumulo | rev | cut -c1`
echo ${cedula}${xdigito}

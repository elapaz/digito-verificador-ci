import sys

def calculo_digito(cedula):
	num="2987634"
	acumulo = 0
	error = ""
	sinpunto=cedula.replace(".","")
	singuion=sinpunto.replace("-","")
	sindigito=singuion[0:7]
	sindigito=sindigito.replace(" ","")
	if(len(sindigito)<6):
		return "el numero de cedula no tiene un formato valido"       	 
	digito=cedula[::-1]
	digito=digito[0]
	for x in range(0,7):
 		n=sindigito[x]
         	y=num[x]
		resultado=int(n)*int(y)
		resultado=10-int(str(resultado)[::-1][0])
		acumulo=acumulo+resultado      
	xdigito=str(acumulo)[::-1][0]
	return xdigito
try :
	cedula = sys.argv[1]
	digito_verificador=calculo_digito(cedula)
	if (unicode(digito_verificador, 'utf-8').isnumeric()) :
		print cedula+digito_verificador
	else:
		print digito_verificador	
except NameError :
	print "  Uso:\n"
	print "         digito-verificador-ci numcedula\n\n"
	print "  ejemplo: \n"
	print "         digito-verificador-ci 1234567\n"


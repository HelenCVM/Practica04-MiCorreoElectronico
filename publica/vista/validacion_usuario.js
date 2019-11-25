function validarCamposObligatorios()
{
    var bandera = true
    
    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value == '' && elemento.type == 'text'){
            if(elemento.id == 'cedula'){
                document.getElementById('mensajecedula').innerHTML = '<br><h2>La cedula esta vacia</h2>'
            }
            if(elemento.id == 'name'){
                document.getElementById('menname').innerHTML = '<br><h2>El campo nombre esta vacio</h2'
            }
            if(elemento.id == 'apellidos'){
                document.getElementById('menape').innerHTML = '<br><h2>El campo apellidos esta vacio</h2>'
            }
            if(elemento.id == 'fecha'){
                document.getElementById('f').innerHTML = '<br><h2>El campo fecha esta vacio</h2>'
            }
            if(elemento.id == 'dire'){
                document.getElementById('mendire').innerHTML = '<br><h2>El campo direccion esta vacio</h2>'
            }
            if(elemento.id == 'telefono'){
                document.getElementById('mentele').innerHTML = '<br><h2>El campo telefono esta vacio</h2>'
            }
            if(elemento.id == 'mail'){
                document.getElementById('menmail').innerHTML = '<br><h2>El campo e-mail esta vacio</h2>'
            }
            if(elemento.id == 'contra'){
                document.getElementById('mensajecontra').innerHTML = '<br><h2>El campo contraseña esta vacio</h2>'
            }
            elemento.style.border = '1px red solid'
            elemento.className = 'error'            
            bandera = false
        }
    }
    
    if(!bandera){
        alert('Error: revisar los campos')
    }

    return bandera

}

function validarLetras(elemento)
{    
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii)
        
        if(miAscii >= 65 && miAscii <= 122){
            return true
        }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            return false
            
        }
    }else{
        return true
    }
    
}

function validarCedula(cedul){
    var x=document.getElementById('cedula').value;
    var total=0;
    var longitud=x.length;
    var longcheck =longitud-1;
    if (longitud ==10){
        for(i=0;i<longcheck;i++){
            if(i % 2 ===0){
                var aux=x.charAt(i) *2;
                if (aux >=10) aux-=9;
                total +=aux;

            }else {
                total +=parseInt(x.charAt(i))
            }
        }
        total =total %10 != 0 ? 10 - total % 10 : 0;

        if(x.charAt(longitud -1 ) == total){
            return false;
        } else {
            document.getElementById('cedumen').innerHTML='<br>Esta</br>'
            alert('su cedula esta mal')
            return true;
        }
    }else {
        return false;
    }
}

function validarNumeroo(e, fono){
    var key = window.event ? e.keyCode : e.which;
    if(((48 <= key && key <= 57) || (key == 0) || (key == 8)) && fono.value.length < 10){ 
        return true; 
    }else{ 
        return false; 
    } 
};


function validarNum(elemento)
{    
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii)
        
        if(miAscii >= 48 && miAscii <= 57){
            return true
        }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
           
            return false
            
        }
    }else{
        return true
    }
    
}




function dosPalabras(string) {
    var out = '';
    var array = string.split(' ');
    if (array.length == 1){
        out += array[0];
    } else {
        out += array[0] + ' ' + array[1];
    }
    
    return out;
}

function validarCorreo(mail) {
        var arroba = mail.value.indexOf("@");
        if( arroba ==-1 ){
            document.getElementById("menmaill").innerHTML= 'correo inválido sin @'
        }else{
            var dominio = mail.value.substring(arroba, mail.value.length)
            var idMail = mail.value.substring(0, arroba)
            if((dominio != "@ups.edu.ec" && dominio != "@est.ups.edu.ec")){    
                document.getElementById("menmaill").innerHTML= 'El dominio debe de ser: @est.ups.edu.ec - @ups.edu.ec'
            }else if(idMail.length < 3){
                document.getElementById("menmaill").innerHTML= 'Nombre de usuario menor a 3 caractéres.'
            }else{
                document.getElementById("menmaill").innerHTML= ''
            }
        }
    
}


function validarAlfa(elemento){
    if(elemento.value.length > 0){
        var miAsc = document.getElementById(elemento).value.split('@')
        var miAscii = miAsc.value.charCodeAt(miAsc.value.length-1)
        
        console.log(miAsc)
        
        if(miAscii >= 0 && miAscii <= 122 ){
            for(var i=0;i<miAsc.length;i++)
               if (miAsc.value.charCodeAt(i)>=3)
            return true
        }else {
            elemento.value = elemento.value.substring(0, elemento.value.length-1)
            document.getElementById('e').classList.add('p');
            return false

            
        }
    }else{
        return true
    }
    
}

function validarcontra(string){
    var out = '';
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ@.-_*';
    var ff='.@*'
        for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1 && string[i].value ==string.toUpperCase() && string[i].value==string.toLowerCase() && string[i].value ==ff) 
        out += string.charAt(i);
        
    return out
    
   
} 

function validartacon(contra) {
    var array=contra.value;
   if(array.length <8)
   {
    document.getElementById("correomen").innerHTML='<br>Debe tener 8 </br>'
        alert('contraseña menor a 8')
   }else if (array.length >8) {
    document.getElementById("correomen").innerHTML='<br>bien</br>'
   }
}

function validartatele(tele){
    var array =tele.value;
    if(array.length <10)
    {
      document.getElementById('telemen').innerHTML='<br>Debe tener 10 caracteres </br>'
      alert('Telefono menor a 10 caracteres')
    }else if (array.length ==10)
    {
        document.getElementById("telemen").innerHTML='<br>bien</br>'
    }
     if(array.length >10)
     {
        document.getElementById('telemen').innerHTML='<br>Debe tener 10 caracteres </br>'
        alert('Telefono mayor a 10 caracteres')
     }

}

function validartacedu(cedu){
    var array =cedu.value;
    if(array.length <10)
    {
      document.getElementById('cedumen').innerHTML='<br>Debe tener 10 caracteres </br>'
      alert('Cedula menor a 10 caracteres')
    }else if (array.length ==10)
    {
        document.getElementById("cedumen").innerHTML='<br> </br>'
    }
     if(array.length >10)
     {
        document.getElementById('cedumen').innerHTML='<br>Debe tener 10 caracteres </br>'
        alert('Cedula mayor a 10 caracteres')
     }

}


function validarFecha(fecha) {
    var array = fecha.value.split('/');
    var fecha = new Date(+array[2], array[1]-1, array[0]);
    if (array.length == 3 && fecha 
        && array[0] == fecha.getDate() 
        && array[1]+1 == fecha.getMonth() 
        && array[2] == fecha.getFullYear()) {
        document.getElementById('fec').innerHTML=''
    } else {
        document.getElementById('fec').innerHTML='mal'
        alert('Fecha mal ingresada, usar formato dd/mm/yyyy');
        return true;
    }
}

function validar_clave(contrasenna)
{
    var x=document.getElementById('contra').value
    if(x.length >= 8)
    {		
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var caracter_raro = false;
        
        for(var i = 0;i<x.length;i++)
        {
            if(x.charCodeAt(i) >= 65 && x.charCodeAt(i) <= 90)
            {
                mayuscula = true;
            }
            else if(x.charCodeAt(i) >= 97 && x.charCodeAt(i) <= 122)
            {
                minuscula = true;
            }
            else if(x.charCodeAt(i) >= 48 && x.charCodeAt(i) <= 57)
            {
                numero = true;
            }
            else
            {
                caracter_raro = true;
            }
        }
        if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true)
        {
            return true;
        }else {
            alert('contraseña mal')
            document.getElementById('correomen').innerHTML='contraseña mal'

        }
    }
   
    return false;
   
}
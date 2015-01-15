function MD5_Pass()
{
document.getElementById("Password_Usuario").value = (hex_md5(document.getElementById("Password_Usuario").value));
}

function Registro_Password()
{
var PassOne=document.getElementById("Password_Usuario").value;
var PassTwo=document.getElementById("Password2_Usuario").value;
	if ( PassOne == PassTwo)
	{
		MD5_Pass();
		return true
	}
	else
	{
		alert("|ERROR| Los PASSWORDS deben ser iguales");
		return false;
	}
}



function Validar_NuevoPass()
{
	var PassOne=document.getElementById("Pass_Nuevo").value;
	var PassTwo=document.getElementById("Pass_Nuevo_Conf").value;
	if ( PassOne == PassTwo)
	{
		MD5_Pass();
		document.getElementById("Pass_Nuevo").value = (hex_md5(document.getElementById("Pass_Nuevo").value));
		document.getElementById("Pass_Nuevo_Conf").value = (hex_md5(document.getElementById("Pass_Nuevo_Conf").value));
		return true
	}
	else
	{
		alert("|ERROR| Los PASSWORDS deben ser iguales");
		return false;
	}
}

function Fecha_Sistema()
{
var f = new Date();
document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
}

function Salir_Usuario()
{
		if(confirm("¿Quieres cerrar sesion?")) {
			//return true;
			close();
		}		
		return false;
}

function Eliminar_Elemento()
{
    if(confirm("¿Seguro que quieres eliminar?")) {
      return true;
    }   
    return false;
}

function Validar_Entero(Numero)
{
if (Numero % 1 == 0) {
		return true;
    }
    else
		alert ("|ERROR| Valor: " + "'" + Numero +"'" + " debe ser entero");
		return false;
}

function Validar_CodigoPostal()
{
	var codigoPostal = document.getElementById("Campo_CodigoPostal").value;
	if (isNaN(codigoPostal) == true){
        alert ("|ERROR| Valor: " + "'" + codigoPostal +"'" + " debe ser numerico");
		return false;
    }
	else
	{
		if (Validar_Entero(codigoPostal)){
			if(codigoPostal.length == 0 | codigoPostal.length == 5)
			{
				if(confirm("¿Modificar datos?")) {
					MD5_Pass();
					return true;
				}		
				else
				{
				return false;
				}
			
			}
			else 
			{
				alert("|ERROR| El formato del codigo postal no es correcto");
				return false;
			}
				return false;
		}
	}
}

function Confirmar_EliminacionProyecto()
{
	if(confirm("¿Eliminar Proyecto?"))
	{
		alert("Proyecto Eliminado");
		return true;
	}		
	else
	{
		return false;
	}
}

function Confirmar_EliminacionTarea()
{
	if(confirm("¿Eliminar Tarea?"))
	{
		alert("Tarea Eliminado");
		return true;
	}		
	else
	{
		return false;
	}
}

function Validar_EstadoTarea()
{
	var estadoTarea=document.getElementById("Estado_Tarea").value;
	if( estadoTarea == "Finalizada" )
	{
		alert("|ERROR| Tarea finalizada");
		return false;
	}
	else
	{
		return true;
	}
}

function Confirmar_Modificacion()
{
	if(confirm("¿Modificar datos?"))
	{
		alert("Datos modificados");
		return true;
	}		
	else
	{
		return false;
	}
}

function Confirmar_BajaUsuario()
{
	if(confirm("¿Deseas darte de baja?"))
	{
		alert("Muchas gracias");
		return true;
	}		
	else
	{
		return false;
	}
}

//----------------------------------- MD5 Para cifrar pass --------------------

/*
 * A JavaScript implementation of the RSA Data Security, Inc. MD5 Message
 * Digest Algorithm, as defined in RFC 1321.
 * Version 2.2 Copyright (C) Paul Johnston 1999 - 2009
 * Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
 * Distributed under the BSD License
 * See http://pajhome.org.uk/crypt/md5 for more info.
 */

/*
 * Configurable variables. You may need to tweak these to be compatible with
 * the server-side, but the defaults work in most cases.
 */
var hexcase = 0;   /* hex output format. 0 - lowercase; 1 - uppercase        */
var b64pad  = "";  /* base-64 pad character. "=" for strict RFC compliance   */

/*
 * These are the functions you'll usually want to call
 * They take string arguments and return either hex or base-64 encoded strings
 */
function hex_md5(s)    { return rstr2hex(rstr_md5(str2rstr_utf8(s))); }
function b64_md5(s)    { return rstr2b64(rstr_md5(str2rstr_utf8(s))); }
function any_md5(s, e) { return rstr2any(rstr_md5(str2rstr_utf8(s)), e); }
function hex_hmac_md5(k, d)
  { return rstr2hex(rstr_hmac_md5(str2rstr_utf8(k), str2rstr_utf8(d))); }
function b64_hmac_md5(k, d)
  { return rstr2b64(rstr_hmac_md5(str2rstr_utf8(k), str2rstr_utf8(d))); }
function any_hmac_md5(k, d, e)
  { return rstr2any(rstr_hmac_md5(str2rstr_utf8(k), str2rstr_utf8(d)), e); }

/*
 * Perform a simple self-test to see if the VM is working
 */
function md5_vm_test()
{
  return hex_md5("abc").toLowerCase() == "900150983cd24fb0d6963f7d28e17f72";
}

/*
 * Calculate the MD5 of a raw string
 */
function rstr_md5(s)
{
  return binl2rstr(binl_md5(rstr2binl(s), s.length * 8));
}

/*
 * Calculate the HMAC-MD5, of a key and some data (raw strings)
 */
function rstr_hmac_md5(key, data)
{
  var bkey = rstr2binl(key);
  if(bkey.length > 16) bkey = binl_md5(bkey, key.length * 8);

  var ipad = Array(16), opad = Array(16);
  for(var i = 0; i < 16; i++)
  {
    ipad[i] = bkey[i] ^ 0x36363636;
    opad[i] = bkey[i] ^ 0x5C5C5C5C;
  }

  var hash = binl_md5(ipad.concat(rstr2binl(data)), 512 + data.length * 8);
  return binl2rstr(binl_md5(opad.concat(hash), 512 + 128));
}

/*
 * Convert a raw string to a hex string
 */
function rstr2hex(input)
{
  try { hexcase } catch(e) { hexcase=0; }
  var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
  var output = "";
  var x;
  for(var i = 0; i < input.length; i++)
  {
    x = input.charCodeAt(i);
    output += hex_tab.charAt((x >>> 4) & 0x0F)
           +  hex_tab.charAt( x        & 0x0F);
  }
  return output;
}

/*
 * Convert a raw string to a base-64 string
 */
function rstr2b64(input)
{
  try { b64pad } catch(e) { b64pad=''; }
  var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  var output = "";
  var len = input.length;
  for(var i = 0; i < len; i += 3)
  {
    var triplet = (input.charCodeAt(i) << 16)
                | (i + 1 < len ? input.charCodeAt(i+1) << 8 : 0)
                | (i + 2 < len ? input.charCodeAt(i+2)      : 0);
    for(var j = 0; j < 4; j++)
    {
      if(i * 8 + j * 6 > input.length * 8) output += b64pad;
      else output += tab.charAt((triplet >>> 6*(3-j)) & 0x3F);
    }
  }
  return output;
}

/*
 * Convert a raw string to an arbitrary string encoding
 */
function rstr2any(input, encoding)
{
  var divisor = encoding.length;
  var i, j, q, x, quotient;

  /* Convert to an array of 16-bit big-endian values, forming the dividend */
  var dividend = Array(Math.ceil(input.length / 2));
  for(i = 0; i < dividend.length; i++)
  {
    dividend[i] = (input.charCodeAt(i * 2) << 8) | input.charCodeAt(i * 2 + 1);
  }

  /*
   * Repeatedly perform a long division. The binary array forms the dividend,
   * the length of the encoding is the divisor. Once computed, the quotient
   * forms the dividend for the next step. All remainders are stored for later
   * use.
   */
  var full_length = Math.ceil(input.length * 8 /
                                    (Math.log(encoding.length) / Math.log(2)));
  var remainders = Array(full_length);
  for(j = 0; j < full_length; j++)
  {
    quotient = Array();
    x = 0;
    for(i = 0; i < dividend.length; i++)
    {
      x = (x << 16) + dividend[i];
      q = Math.floor(x / divisor);
      x -= q * divisor;
      if(quotient.length > 0 || q > 0)
        quotient[quotient.length] = q;
    }
    remainders[j] = x;
    dividend = quotient;
  }

  /* Convert the remainders to the output string */
  var output = "";
  for(i = remainders.length - 1; i >= 0; i--)
    output += encoding.charAt(remainders[i]);

  return output;
}

/*
 * Encode a string as utf-8.
 * For efficiency, this assumes the input is valid utf-16.
 */
function str2rstr_utf8(input)
{
  var output = "";
  var i = -1;
  var x, y;

  while(++i < input.length)
  {
    /* Decode utf-16 surrogate pairs */
    x = input.charCodeAt(i);
    y = i + 1 < input.length ? input.charCodeAt(i + 1) : 0;
    if(0xD800 <= x && x <= 0xDBFF && 0xDC00 <= y && y <= 0xDFFF)
    {
      x = 0x10000 + ((x & 0x03FF) << 10) + (y & 0x03FF);
      i++;
    }

    /* Encode output as utf-8 */
    if(x <= 0x7F)
      output += String.fromCharCode(x);
    else if(x <= 0x7FF)
      output += String.fromCharCode(0xC0 | ((x >>> 6 ) & 0x1F),
                                    0x80 | ( x         & 0x3F));
    else if(x <= 0xFFFF)
      output += String.fromCharCode(0xE0 | ((x >>> 12) & 0x0F),
                                    0x80 | ((x >>> 6 ) & 0x3F),
                                    0x80 | ( x         & 0x3F));
    else if(x <= 0x1FFFFF)
      output += String.fromCharCode(0xF0 | ((x >>> 18) & 0x07),
                                    0x80 | ((x >>> 12) & 0x3F),
                                    0x80 | ((x >>> 6 ) & 0x3F),
                                    0x80 | ( x         & 0x3F));
  }
  return output;
}

/*
 * Encode a string as utf-16
 */
function str2rstr_utf16le(input)
{
  var output = "";
  for(var i = 0; i < input.length; i++)
    output += String.fromCharCode( input.charCodeAt(i)        & 0xFF,
                                  (input.charCodeAt(i) >>> 8) & 0xFF);
  return output;
}

function str2rstr_utf16be(input)
{
  var output = "";
  for(var i = 0; i < input.length; i++)
    output += String.fromCharCode((input.charCodeAt(i) >>> 8) & 0xFF,
                                   input.charCodeAt(i)        & 0xFF);
  return output;
}

/*
 * Convert a raw string to an array of little-endian words
 * Characters >255 have their high-byte silently ignored.
 */
function rstr2binl(input)
{
  var output = Array(input.length >> 2);
  for(var i = 0; i < output.length; i++)
    output[i] = 0;
  for(var i = 0; i < input.length * 8; i += 8)
    output[i>>5] |= (input.charCodeAt(i / 8) & 0xFF) << (i%32);
  return output;
}

/*
 * Convert an array of little-endian words to a string
 */
function binl2rstr(input)
{
  var output = "";
  for(var i = 0; i < input.length * 32; i += 8)
    output += String.fromCharCode((input[i>>5] >>> (i % 32)) & 0xFF);
  return output;
}

/*
 * Calculate the MD5 of an array of little-endian words, and a bit length.
 */
function binl_md5(x, len)
{
  /* append padding */
  x[len >> 5] |= 0x80 << ((len) % 32);
  x[(((len + 64) >>> 9) << 4) + 14] = len;

  var a =  1732584193;
  var b = -271733879;
  var c = -1732584194;
  var d =  271733878;

  for(var i = 0; i < x.length; i += 16)
  {
    var olda = a;
    var oldb = b;
    var oldc = c;
    var oldd = d;

    a = md5_ff(a, b, c, d, x[i+ 0], 7 , -680876936);
    d = md5_ff(d, a, b, c, x[i+ 1], 12, -389564586);
    c = md5_ff(c, d, a, b, x[i+ 2], 17,  606105819);
    b = md5_ff(b, c, d, a, x[i+ 3], 22, -1044525330);
    a = md5_ff(a, b, c, d, x[i+ 4], 7 , -176418897);
    d = md5_ff(d, a, b, c, x[i+ 5], 12,  1200080426);
    c = md5_ff(c, d, a, b, x[i+ 6], 17, -1473231341);
    b = md5_ff(b, c, d, a, x[i+ 7], 22, -45705983);
    a = md5_ff(a, b, c, d, x[i+ 8], 7 ,  1770035416);
    d = md5_ff(d, a, b, c, x[i+ 9], 12, -1958414417);
    c = md5_ff(c, d, a, b, x[i+10], 17, -42063);
    b = md5_ff(b, c, d, a, x[i+11], 22, -1990404162);
    a = md5_ff(a, b, c, d, x[i+12], 7 ,  1804603682);
    d = md5_ff(d, a, b, c, x[i+13], 12, -40341101);
    c = md5_ff(c, d, a, b, x[i+14], 17, -1502002290);
    b = md5_ff(b, c, d, a, x[i+15], 22,  1236535329);

    a = md5_gg(a, b, c, d, x[i+ 1], 5 , -165796510);
    d = md5_gg(d, a, b, c, x[i+ 6], 9 , -1069501632);
    c = md5_gg(c, d, a, b, x[i+11], 14,  643717713);
    b = md5_gg(b, c, d, a, x[i+ 0], 20, -373897302);
    a = md5_gg(a, b, c, d, x[i+ 5], 5 , -701558691);
    d = md5_gg(d, a, b, c, x[i+10], 9 ,  38016083);
    c = md5_gg(c, d, a, b, x[i+15], 14, -660478335);
    b = md5_gg(b, c, d, a, x[i+ 4], 20, -405537848);
    a = md5_gg(a, b, c, d, x[i+ 9], 5 ,  568446438);
    d = md5_gg(d, a, b, c, x[i+14], 9 , -1019803690);
    c = md5_gg(c, d, a, b, x[i+ 3], 14, -187363961);
    b = md5_gg(b, c, d, a, x[i+ 8], 20,  1163531501);
    a = md5_gg(a, b, c, d, x[i+13], 5 , -1444681467);
    d = md5_gg(d, a, b, c, x[i+ 2], 9 , -51403784);
    c = md5_gg(c, d, a, b, x[i+ 7], 14,  1735328473);
    b = md5_gg(b, c, d, a, x[i+12], 20, -1926607734);

    a = md5_hh(a, b, c, d, x[i+ 5], 4 , -378558);
    d = md5_hh(d, a, b, c, x[i+ 8], 11, -2022574463);
    c = md5_hh(c, d, a, b, x[i+11], 16,  1839030562);
    b = md5_hh(b, c, d, a, x[i+14], 23, -35309556);
    a = md5_hh(a, b, c, d, x[i+ 1], 4 , -1530992060);
    d = md5_hh(d, a, b, c, x[i+ 4], 11,  1272893353);
    c = md5_hh(c, d, a, b, x[i+ 7], 16, -155497632);
    b = md5_hh(b, c, d, a, x[i+10], 23, -1094730640);
    a = md5_hh(a, b, c, d, x[i+13], 4 ,  681279174);
    d = md5_hh(d, a, b, c, x[i+ 0], 11, -358537222);
    c = md5_hh(c, d, a, b, x[i+ 3], 16, -722521979);
    b = md5_hh(b, c, d, a, x[i+ 6], 23,  76029189);
    a = md5_hh(a, b, c, d, x[i+ 9], 4 , -640364487);
    d = md5_hh(d, a, b, c, x[i+12], 11, -421815835);
    c = md5_hh(c, d, a, b, x[i+15], 16,  530742520);
    b = md5_hh(b, c, d, a, x[i+ 2], 23, -995338651);

    a = md5_ii(a, b, c, d, x[i+ 0], 6 , -198630844);
    d = md5_ii(d, a, b, c, x[i+ 7], 10,  1126891415);
    c = md5_ii(c, d, a, b, x[i+14], 15, -1416354905);
    b = md5_ii(b, c, d, a, x[i+ 5], 21, -57434055);
    a = md5_ii(a, b, c, d, x[i+12], 6 ,  1700485571);
    d = md5_ii(d, a, b, c, x[i+ 3], 10, -1894986606);
    c = md5_ii(c, d, a, b, x[i+10], 15, -1051523);
    b = md5_ii(b, c, d, a, x[i+ 1], 21, -2054922799);
    a = md5_ii(a, b, c, d, x[i+ 8], 6 ,  1873313359);
    d = md5_ii(d, a, b, c, x[i+15], 10, -30611744);
    c = md5_ii(c, d, a, b, x[i+ 6], 15, -1560198380);
    b = md5_ii(b, c, d, a, x[i+13], 21,  1309151649);
    a = md5_ii(a, b, c, d, x[i+ 4], 6 , -145523070);
    d = md5_ii(d, a, b, c, x[i+11], 10, -1120210379);
    c = md5_ii(c, d, a, b, x[i+ 2], 15,  718787259);
    b = md5_ii(b, c, d, a, x[i+ 9], 21, -343485551);

    a = safe_add(a, olda);
    b = safe_add(b, oldb);
    c = safe_add(c, oldc);
    d = safe_add(d, oldd);
  }
  return Array(a, b, c, d);
}

/*
 * These functions implement the four basic operations the algorithm uses.
 */
function md5_cmn(q, a, b, x, s, t)
{
  return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s),b);
}
function md5_ff(a, b, c, d, x, s, t)
{
  return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
}
function md5_gg(a, b, c, d, x, s, t)
{
  return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
}
function md5_hh(a, b, c, d, x, s, t)
{
  return md5_cmn(b ^ c ^ d, a, b, x, s, t);
}
function md5_ii(a, b, c, d, x, s, t)
{
  return md5_cmn(c ^ (b | (~d)), a, b, x, s, t);
}

/*
 * Add integers, wrapping at 2^32. This uses 16-bit operations internally
 * to work around bugs in some JS interpreters.
 */
function safe_add(x, y)
{
  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
  return (msw << 16) | (lsw & 0xFFFF);
}

/*
 * Bitwise rotate a 32-bit number to the left.
 */
function bit_rol(num, cnt)
{
  return (num << cnt) | (num >>> (32 - cnt));
}

/*empresa/altaempresa*/
function comprobarEmpresa() { 
        var cifEmpr = document.getElementById("cifEmpr").value;
        var nomEmpr = document.getElementById("nomEmpr").value;
        var telefEmpr = document.getElementById("telefEmpr").value;
        var mailEmpr = document.getElementById("mailEmpr").value;
		 
         if( cifEmpr == null || cifEmpr.length == 0 || /^\s+$/.test(cifEmpr) || cifEmpr.match(/^\[a-zA-Z]d{8}$/)!=null) {
            alert("Error: Error de registro de cif de Empresa");
            return false; 
			
         }else  if( nomEmpr == null || nomEmpr.length == 0 || /^\s+$/.test(nomEmpr) || nomEmpr.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre de empresa no valido");
            return false;          
         }
     
         else  if( telefEmpr == null || telefEmpr.length == 0 || /^\s+$/.test(telefEmpr) || telefEmpr.match(/^[9|6|7]{1}([\d]{2}[-]*){3}[\d]{2}$/)==null ) {
            alert("Error: Numero de telefono no  valido");
            return false;          
         }
        else  if( mailEmpr == null || mailEmpr.length == 0 || /^\s+$/.test(mailEmpr) || mailEmpr.match(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/)==null) {
            alert("Error: Introduzca una direccion de correo valida");
            return false;          
         }
		else {
			return true;
		 }
}

/*empresa/modificarjefe*/
function comprobarModificarEmpresa() { 
      
         nomEmpr = document.getElementById("nomEmpr").value;
         telefEmpr = document.getElementById("telefEmpr").value;
         mailEmpr = document.getElementById("mailEmpr").value;
		 
        if( nomEmpr == null || nomEmpr.length == 0 || /^\s+$/.test(nomEmpr) || nomEmpr.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre de empresa no valido");
            return false;          
         }
     
         else  if( telefEmpr == null || telefEmpr.length == 0 || /^\s+$/.test(telefEmpr) || telefEmpr.match(/^[9|6|7]{1}([\d]{2}[-]*){3}[\d]{2}$/)==null ) {
            alert("Error: Numero de telefono no valido");
            return false;          
         }
        else  if( mailEmpr == null || mailEmpr.length == 0 || /^\s+$/.test(mailEmpr) || mailEmpr.match(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/)==null) {
            alert("Error: Introduzca una direccion de correo valida");
            return false;          
         }
		else {
			return true;
		 }
}


function comprobarAltaIncidenciaInterno(){ 

		
		 var fechaApertura = document.getElementById("fechaApertura").value;
         var fechaBaja = document.getElementById("fechaCierre").value;
		 var description = document.getElementById("des").value;
       
        
         /*variables para el dateparse*/
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
       
			if(fechaApertura == null || fechaApertura.length==0 || fechaApertura.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null){
            alert("Es obligatorio introducir una fecha de alta");
            return false;
			}else{
			
				values=document.forms["FormAltaIncidencia"].elements["fechaApertura"].value.split("/");
						
						dayI=values[0];
						monthI=values[1];
						yearI=values[2];					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormAltaIncidencia"].elements["fechaApertura"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de inicio no es correcta.");  
													document.forms["FormAltaIncidencia"].elements["fechaApertura"].value = "";
													return false;
												}
			}
				if (fechaBaja == null ||fechaBaja.length == 0 || fechaBaja.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null) {
				alert("Es obligatorio introducir una fecha final.");  
				return false;
			}else{

					values=document.forms["FormAltaIncidencia"].elements["fechaCierre"].value.split("/");

						dayF=values[0];
						monthF=values[1];
						yearF=values[2];
					
					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormAltaIncidencia"].elements["fechaCierre"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de fin no es correcta.");  
													return false;
												}
			}
        
				//comprobar fecha fin mayor o igual fecha inicio
				
				if(finMayorInicio(dayI,monthI,yearI,dayF,monthF,yearF)==false){alert("La fecha de inicio no puede ser posterior a la fecha de fin.");}else{}
		
		
        if( description == null || description.length == 0 ||/^\s+$/.test(description) || description.match(/[A-Za-z0-9]/) == null) {
            alert("Error: Debe completar el campo de Descripcion.");  
            return false;
        

    }
}
    
function comprobarAltaIncidenciaJefe(){ 

		 var responsable = document.getElementById("dniResponsable").value;
		 var fechaApertura = document.getElementById("fechaApertura").value;
         var fechaBaja = document.getElementById("fechaCierre").value;
		 var description = document.getElementById("des").value;
        
         /*variable para comprobar que la letra introducida en el campo dni es la correspondiente con el numero al realizar una operación matemática*/
        
         var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        
         /*variables para el dateparse*/
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
          
        if( responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null) {
            alert("Es obligatorio introducir un dni de operario correcto en un formato adecuado [ocho caracteres y un digito].");  
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }else if(responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null){
             alert("Es obligatorio introducir un id correcto en un formato adecuado [ocho caracteres y un digito].");  	
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }if(fechaApertura == null || fechaApertura.length==0 || fechaApertura.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null){
            alert("Es obligatorio introducir una fecha de alta");
            return false;
			}else{
			
				values=document.forms["FormAltaIncidencia"].elements["fechaApertura"].value.split("/");
						
						dayI=values[0];
						monthI=values[1];
						yearI=values[2];					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormAltaIncidencia"].elements["fechaApertura"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de inicio no es correcta.");  
													document.forms["FormAltaIncidencia"].elements["fechaApertura"].value = "";
													return false;
												}
			}
				if (fechaBaja == null ||fechaBaja.length == 0 || fechaBaja.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null) {
				alert("Es obligatorio introducir una fecha final.");  
				return false;
			}else{

					values=document.forms["FormAltaIncidencia"].elements["fechaCierre"].value.split("/");

						dayF=values[0];
						monthF=values[1];
						yearF=values[2];
					
					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormAltaIncidencia"].elements["fechaCierre"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de fin no es correcta.");  
													return false;
												}
			}
        
				//comprobar fecha fin mayor o igual fecha inicio
				
				if(finMayorInicio(dayI,monthI,yearI,dayF,monthF,yearF)==false){alert("La fecha de inicio no puede ser posterior a la fecha de fin.");}else{}
		
		
        if( description == null || description.length == 0 ||/^\s+$/.test(description) || description.match(/[A-Za-z0-9]/) == null) {
            alert("Error: Debe completar el campo de Descripcion.");  
            return false;
        

    }
}
 
 
  function isValidDate(day,month,year){
        if((day>0 && day<32) && (month>0&&month<13) &&(year>1990&&year<2090) )
		{
			return true;
		}else{
			return false;
			}
    	
	
	}
 
 function finMayorInicio(dayI,monthI,yearI,dayF,monthF,yearF){
			if(yearF>=yearI){
			
					if(yearF>yearI){
									return true;
								}else{
								
									if(monthF<monthI){return false;}else{
										
										if(monthF>monthI){return true;
											}else{
														
														if(dayI>dayF){return false;
																}else{return true;
																}
														
														
													}
									
									}
								
								}
			
			}else{
					return false;
				 }


}
 

function comprobarModificarIncidencia(){ 

		
		 var fechaApertura = document.getElementById("fechaApertura").value;
         var fechaBaja = document.getElementById("fechaCierre").value;
		 var description = document.getElementById("des").value;
        
         /*variable para comprobar que la letra introducida en el campo dni es la correspondiente con el numero al realizar una operación matemática*/
        
         var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        
         /*variables para el dateparse*/
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
          
      if(fechaApertura == null || fechaApertura.length==0 || fechaApertura.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null){
            alert("Es obligatorio introducir una fecha de alta");
            return false;
			}else{
			
				values=document.forms["formModificarIncidencia"].elements["fechaApertura"].value.split("/");
						
						dayI=values[0];
						monthI=values[1];
						yearI=values[2];					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["formModificarIncidencia"].elements["fechaApertura"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de inicio no es correcta.");  
													document.forms["formModificarIncidencia"].elements["fechaApertura"].value = "";
													return false;
												}
			}
				if (fechaBaja == null ||fechaBaja.length == 0 || fechaBaja.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null) {
				alert("Es obligatorio introducir una fecha final.");  
				return false;
			}else{

					values=document.forms["formModificarIncidencia"].elements["fechaCierre"].value.split("/");

						dayF=values[0];
						monthF=values[1];
						yearF=values[2];
					
					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["formModificarIncidencia"].elements["fechaCierre"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de fin no es correcta.");  
													return false;
												}
			}
        
				//comprobar fecha fin mayor o igual fecha inicio
				
				if(finMayorInicio(dayI,monthI,yearI,dayF,monthF,yearF)==false){alert("La fecha de inicio no puede ser posterior a la fecha de fin.");}else{}
		
		
        if( description == null || description.length == 0 ||/^\s+$/.test(description) || description.match(/[A-Za-z0-9]/) == null) {
            alert("Error: Debe completar el campo de Descripcion.");  
            return false;
        

    }
}


function comprobarModificarIncidenciaJefe(){ 

		 var responsable = document.getElementById("dniResponsable").value;
		 var fechaApertura = document.getElementById("fechaApertura").value;
         var fechaBaja = document.getElementById("fechaCierre").value;
		 
         /*variable para comprobar que la letra introducida en el campo dni sea correspondiente con el numero del dni*/
        
         var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        
         /*variables para el dateparse*/
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
		   
        if( responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null) {
            alert("Es obligatorio introducir un dni de operario correcto en un formato adecuado [ocho caracteres y un digito].");  
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }else if(responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null){
             alert("Es obligatorio introducir un id correcto en un formato adecuado [ocho caracteres y un digito].");  	
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }if(fechaApertura == null || fechaApertura.length==0 || fechaApertura.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null){
            alert("Es obligatorio introducir una fecha de alta");
            return false;
			}else{
			
				values=document.forms["formModificarIncidencia"].elements["fechaApertura"].value.split("/");
						
						dayI=values[0];
						monthI=values[1];
						yearI=values[2];					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["formModificarIncidencia"].elements["fechaApertura"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de inicio no es correcta.");  
													document.forms["formModificarIncidencia"].elements["fechaApertura"].value = "";
													return false;
												}
			}
				if (fechaBaja == null ||fechaBaja.length == 0 || fechaBaja.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null) {
				alert("Es obligatorio introducir una fecha final.");  
				return false;
			}else{

					values=document.forms["formModificarIncidencia"].elements["fechaCierre"].value.split("/");

						dayF=values[0];
						monthF=values[1];
						yearF=values[2];
					
					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["formModificarIncidencia"].elements["fechaCierre"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de fin no es correcta.");  
													return false;
												}
			}
        
				//comprobar fecha fin mayor o igual fecha inicio
				
				if(finMayorInicio(dayI,monthI,yearI,dayF,monthF,yearF)==false){alert("La fecha de inicio no puede ser posterior a la fecha de fin.");}else{}
		
	
}


function comprobarAltaIteracion(){

		 var idIncid = document.getElementById("idIncid").value;
		 var nIteracion = document.getElementById("nIteracion").value;
         var fechaCreacion = document.getElementById("fechaCreacion").value;
		 var horaInicio = document.getElementById("horaInicio").value;
		 var horaFin = document.getElementById("horaFin").value;
		 var estadoItera = document.getElementById("estadoItera").value;
		 var coste = document.getElementById("coste").value;
		 var description = document.getElementById("des").value;
        
        
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
		   
        if( idIncid == null || idIncid.length == 0 || /^\s+$/.test(idIncid) || idIncid.match(/^\d{8}[a-zA-Z]$/) == null) {
            alert("Es obligatorio introducir una identificacion de incidencia adecuada [ocho caracteres y un digito].");  
            return false;
			}else if (nIteracion == null || nIteracion.length == 0 || /^\s+$/.test(nIteracion) || nIteracion.match( /^\d*$/) == null){
			 alert("Introduzca el numero de iteracion como un numero entero positivo.");  
			return false;
			
            }else if(fechaCreacion == null || fechaCreacion.length==0 || fechaCreacion.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null){
            alert("Es obligatorio introducir una fecha de creacion");
            return false;
				}else{
			
					values=document.forms["FormAltaIteracion"].elements["fechaCreacion"].value.split("/");
							
							dayI=values[0];
							monthI=values[1];
							yearI=values[2];					
												if(isValidDate(values[0],values[1],values[2])==true){
													
													document.forms["FormAltaIteracion"].elements["fechaCreacion"].value = values[2]+values[1]+values[0];    
												
												}else{      
													alert("La fecha de inicio no es correcta.");  
													document.forms["FormAltaIteracion"].elements["fechaCreacion"].value = "";
													return false;
													}
				} if(horaInicio == null || horaInicio.length == 0 ||/^\s+$/.test(horaInicio)){
					
					if (horaInicio.length>8) {
					alert("Introdujo una cadena mayor a 8 caracteres");
					return false;
					}else if (horaInicio.length!=8) {
					alert("Introducir HH:MM:SS para la hora de inicio");
					return false;
					}else{
						a=horaInicio.charAt(0) //<=2
						b=horaInicio.charAt(1) //<4
						c=horaInicio.charAt(2) //:
						d=horaInicio.charAt(3) //<=5
						e=horaInicio.charAt(5) //:
						f=horaInicio.charAt(6) //<=5
							if ((a==2 && b>3) || (a>2)) {
							alert("El valor que introdujo en la horaInicio no corresponde, introduzca un digito entre 00 y 23");
							return false;
							} else if (d>5) {
								alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");
								return false;
								} else if (f>5) {
									alert("El valor que introdujo en los segundos no corresponde");
									return false;}
										else if (c!=':' || e!=':') {
											alert("Introduzca el caracter ':' para separar la horaInicio, los minutos y los segundos");
											return false;}
					}
				
				}else if(horaFin == null || horaFin.length == 0 ||/^\s+$/.test(horaFin)){
							if (horaFin.length>8) {
					alert("Introdujo una cadena mayor a 8 caracteres");
					return false;
					}else if (horaFin.length!=8) {
					alert("Introducir HH:MM:SS para la hora de finalizacion");
					return false;
					}else{
						a=horaFin.charAt(0) //<=2
						b=horaFin.charAt(1) //<4
						c=horaFin.charAt(2) //:
						d=horaFin.charAt(3) //<=5
						e=horaFin.charAt(5) //:
						f=horaFin.charAt(6) //<=5
							if ((a==2 && b>3) || (a>2)) {
							alert("El valor que introdujo en la horaFin no corresponde, introduzca un digito entre 00 y 23");
							return false;
							} else if (d>5) {
								alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");
								return false;
								} else if (f>5) {
									alert("El valor que introdujo en los segundos no corresponde");
									return false;}
										else if (c!=':' || e!=':') {
											alert("Introduzca el caracter ':' para separar la horaFin, los minutos y los segundos");
											return false;}
					}
				
				}else if(estadoItera == null || estadoItera.length == 0 ||/^\s+$/.test(estadoItera) || estadoItera.match(/[0-1]/)==null){
					alert("Error: Debe indicar un estado de la Iteracion actual [0-> iteracion incompleta /// 1-> iteracion completa ]")
					return false;
					}else if(coste == null || coste.length == 0 ||/^\s+$/.test(coste) || coste.match(/^\d*$/)==null){
					alert("Error: Debe indicar un coste para la iteracion actual mediante un numero positivo")
					return false;
					}else if( description == null || description.length == 0 ||/^\s+$/.test(description) || description.match(/[A-Za-z0-9]/) == null) {
					alert("Error: Debe completar el campo de Descripcion.");  
					return false;
					}

}



function modificarIteracion(){

		
		 var horaFin = document.getElementById("horaFin").value;
		 var estadoItera = document.getElementById("estadoItera").value;
		 var coste = document.getElementById("coste").value;
		 var description = document.getElementById("des").value;
        
 
					if(horaFin == null || horaFin.length == 0 ||/^\s+$/.test(horaFin)){
							if (horaFin.length>8) {
					alert("Introdujo una cadena mayor a 8 caracteres");
					return false;
					}else if (horaFin.length!=8) {
					alert("Introducir HH:MM:SS para la hora de finalizacion");
					return false;
					}else{
						a=horaFin.charAt(0) //<=2
						b=horaFin.charAt(1) //<4
						c=horaFin.charAt(2) //:
						d=horaFin.charAt(3) //<=5
						e=horaFin.charAt(5) //:
						f=horaFin.charAt(6) //<=5
							if ((a==2 && b>3) || (a>2)) {
							alert("El valor que introdujo en la horaFin no corresponde, introduzca un digito entre 00 y 23");
							return false;
							} else if (d>5) {
								alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");
								return false;
								} else if (f>5) {
									alert("El valor que introdujo en los segundos no corresponde");
									return false;}
										else if (c!=':' || e!=':') {
											alert("Introduzca el caracter ':' para separar la horaFin, los minutos y los segundos");
											return false;}
					}
				
				}else if(estadoItera == null || estadoItera.length == 0 ||/^\s+$/.test(estadoItera) || estadoItera.match(/[0-1]/)==null){
					alert("Error: Debe indicar un estado de la Iteracion actual [0-> iteracion incompleta /// 1-> iteracion completa ]")
					return false;
					}else if(coste == null || coste.length == 0 ||/^\s+$/.test(coste) || coste.match(/^\d*$/)==null){
					alert("Error: Debe indicar un coste para la iteracion actual mediante un numero positivo")
					return false;
					}else if( description == null || description.length == 0 ||/^\s+$/.test(description) || description.match(/[A-Za-z0-9]/) == null) {
					alert("Error: Debe completar el campo de Descripcion.");  
					return false;
					}

}

		 
		 
		function altaMaquina() { 
        var idMaq = document.getElementById("idMaq").value;
        var numSerie = document.getElementById("numSerie").value;
        var nomMaq = document.getElementById("nomMaq").value;
        var coste = document.getElementById("coste").value;
		var des = document.getElementById("des").value;
		 
         if( idMaq == null || idMaq.length == 0 || /^\s+$/.test(idMaq) || idMaq.match(/^\[a-zA-Z]d{8}$/)!=null) {
            alert("Error: Error de registro del ID de la maquina, debe ser 1 letra y 8 digitos");
            return false; 
			
         }else  if( numSerie == null || numSerie.length == 0 || /^\s+$/.test(numSerie) || numSerie.match(/^\d*$/)==null ) {
            alert("Error: Numero de serie no valido");
            return false;          
         }
     
         else  if( nomMaq == null || nomMaq.length == 0 || /^\s+$/.test(nomMaq) || nomMaq.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre de maquina no valido");
            return false;          
         }
        else  if( coste == null || coste.length == 0 || /^\s+$/.test(coste) || coste.match(/^\d*$/)==null) {
            alert("Error: Introduzca coste de mantenimiento en forma de numero entero positivo");
            return false;          
         }
		  else  if( des == null || des.length == 0 || /^\s+$/.test(des) || des.match(/[A-Za-z0-9]/)==null) {
            alert("Error: Introduzca una breve descripcion de la maquina");
            return false;          
         }
		else {
			return true;
		 }
}
		
function modificarMaquina(){
 
        var numSerie = document.getElementById("numSerie").value;
        var nomMaq = document.getElementById("nomMaq").value;
        var coste = document.getElementById("coste").value;
		var des = document.getElementById("des").value;
		 
         if( numSerie == null || numSerie.length == 0 || /^\s+$/.test(numSerie) || numSerie.match(/^\d*$/)==null ) {
            alert("Error: Numero de serie no valido");
            return false;          
         }
     
         else  if( nomMaq == null || nomMaq.length == 0 || /^\s+$/.test(nomMaq) || nomMaq.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre de maquina no valido");
            return false;          
         }
        else  if( coste == null || coste.length == 0 || /^\s+$/.test(coste) || coste.match(/^\d*$/)==null) {
            alert("Error: Introduzca coste de mantenimiento en forma de numero entero positivo");
            return false;          
         }
		  else  if( des == null || des.length == 0 || /^\s+$/.test(des) || des.match(/[A-Za-z0-9]/)==null) {
            alert("Error: Introduzca una breve descripcion de la maquina");
            return false;          
         }
		else {
			return true;
		 }
}

function altaUnServicioJefe(){ 

		
		 var idServ = document.getElementById("idServ").value;
         var idMaq = document.getElementById("idMaq").value;
		 var periodicidad = document.getElementById("periodicidad").value;
		 var fechaInicio = document.getElementById("fechaInicio").value;
         var fechaFin = document.getElementById("fechaFin").value;
		 var coste = document.getElementById("coste").value;
		 var description = document.getElementById("des").value;
       
        
         /*variables para el dateparse*/
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
          
       if(idServ == null || idServ.length == 0 || /^\s+$/.test(idServ) || idServ.match(/^\[a-zA-Z]d{8}$/)!=null ){
			  alert("Es obligatorio introducir id de idServ correcto en un formato adecuado [un caracter y ocho digitos].");  
			return false;
			
			}else if(idMaq == null || idMaq.length == 0 || /^\s+$/.test(idMaq) ){
			alert("Es obligatorio introducir id de maquina correcto en un formato adecuado [un caracter y ocho digitos].");  
			return false;
			
			}else if(periodicidad == null || periodicidad.length == 0 || /^\s+$/.test(periodicidad) || periodicidad.match(/[A-Za-z0-9]/)==null ){
			alert("Es obligatorio introducir una periodicidad.");  
			return false;
			
			}else if(fechaInicio == null || fechaInicio.length==0 || fechaInicio.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null){
            alert("Es obligatorio introducir una fecha de alta");
            return false;
			}else{
			
				values=document.forms["FormAltaServicio"].elements["fechaInicio"].value.split("/");
						
						dayI=values[0];
						monthI=values[1];
						yearI=values[2];					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormAltaServicio"].elements["fechaInicio"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de alta no es correcta.");  
													document.forms["FormAltaServicio"].elements["fechaInicio"].value = "";
													return false;
												}
			}
				if (fechaFin == null ||fechaFin.length == 0 || fechaFin.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null) {
				alert("Es obligatorio introducir una fecha de baja.");  
				return false;
			}else{

					values=document.forms["FormAltaServicio"].elements["fechaFin"].value.split("/");

						dayF=values[0];
						monthF=values[1];
						yearF=values[2];
					
					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormAltaServicio"].elements["fechaFin"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de baja no es correcta.");  
													return false;
												}
			}
        
				//comprobar fecha fin mayor o igual fecha inicio
				
				if(finMayorInicio(dayI,monthI,yearI,dayF,monthF,yearF)==false){alert("La fecha de alta no puede ser posterior a la fecha de baja del servicio.");}else{}
		
		if(coste == null || coste.length == 0 ||/^\s+$/.test(coste) || coste.match(/^\d*$/) == null){
		   alert("Error: Debe completar el campo de coste.");  
            return false;
       }else if( description == null || description.length == 0 ||/^\s+$/.test(description) || description.match(/[A-Za-z0-9]/) == null) {
            alert("Error: Debe completar el campo de Descripcion.");  
            return false;
        

    }
}



function modificarServicio(){ 
		
		 var periodicidad = document.getElementById("periodicidad").value;
		 var fechaInicio = document.getElementById("fechaInicio").value;
         var fechaFin = document.getElementById("fechaFin").value;
		 var coste = document.getElementById("coste").value;
		 var description = document.getElementById("des").value;
       
        
         /*variables para el dateparse*/
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
        
			if(periodicidad == null || periodicidad.length == 0 || /^\s+$/.test(periodicidad) || periodicidad.match(/[A-Za-z0-9]/)==null ){
			alert("Es obligatorio introducir una periodicidad.");  
			return false;
			
			}else if(fechaInicio == null || fechaInicio.length==0 || fechaInicio.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null){
            alert("Es obligatorio introducir una fecha de alta");
            return false;
			}else{
			
				values=document.forms["FormModServicio"].elements["fechaInicio"].value.split("/");
						
						dayI=values[0];
						monthI=values[1];
						yearI=values[2];					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormModServicio"].elements["fechaInicio"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de alta no es correcta.");  
													document.forms["FormModServicio"].elements["fechaInicio"].value = "";
													return false;
												}
			}
				if (fechaFin == null ||fechaFin.length == 0 || fechaFin.match(/\d{1,2}\/\d{1,2}\/\d{2,4}$/) == null) {
				alert("Es obligatorio introducir una fecha de baja.");  
				return false;
			}else{

					values=document.forms["FormModServicio"].elements["fechaFin"].value.split("/");

						dayF=values[0];
						monthF=values[1];
						yearF=values[2];
					
					
												if(isValidDate(values[0],values[1],values[2])==true)
											{
												document.forms["FormModServicio"].elements["fechaFin"].value = values[2]+values[1]+values[0];    
											}else{      
													alert("La fecha de baja no es correcta.");  
													return false;
												}
			}
        
				//comprobar fecha fin mayor o igual fecha inicio
				
				if(finMayorInicio(dayI,monthI,yearI,dayF,monthF,yearF)==false){alert("La fecha de alta no puede ser posterior a la fecha de baja del servicio.");}else{}
		
		if(coste == null || coste.length == 0 ||/^\s+$/.test(coste) || coste.match(/^\d*$/) == null){
		   alert("Error: Debe completar el campo de coste.");  
            return false;
       }else if( description == null || description.length == 0 ||/^\s+$/.test(description) || description.match(/[A-Za-z0-9]/) == null) {
            alert("Error: Debe completar el campo de Descripcion.");  
            return false;
        

    }
}		



function altaOperarioExterno(){ 

		 var responsable = document.getElementById("dni").value;
		 var nombre = document.getElementById("nombre").value;
         var apellidos = document.getElementById("apellidos").value;
		
        
         /*variable para comprobar que la letra introducida en el campo dni es la correspondiente con el numero al realizar una operación matemática*/
        
         var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        
         /*variables para el dateparse*/
	     var patron=new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");
         var dayI,dayF,monthI,monthF,yearI,yearF;
          
        if( responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null) {
            alert("Es obligatorio introducir un dni de operario correcto en un formato adecuado [ocho caracteres y un digito].");  
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }else if(responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null){
             alert("Es obligatorio introducir un id correcto en un formato adecuado [ocho caracteres y un digito].");  	
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || nombre.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre no valido");
            return false;          
         }else if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos) || apellidos.match(/[A-Za-z0-9]/)==null ){
		 alert("Error: apellidos no validos");
            return false;  
		 }
}

function altaOperarioInterno(){ 

		 var responsable = document.getElementById("dni").value;
		 var nombre = document.getElementById("nombre").value;
         var apellidos = document.getElementById("apellidos").value;
		  var telefEmpr = document.getElementById("telefono").value;
         var mailEmpr = document.getElementById("mail").value;
		
        
         /*variable para comprobar que la letra introducida en el campo dni es la correspondiente con el numero al realizar una operación matemática*/
        
         var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
        
       
        if( responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null) {
            alert("Es obligatorio introducir un dni de operario correcto en un formato adecuado [ocho caracteres y un digito].");  
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }else if(responsable == null || responsable.length == 0 || /^\s+$/.test(responsable) || responsable.match(/^\d{8}[a-zA-Z]$/) == null){
             alert("Es obligatorio introducir un id correcto en un formato adecuado [ocho caracteres y un digito].");  	
            return false;
			
            }else if( responsable.charAt(8) != letras[(responsable.substring(0, 8))%23] ){
            alert("La letra del dni no es correcta");
            return false;
			
            }if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || nombre.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre no valido");
            return false;          
         }else if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos) || apellidos.match(/[A-Za-z0-9]/)==null ){
			alert("Error: apellidos no validos");
            return false;  
		 } else  if( telefEmpr == null || telefEmpr.length == 0 || /^\s+$/.test(telefEmpr) || telefEmpr.match(/^[9|6|7]{1}([\d]{2}[-]*){3}[\d]{2}$/)==null ) {
            alert("Error: Numero de telefono no  valido");
            return false;          
         }
        else  if( mailEmpr == null || mailEmpr.length == 0 || /^\s+$/.test(mailEmpr) || mailEmpr.match(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/)==null) {
            alert("Error: Introduzca una direccion de correo valida");
            return false;          
         }
}

function modificarJefe(){ 

		
		 var nombre = document.getElementById("nombre").value;
         var apellidos = document.getElementById("apellidos").value;
		  var telefEmpr = document.getElementById("telefono").value;
         var mailEmpr = document.getElementById("mail").value;
		
        
         /*variable para comprobar que la letra introducida en el campo dni es la correspondiente con el numero al realizar una operación matemática*/
        
      
       if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || nombre.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre no valido");
            return false;          
         }else if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos) || apellidos.match(/[A-Za-z0-9]/)==null ){
			alert("Error: apellidos no validos");
            return false;  
		 } else  if( telefEmpr == null || telefEmpr.length == 0 || /^\s+$/.test(telefEmpr) || telefEmpr.match(/^[9|6|7]{1}([\d]{2}[-]*){3}[\d]{2}$/)==null ) {
            alert("Error: Numero de telefono no  valido");
            return false;          
         }
        else  if( mailEmpr == null || mailEmpr.length == 0 || /^\s+$/.test(mailEmpr) || mailEmpr.match(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/)==null) {
            alert("Error: Introduzca una direccion de correo valida");
            return false;          
         }
}

function modificarExternoJefe(){ 

		
		 var nombre = document.getElementById("nombre").value;
         var apellidos = document.getElementById("apellidos").value;
		 var empresa = document.getElementById("empresa").value;
    
        
      
       if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) || nombre.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: Nombre no valido");
            return false;          
         }else if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos) || apellidos.match(/[A-Za-z0-9]/)==null ){
			alert("Error: apellidos no validos");
            return false;  
		 } else  if( empresa == null || empresa.length == 0 || /^\s+$/.test(empresa) || empresa.match(/[A-Za-z0-9]/)==null ) {
            alert("Error: nombre de empresa	no valido");
            return false;          
         }
      
}

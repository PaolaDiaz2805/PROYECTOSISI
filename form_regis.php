
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Alumno</title>
  <link href="CSS/form_regis.css" rel="stylesheet" type="text/css" />
  
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
 
</head>

<body>

    

 
  <header>
        <div class="encabezado"> 
                    <img src="FOTOS/logo.jpg" class ="logo_cole"/>
                    <a href="test.html" class="titulo">Colegio Federico Aguiló</a>
                </div>
            <div class="menu">
                    <button onclick="toggleMenu()" class="menu-boton"><img src="FOTOS/barras.png" style=" width: 50px "></button>
                    <div id="menu_desple" class="barra">
                    <ul class="botones">
                    <li><a href="" id="primero" class="inicio"><i></i>INICIO</a></li>
                    <li><a href="" class="bot"><i ></i>CONOCE EL COLEGIO</a></li>
                    <li><a href="" class="bot"><i ></i>SERVICIOS</a></li>
                    <li><a href="" class="bot"><i></i>SERVICIOS EN LÍNEA</a></li>
                    <li><a href="" class="bot"><i ></i>MISIÓN Y VISIÓN</a></li>
                    <li><a href="" class="bot"><i ></i>COMUNÍCANOS</a></li>
                    <li><a href="" class="bot"><i ></i>CONTÁCTANOS</a></li>
                    </ul>
                    </div>
                        <div class="buscador" >Buscar...</div>
                        <div class="vacio"></div>
                    </div>
            <script>
              function toggleMenu() {
  const dropdown = document.getElementById("menu_desple");
  dropdown.classList.toggle("activo");
}
            
</script>
  </header>
  <div class="cuerpo">
  <section class="b_izquierda">
  <nav class="barra_izq">
        <img src="FOTOS/logo_casa.png" class="casa">
        <h2 class="nom">Menú</h2>
        <div class="men" >
            <div class="sub">
                <div class="no"><h3 class="di">Horario de Clases</h3> </div>
            <div class="no"><h3 class="di">Calendario</h3></div>  
            <div class="no"><h3 class="di">Profesores</h3> </div>
            <div class="no"><h3 class="di">Guias de Curso</h3> </div>
            <div class="no"><h3 class="di">Himno al Colegio</h3></div>
            </div>
            
        </div>
        <h2 class="nam">Noticias</h2>
        <aside class="noti">
            <h3 class="di">Inicio de año Escolar</h3>
            <h3 class="di">Requisitos para <br> Matricularse</h3>
            <h3 class="di">Matriculas</h3>
            <h3 class="di">Inscripciones</h3>
        </aside>
        <h2>Visitas</h2>
        <aside class="tabla">
            <div class="visi">
                <table>
  <thead>
    <tr>
      <th>HOY</th>
      <th>ESTE MES</th>
      <th>MES PASADO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>4</td>
      <td>55</td>
      <td>230</td>
    </tr>
  </tbody>
</table>
            </div>
        </aside>
    </nav>
  </section>
  <section class="centro">
    
            

        <div class="espacios">
    
         <form action="registro.php" method="post" id="form_registro"> <h1 id="t_registro">REGISTRO</h1>

            <div id="label">
        
         <label for=""  class="label_registro" > Nombre: </label> 
            <input type="text" name="nom" class="registro_espacios">
         <label for=""  class="label_registro" id="label_apellido"> Apellidos: </label> 
            <input type="text" name="ape" class="registro_espacios"> 
         <label for=""  class="label_registro"> Contraseña:  </label>
            <input type="password" name="contra" class="registro_espacios"> 
         <label for=""  class="label_registro"> Fecha de nacimiento: </label>
            <input type="date" name="fecha" class="registro_espacios">
    <div class="row">      
            <label for=""  class="label_registro2" > Curso: </label>
             <input type="text" name="curso"  class="registro_espacios2">
            <label for=""  class="label_registro2"> C.I.: </label> 
             <input type="number" name="CI" class="registro_espacios2">
    </div>
             <label for=""  class="label_registro"> RUDE: </label>
             <input type="number" name="RUDE" class="registro_espacios">
             <label for=""  class="label_registro"> Dirección: </label>  
             <input type="text" name="dire" class="registro_espacios">
             <label for=""  class="label_registro"> Teléfono: </label>
             <input type="text" name="telef" class="registro_espacios"> 

         <div id="botones">  
         <input type="reset" value="BORRAR" id="form_borrar" class="form_botones"> 
         <input type="submit" value="ENVIAR" id="form_enviar" class="form_botones"> 
         </div>  

         </div>
    </div> 

  </section>
  <section class="b_derecha"> </section>
</form>
  </div>
    <footer>©Copyright Colegio Pedro Poveda</footer>

    <script>
      
         $(document).ready(function(){
        $("#form_registro").validate({
        rules:{
            nom:{
                required:true, minlength:3,maxlength:30
            },
            ape:{
                required:true,minlength:3,maxlength:30
            },
            contra:{
                required:true,minlength:5,maxlength:10
            },
            curso:{
                required:true,minlength:3,maxlength:10
            },
            fecha:{
                required:true,minlength:5,maxlength:30
            },
            dire:{
                required:true,minlength:5,maxlength:50
            },
            CI:{
                required:true,number:true
            },
            RUDE:{
                required:true,number:true
            },
            telef:{
                required:true,number:true

        },
        },
        messages:{
            nom:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de letras es 3",
                maxlength:"El maximo de letras es 30"
            },
            ape:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de letras es 3",
                maxlength:"El maximo de letras es 30"
            },
            contra:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 5",
                maxlength:"El maximo de caracteres es 10"
            },
            curso:{
                required:"Este campo tiene que ser llenado",
                 minlength:"El minimo de caracteres es 3",
                maxlength:"El maximo de caracteres es 10"
            },
            fecha:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 5",
                maxlength:"El maximo de caracteres es 30"
            },
            dire:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 5",
                maxlength:"El maximo de caracteres es 30"
                
            },
            CI:{
                required:"Este campo tiene que ser llenado",
                number:"Eso no es un numero"
               
            },
            RUDE:{
                required:"Este campo tiene que ser llenado",
                number:"Eso no es un numero"
               
            },
            telef:{
                required:"Este campo tiene que ser llenado",
                number:"Eso no es un numero"
        }

       }
    });
});
    </script>
</body>

</html>
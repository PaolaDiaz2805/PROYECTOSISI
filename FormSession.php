<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <title>Iniciar Sesión</title>
  <link href="CSS/FormSession.css" rel="stylesheet" type="text/css" />
  
</head>
<body>

    
  <script src="script.js"></script> 
 
  <header>
        <div class="encabezado"> 
                    <a href="inicio.php"><img src="FOTOS/logo.png" class ="logo_cole"/></a>
                    <a href="inicio.php" class="titulo">Colegio Federico Aguiló</a>
                </div>
            <div class="menu">
                    <button onclick="toggleMenu()" class="menu-boton"><img class="ft" src="FOTOS/barras.png"></button>
                    <div id="menu_desple" class="barra">
                    <ul class="botones">
                    <li><a href="inicio.php" id="primero" class="inicio"><i></i>INICIO</a></li>
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
    
     <form action="datos2.php" method="GET">
    <fieldset>
      <h1>Iniciar Sesión</h1>

      <div class="usu">
        <img src="FOTOS/usu.jpg" alt="Usuario" width="50px" height="50px">
        <input type="number" name="user" placeholder="Nombre de usuario">
      </div>

      <div class="usu">
        <img src="FOTOS/contra.jpg" alt="Contraseña">
        <input type="password" name="contra" placeholder="Contraseña" >
      </div>


      <div class="a">
        <input class="en" type="submit" value="Entrar" >
        <input class="en" type="reset" value="Borrar" >
      </div>

      <p class="victoria">¿No tienes una cuenta? <a href="Form_regis.php">Regístrate aquí</a></p>
    </fieldset>
  </form>

         </div>
    </div> 

  </section>
  <section class="b_derecha"> </section>
  </div>
    <footer>©Copyright Colegio Pedro Poveda</footer>
</body>
<script>
      $("form").validate({
        rules:{
            nom:{
                required:true, minlength:3,maxlength:15
            },
            contra:{
                required:true,minlength:3,maxlength:10
            }

        },
        messages:{
            nom:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de letras es 3",
                maxlength:"El maximo de letras es 15"
            },
            contra:{
                required:"Este campo tiene que ser llenado",
                minlength:"El minimo de caracteres es 3",
                maxlength:"El maximo de caracteres es 10"
            }
        },

       });

    </script>


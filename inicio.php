<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Alumno</title>

  <link href="CSS/tru.css" rel="stylesheet" type="text/css" />
</head>
 
<body class="gg">

  <header> 
        <?php
    include("encabezado.php");
    ?>
  </header> 
  <div class="cuerpo">
  <section class="b_izquierda">
  <nav class="barra_izq"> 
        <a href="inicio.php"><img src="FOTOS/logo_casa.png" class="casa"></a>

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
          
        <div class="noti">
            <div class="sub">
            <div class="no"><h3 class="di">Inicio de año Escolar</h3></div>
            <div class="no"><h3 class="di">Requisitos para <br> Matricularse</h3></div>
            <div class="no"><h3 class="di">Matriculas</h3></div>
            <div class="no"><h3 class="di">Inscripciones</h3></div>
            </div>
        </div>
        
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
              <section class="bienvenida">
                        <h1 class="bienvenidos_texto">BIENVENIDOS..</h1>
                        <div class="ns">
                            <img class="pho" src="FOTOS/SO.jpeg" width="200px" height="200px">
                            <img class="pho" src="FOTOS/SA.jpeg" width="200px" height="200px">
                            <img class="pho" src="FOTOS/SE.jpeg" width="200px" height="200px">
                            <img class="pho" src="FOTOS/SU.jpeg" width="200px" height="200px">
                        </div>
                        <aside class="parrafo">
                        <p>Nos sentimos orgullosos por llevar adelante el quehacer pedagógico a partir del enfoque de <br>
                            la EDUCACIÓN PERSONALIZADA , que permite brindar una experiencia educativa de crecimiento <br>
                            intelectual y espiritual con la participación activa de los estudiantes que forman parte de <br>
                            la familia Rene Barrientista.</p>
                        </aside>
              </section>
    </section>
             
  <section class="b_derecha">
        <div class="barra_acceso">
            <h2 class="titulo_acceso_online">Acceso Online</h2>
            <a class="ingreso" href="FormSession.php">Ingresa</a>
        </div>
        <div >
            <h2 class="cale">Calendario</h2>
            <img class="cal_img" src="FOTOS/calendario.jpg">
        </div>
        <div >
            <h2 class="barra_redes">Visitanos</h2>
        </div>  
        <div >
            <h2 class="barra_redes">Visitanos</h2>
        </div> 
  </section>
  </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>
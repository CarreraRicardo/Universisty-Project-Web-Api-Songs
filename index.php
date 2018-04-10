<?php

    $variable = 1;

    $respuesta = file_get_contents("http://localhost/Canciones/api/canciones.php?canciones=".$variable);

    $datos = json_decode($respuesta);

    $canciones = $datos;

    ////////////////////////////////

    $variable = 2;

    $respuesta = file_get_contents("http://localhost/Canciones/api/canciones.php?canciones=".$variable);

    $datosArtista = json_decode($respuesta);

    $artistas = $datosArtista;

    ////////////////////////////////

    $variable = 3;

    $respuesta = file_get_contents("http://localhost/Canciones/api/canciones.php?canciones=".$variable);

    $datosGenero = json_decode($respuesta);

    $generos = $datosGenero;

?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
    			<i class="fa fa-bars"></i>
    		</button> </div>
                    
                    
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div> <span class="name">
    			      John Doe
    			    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#"> <i class="fa fa-user icon"></i> Profile </a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-bell icon"></i> Notifications </a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-gear icon"></i> Settings </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="login.html"> <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>


                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Modular Admin </div>
                        </div>
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">

                                <li class="active">
                                    <a href="index.php"> <i class="fa fa-home"></i> Dashboard </a>
                                </li>

                                <li>

                                    <a href=""><i class="fa fa-plus"></i> Add<i class="fa arrow"></i></a>

                                    <ul>
                                        <li><a data-toggle="modal" data-target="#modalSong"><i class="fa fa-music"></i> New Song</a></li>
                                        <li><a data-toggle="modal" data-target="#modalArtist"><i class="fa fa-user"></i> New Artist</a></li>
                                        <li><a data-toggle="modal" data-target="#modalGenre"><i class="fa fa-headphones"></i> New Genre</a></li>
                                    </ul>



                                </li> 
                             

                               
                            </ul>
                        </nav>
                    </div>

                    <footer class="sidebar-footer">
                        <ul class="nav metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-xs-4"> </div>
                                                <div class="col-xs-4"> <label class="title">fixed</label> </div>
                                                <div class="col-xs-4"> <label class="title">static</label> </div>
                                            </div>
                                            <div class="row hidden-md-down">
                                                <div class="col-xs-4"> <label class="title">Sidebar:</label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
    				                        <span></span>
    				                    </label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="sidebarPosition" value="">
    				                        <span></span>
    				                    </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Header:</label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
    				                        <span></span>
    				                    </label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="headerPosition" value="">
    				                        <span></span>
    				                    </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Footer:</label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
    				                        <span></span>
    				                    </label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="footerPosition" value="">
    				                        <span></span>
    				                    </label> </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li> <span class="color-item color-red" data-theme="red"></span> </li>
                                                <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
                                                <li> <span class="color-item color-green" data-theme="green"></span> </li>
                                                <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
                                                <li> <span class="color-item color-blue active" data-theme=""></span> </li>
                                                <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <a href=""> <i class="fa fa-cog"></i> Customize </a>
                            </li>
                        </ul>
                    </footer>
                </aside>

                <!-- Termina aside de menu -->


                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page">

                    <div class="title-block">
                        <h1 class="title">
                              
                              Songs
                       </h1>
                    
                    </div>

                    <section class="section">
                        <div class="row sameheight-container">

                            <div class="col-md-5">
                                    
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title">
                                        Artist
                                        </h3> 

                                    </div> 

                                    <form role="form">

                                      

                                        <div class="form-group"> 
                                            <select class="form-control seleccionaArtistas">
                                                <option>Todos</option>
                                                <?php foreach ($artistas as $artist) { ?>
                                                  <option value="<?=$artist->idartista?>"> <?=$artist->nombreartista ?> </option>

                                                 <?php } ?>   
                                                
                                            </select> 

                                        </div>


                                    </form>

                                </div>

                            </div> <!-- -->

                            <div class="col-md-5">
                                    
                                <div class="card card-block sameheight-item">
                                    <div class="title-block">
                                        <h3 class="title">
                                        Genre
                                        </h3> 

                                    </div> 

                                    <form role="form">

                                    
                                        <div class="form-group"> 
                                            <select class="form-control seleccionarGenero">
                                                <option>Todos</option>
                                               <?php foreach($generos as $genero) { ?>

                                                 <option value="<?=$genero->idgenero?>"> <?=$genero->nombregenero ?> </option>

                                                <?php } ?>
                                            </select> 

                                        </div>


                                    </form>

                                </div>

                            </div> <!-- -->
                            
                        </div>
                    </section>

                    <section class="section">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-block">


                                        <section class="example">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Song</th>
                                                            <th>Artist</th>
                                                            <th>Genre</th>
                                                            <th>Fecha de Composición</th>
                                                            <th>Actions</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodyCanciones">
                                                        <?php foreach($canciones as $cancion) { ?>

                                                        <tr id="listaCanciones">
                                                            <td> <?=$cancion->idcancion ?> </td>
                                                            <td> <?=$cancion->nombrecancion ?> </td>
                                                            <td> <?=$cancion->nombreartista ?> </td>
                                                            <td> <?=$cancion->nombregenero ?> </td>
                                                            <td> <?=$cancion->fechacomp ?> </td>
                                                            <td>
                                                                
                                                                <span onclick="eliminar(this)" class="badge" data-id="<?=$cancion->idcancion?>">

                                                                    <a href="#"><i class="fa fa-trash-o"></i></a> 

                                                                </span>

                                                                <span onclick ="actualizar(this)" data-toggle="modal" data-target="#modalActualizar" data-id="<?=$cancion->idcancion?>" data-name="<?=$cancion->nombrecancion?>" data-artist="<?=$cancion->nombreartista?>" data-genero="<?=$cancion->nombregenero?>" data-fecha="<?=$cancion->fechacomp?>">

                                                                    <a href="#"><i class="fa fa-refresh"></i></a>

                                                                </span>

                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <?php } ?>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    
                </article>

            <div class="modal fade" id="modalSong" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form id="formulinCancion">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title" id="myModalLabel">New Song</h3>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                         
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input name="nombre" type="text" id="nombre" class="form-control">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Artista</label>
                                            <input name="artista" class="form-control" placeholder="Enter text">
                                        </div>

                                        <div class="form-group">
                                            <label>Genero</label>
                                            <input name="genero" class="form-control" placeholder="Enter text">
                                        </div>

                                         <div class="form-group">
                                            <label>Fecha</label>
                                            <input type="date" name="fecha" class="form-control" placeholder="Enter text">
                                        </div>
                                             
                                    </div>
                                         
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="botonSong" type="submit" class="btn btn-primary">Add</button>
                                <input id="accion" type="hidden" name="accion" value="addSong">
                            </div>

                        </form>
                    </div>
                
                </div>

            </div>

        <!-- termina modal de nueva cancion -->

        <div class="modal fade" id="modalArtist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form id="formulinArtista">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title" id="myModalLabel">New Artist</h3>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                         
                                        <div class="form-group">
                                            <label>Artist</label>
                                            <input name="nombre" type="text" id="nombre" class="form-control">
                                            
                                        </div>
                                    </div>
                                         
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                <button id="botonArtista" type="submit" class="btn btn-primary">Add</button>

                                <input id="accion" type="hidden" name="accion" value="addArtist">
                            </div>

                        </form>
                    </div>
                
                </div>
                
            </div>

            <!-- termina modal de nuevo artista -->

            <div class="modal fade" id="modalGenre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form id="formulinGenre">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title" id="myModalLabel">New Genre</h3>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                         
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input name="nombre" type="text" id="nombre" class="form-control">
                                            
                                        </div>
                                       
                                             
                                    </div>
                                         
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="botonGenre" type="submit" class="btn btn-primary">Add</button>

                                <input id="accion" type="hidden" name="accion" value="addGenre">
                            </div>

                        </form>
                    </div>
                
                </div>
                
            </div>

            <div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form id="formulinActualizar">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title" id="myModalLabel">Update Song</h3>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                         
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input name="nombreCancion" type="text" id="nombre" class="form-control">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Artista</label>
                                            <input name="nombreArtista" class="form-control" id="artista" placeholder="Enter text">
                                        </div>

                                        <div class="form-group">
                                            <label>Genero</label>
                                            <input name="nombreGenero" class="form-control" id="genero" placeholder="Enter text">
                                        </div>

                                         <div class="form-group">
                                            <label>Fecha</label>
                                            <input type="date" name="fechaComp" class="form-control" id="fecha" placeholder="Enter text">
                                        </div>

                                        <input type="hidden" name="idCancionActualizar" id="idSong">
                                             
                                    </div>
                                         
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="botonUpdate" type="submit" class="btn btn-primary">Update Song</button>
                                <input id="accion" type="hidden" name="accion" value="updateSong">
                            </div>

                        </form>
                    </div>
                
                </div>

            </div>



                <footer class="footer">
                    <div class="footer-block buttons"> <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=modularcode&repo=modular-admin-html&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe> </div>
                    <div class="footer-block author">
                        <ul>
                            <li> created by <a href="https://github.com/modularcode">ModularCode</a> </li>
                            <li> <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a> </li>
                        </ul>
                    </div>
                </footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    					<span class="sr-only">Close</span>
    				</button>
                                <h4 class="modal-title">Media Library</h4> </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a> </li>
                                    <li class="nav-item"> <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a> </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row"> </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Insert Selected</button> </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
                                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4> </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>

        <script type="text/javascript">


            $('#botonArtista').click(function(event){
                /* Act on the event */

                event.preventDefault();

                var variables = $('#formulinArtista').serialize();

                 console.log(variables);

                $.ajax({ 

                    url : 'controllers/cancionesController.php', 
                    data : variables , 
                    type : 'POST', 
                    dataType : 'text', 

                    success : function(data) { 

                        console.log("Esto vale el response: " +data);
                        location.reload();

                        

                    }, 
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    }
                });
            });

            $('#botonGenre').click(function(event){
                /* Act on the event */

                event.preventDefault();

                var variables = $('#formulinGenre').serialize();

                 console.log(variables);

                $.ajax({ 
                    url : 'controllers/cancionesController.php', 
                    data : variables , 
                    type : 'POST', 
                    dataType : 'text', 

                    success : function(data) { 

                        console.log("Esto vale el response: " +data);
                        location.reload();
                        

                    }, 
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    }
                });
            });

             $('#botonSong').click(function(event){
                /* Act on the event */

                event.preventDefault();

                var variables = $('#formulinCancion').serialize();

                 console.log(variables);

                $.ajax({ 
                    url : 'controllers/cancionesController.php', 
                    data : variables , 
                    type : 'POST', 
                    dataType : 'text', 

                    success : function(data) { 

                        console.log("Esto vale el response: " +data);
                        location.reload();
                        

                    }, 
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    }
                });
            });

             $('.seleccionaArtistas').change(function(event) {
                    
                   
                  
                   var idArtist = $(this).val();

                    
                   console.log(idArtist);

                    $.ajax({

                        url : 'controllers/cancionesController.php', 

                        data : {"idArtist":idArtist},

                        type : 'POST',

                        dataType : 'text', 

                        success : function(data) {


                            var json = data;

                            obj = JSON.parse(json);

                            //var count = $('#bodyCanciones').children('tr').length;

                            $('#bodyCanciones').empty();

                             var totalToAdd = obj.length;

                            for(var i = 0; i < totalToAdd;i++)
                            {
                                $('#bodyCanciones').append('<tr> <td> </td> <td> </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr>');
                            }

                            
                        
                            for(var i = 0; i < obj.length; i++)
                            {
                                

                                $('#bodyCanciones tr:eq('+ i+') td:eq(0)').text(obj[i].idcancion);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(1)').text(obj[i].nombrecancion);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(2)').text(obj[i].nombreartista);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(3)').text(obj[i].nombregenero);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(4)').text(obj[i].fechacomp);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(5)').html('<span onclick="eliminar(this)" data-id="'+obj[i].idcancion+'"> <a href=""><i class="fa fa-trash-o"></i></a></span> <span onclick="actualizar(this)" data-toggle="modal" data-target="#modalActualizar" data-id="'+obj[i].idcancion+'" data-name="'+obj[i].nombrecancion+'" data-artist="'+obj[i].nombreartista+'" data-genero="'+obj[i].nombregenero+'" data-fecha="'+obj[i].fechacomp+'"> <a href=""><i class="fa fa-refresh"></i></a></span>');
                                
                            }

                        }, 
                        error : function(xhr, status) {
                            alert('Disculpe, existió un problema');
                        }
                    });
                

             });

            function eliminar(boton)
            {
                
                event.preventDefault();
            
                var idCancion = $(boton).data("id");

               
                $.ajax({

                    url : 'controllers/cancionesController.php', 

                    data : {"idCancion":idCancion}, 

                    type : 'POST',

                    dataType : 'text', 

                    success : function(data) { 
                        
                        console.log(data);

                        if(data == "Cancion Eliminada")
                        {
                            $(boton).parent().parent().remove();
                        }
                         
                        
                        
                    }, 
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    }
                 });



            }

             function actualizar(boton)
            {
                
                event.preventDefault();
            
                var idCancion = $(boton).data("id");

                var nombreCancion = $(boton).data("name");

                var nombreArtista = $(boton).data("artist");

                var nombreGenero = $(boton).data("genero");

                var fechaComp = $(boton).data("fecha");

                $('.modal-body #nombre').val(nombreCancion);
                $('.modal-body #artista').val(nombreArtista);
                $('.modal-body #genero').val(nombreGenero);
                $('.modal-body #fecha').val(fechaComp);
                $('.modal-body #idSong').val(idCancion);


            }

             $('#botonUpdate').click(function(event){

                event.preventDefault();

                var datos = $('#formulinActualizar').serialize();

                console.log(datos);
                
                $.ajax({

                    url : 'controllers/cancionesController.php', 

                    data : datos,

                    type : 'POST',

                    dataType : 'text', 

                    success : function(data) { 
                        
                        //console.log(data);
                        location.reload();

                        
                    }, 
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    }

                });

                

            });





            $('.seleccionarGenero').change(function(event) {
                    
                   
                  
                   var idGenero = $(this).val();

                    $.ajax({

                        url : 'controllers/cancionesController.php', 

                        data : {"idGenero":idGenero},

                        type : 'POST',

                        dataType : 'text', 

                        success : function(data) {

                           

                            var json = data;

                            obj = JSON.parse(json);

                            var count = $('#bodyCanciones').children('tr').length;

                            $('#bodyCanciones').empty();

                             var totalToAdd = obj.length;

                            for(var i = 0; i < totalToAdd;i++)
                            {
                                $('#bodyCanciones').append('<tr> <td> </td> <td> </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr>');
                            }

                            
                            for(var i = 0; i < obj.length; i++)
                            {
                                

                                $('#bodyCanciones tr:eq('+ i+') td:eq(0)').text(obj[i].idcancion);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(1)').text(obj[i].nombrecancion);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(2)').text(obj[i].nombreartista);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(3)').text(obj[i].nombregenero);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(4)').text(obj[i].fechacomp);
                                $('#bodyCanciones tr:eq('+ i+') td:eq(5)').html('<span onclick="eliminar(this)" data-id="'+obj[i].idcancion+'"> <a href=""><i class="fa fa-trash-o"></i></a></span> <span onclick="actualizar(this)" data-toggle="modal" data-target="#modalActualizar" data-id="'+obj[i].idcancion+'" data-name="'+obj[i].nombrecancion+'" data-artist="'+obj[i].nombreartista+'" data-genero="'+obj[i].nombregenero+'" data-fecha="'+obj[i].fechacomp+'"> <a href=""><i class="fa fa-refresh"></i></a></span>');
                            }

                        }, 
                        error : function(xhr, status) {
                            alert('Disculpe, existió un problema');
                        }
                    });
                

             });


        </script>



    </body>

</html>
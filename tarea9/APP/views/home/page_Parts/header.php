<!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="../public/css/comments.css">
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
       <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
   </head>
   <body>

     <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <a class="navbar-brand" href="#">Start Bootstrap</a>
             </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav">

                   <?php if (!isset($_SESSION['user_id'])):?>

                  <ul class="nav navbar-nav navbar-right">
                    <li data-toggle="modal" data-target="#sign_In" class="mbr-navbar_item">
                      <a class="mbr-buttons_link">Registrarse??</a>
                    </li>
                    <li data-toggle="modal" data-target="#log_In" class="mbr-navbar_item">
                      <a class="mbr-buttons_link">Iniciar Sesion</a>
                    </li>
                    <li>
                      <a href="home/aboutUs" class="mbr-buttons_link">Sobre??</a>
                    </li>
                  </ul>

                <?php else: ?>
                     <ul class="nav navbar-nav navbar-right">

                           <li>
                             <a href = "home/perfil" class="mbr-buttons_link"><?php echo $_SESSION['user_info'][$_SESSION['user_id']]['user'] ?></a>
                           </li>
                           <li onclick="logOut()">
                             <a class="mbr-buttons_link">Desconectarse</a>
                           </li>
                           <li>
                             <a href="home/aboutUs" class="mbr-buttons_link">Sobre??</a>
                           </li>
                       </ul>
                 </ul>
               <?php endif ?>
             </div>
             <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
     </nav>

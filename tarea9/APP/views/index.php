
<!-- header and nav of the page modifiable-->
<?php include('../APP/views/home/page_Parts/header.php') ?>

 <!-- Page Content -->
 <div class="container">

   <!-- modals of the page modifiable -->
   <!-- modal Sign In -->
  <?php include('../APP/views/home/modals/sign_In.php') ?>
    <!-- modal Log In -->
  <?php include('../APP/views/home/modals/log_In.php') ?>

  <!-- body of the page -->

       <!-- for the space page -->
       <br>
       <br>
       <br>
         <div class="col-md-3">
             <p class="lead">Image perfil??</p>
             <div class="list-group">
      <img class="img-responsive" src="http://placehold.it/250x300" alt="">
             </div>
         </div>

         <div class="col-md-9">

           <div class="" id="commentDiv"></div>
           <!-- textarea and button -->
          <form class="" id="frmComment" action="#" method="post">

            <h3>Comenta!!!</h3>
            <textarea name="comment" id="comment" rows="6" cols="135" placeholder="Comenta!!!"></textarea>
            <button type="submit" class="btn btn-success" name="button" onclick="userComment()" <?php isset($_SESSION['user_id']) ? null : print "disabled"; ?>>Comentar</button></p>

          </form>
         	<!-- principal content -->
             <div class="comments-container">

               <!-- ul for comments -->
         		<ul id="comments-list" class="comments-list">
              <li>

              <?php $users = new users(); $users->getComments();?>

                <!-- comment princial end -->
                  </ul>
                </li>
         		</ul>
         	</div>
 <!-- /.container -->

 <!-- End of the body -->

 <!-- footer of the page modifiable -->
 <?php include('../APP/views/home/page_Parts/footer.php') ?>

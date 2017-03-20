// function of the user for login with ajax
function log_In()
{
  response;

   $("#frmLog_In").submit(function(event)
   {
      // stop the normal actions of form
      event.preventDefault();

        // complete the process with ajax
        $.ajax({
          url: 'users/logIn',
          type: 'POST',
          data: {data: $(this).serialize()}
        })
        .done(function(r)
        {
          if (r == 1)
          {
            // this just in case the user have shit of internet
            response = '<div class="alert alert-dismissible alert-success">';
            response += '<p><strong>ERROR</strong> Conectado!!!!...</p>';
            response += '</div>';
            $("#response").html(response);

            // reload the page
            location.reload(true);
          }

          else
          {
            $("#response").html(r);
          }

        });
  });
}

function sign_In()
{
  response;

   $("#frmSign_In").submit(function(event)
   {
      // stop the normal actions of form
      event.preventDefault();

          // complete the process with ajax
          $.ajax({
            url: 'users/signIn',
            type: 'POST',
            data: {data: $(this).serialize()}
          })
          .done(function(r)
          {

            if (r == 1)
            {
              // this just in case the user have shit of internet
              response = '<div class="alert alert-dismissible alert-success">';
              response += '<p><strong>ERROR</strong> Conectado!!!!...</p>';
              response += '</div>';

              console.log('did it');
              $("#responseR").html(response);

              // reload the page
              // location.reload();
            }

            else
            {
              $("#responseR").html(r);
            }

          });
   });
}

//for log out the user
function logOut()
{
  $.ajax({
    url: 'users/logOut',
    type: 'POST',
    data: {data: 'sd'}
  })
  .done(function(r)
  {
    // reload the connection
    location.reload();
  });
}

function userComment()
{
  $("#frmComment").submit(function(event)
  {
    event.preventDefault();

    $.ajax({
      cache: false,
      url: 'users/comment',
      type: 'POST',
      data: {data: $(this).serialize()}
    })
    .done(function(r)
    {
      if (r == 1)
      {
        response = '<div class="alert alert-dismissible alert-success">';
        response += '<p><strong>ERROR</strong> Comentado!!!!...</p>';
        response += '</div>';

        $("#commentDiv").html(response);
      }

      else
      {
        response = '<div class="alert alert-dismissible alert-danger">';
        response += '<p><strong>ERROR</strong> Problemas en el server!!!!...</p>';
        response += '</div>';

        $("#commentDiv").html(response);
      }

    })
    .fail(function() {
      response = '<div class="alert alert-dismissible alert-danger">';
      response += '<p><strong>ERROR</strong> Problemas en el server!!!!...</p>';
      response += '</div>';

      $("#commentDiv").html(response);
    })
    .always(function() {
      console.log("complete");
    });
    $("#frmComment").unbind('submit');
  });

}
function userReply(id)
{

  comment = $("#comment"+ id).val();

    $.ajax({
      cache: false,
      url: 'users/replieComment',
      type: 'POST',
      data: {data: comment, id:id}
    })
    .done(function(r)
    {
      if (r == 1)
      {
        response = '<div class="alert alert-dismissible alert-success">';
        response += '<p><strong>ERROR</strong> Comentado!!!!...</p>';
        response += '</div>';

        $("#commentDiv").html(response);
      }

      else
      {
        $("#commentDiv").html(r);
      }

    })
    .fail(function() {
      response = '<div class="alert alert-dismissible alert-danger">';
      response += '<p><strong>ERROR</strong> Problemas en el server!!!!...</p>';
      response += '</div>';

      $("#commentDiv").html(response);
    });

}

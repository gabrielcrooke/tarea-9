
function log_In()
{
  response;

   $("#frmLog_In").submit(function(event)
   {
      
      event.preventDefault();

        
        $.ajax({
          url: 'users/logIn',
          type: 'POST',
          data: {data: $(this).serialize()}
        })
        .done(function(r)
        {
          if (r == 1)
          {
            
            response = '<div class="alert alert-dismissible alert-success">';
            response += '<p><strong>ERROR</strong> Conectado!!!!...</p>';
            response += '</div>';
            $("#response").html(response);

          
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
      
      event.preventDefault();

          
          $.ajax({
            url: 'users/signIn',
            type: 'POST',
            data: {data: $(this).serialize()}
          })
          .done(function(r)
          {

            if (r == 1)
            {
            
              response = '<div class="alert alert-dismissible alert-success">';
              response += '<p><strong>ERROR</strong> Conectado!!!!...</p>';
              response += '</div>';

              console.log('did it');
              $("#responseR").html(response);

              
            }

            else
            {
              $("#responseR").html(r);
            }

          });
   });
}


function logOut()
{
  $.ajax({
    url: 'users/logOut',
    type: 'POST',
    data: {data: 'sd'}
  })
  .done(function(r)
  {
    
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

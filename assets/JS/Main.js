$(document).ready(function(){

    $("#search_box").keyup(function(){
    var search = $(this).val();
    $.ajax({
        url:'?p=pagination',
        cache:false,
        type:"POST",
        data:{query:search},
        beforeSend: function() {
          $('#search-results').html("<img src='./assets/images/loading.gif' style='width:20rem; margin-left:auto; margin-right:auto; display:block; '/>");
        },
        success:function(response){
          setTimeout(function() {
            $("#search-results").html(response);
          }, 2000);
        },
        error:function(xhr, textStatus, error){
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        }
    });
   });
});


  function load_data(page)
    {
      $.ajax({
        url:"?p=pagination",
        type:"POST",
        data:{page:page},
        success:function(data){
          $('#search-results').html(data);
        }
      });
    };
  
    $().on('click', '.pages-link', function(){
      var page = $(this).attr('id');
      load_data(page);
    });


    $(".poke").on("click", function(){
        var poke = $(this).attr('id');
        $(this).attr('disabled', 'disabled');
        $.ajax({
          url:'?p=poke',
          cache:true,
          type:"POST",
          dataType:'json',
          data:{poke:poke},
          success:function(){
            if(data !== true){
              alert('Poked ' + poke);
            }else{
              alert('You have poked this user already');
            }
          }
        })
    });
    

    $("#notification").on("click", function(event){
      event.preventDefault();
      $(".dropdown-wrap").toggle();
        $.ajax({
          url:'?p=notification',
          beforeSend: function() {
              $(".pokes-dropdown").html("<img src='./assets/images/loading.gif' style='width:10rem; margin:20px;'/>");
            },
            success:function(response){
            setTimeout(function() {
              $(".pokes-dropdown").html(response);
            }, 1500);
          }
          });
     });

  

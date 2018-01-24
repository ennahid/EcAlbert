


// bootbox.confirm({
//           title: "Message",
//           message: "Voulez vous supprimer ?",
//           buttons: {
//               cancel: {
//                   label: '<i class="fa fa-times"></i> Cancel'
//               },
//               confirm: {
//                   label: '<i class="fa fa-check"></i> Confirm'
//               }
//           },
//           callback: function (res) {
//             }
//       });

$(document).ready(function(){
  $('#remove_user').click(function(e) {
    console.log('hello');
    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
    });

  $.ajax({
        type:'POST',
        url: '{{route("Remove_user")}}',
        data:{
          'id': 7
        },
        success:function(r){
          alert('hello');
        },error:function(r) {
          alert('shit');
        }
  });

e.preventDefault();
  });


});
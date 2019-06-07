var postId = 0;
var token = '{{ Session::token() }}';
var urlLiKes = '{{ route("like") }}';
$('.like').on('click', function(event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['projectId'];
    var isVisit = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLikes,
        data: { isLikes: isLikes, projectId: projectId, _token: token}
     })
     .done(function() {

     });

     });



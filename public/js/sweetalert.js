$(document).ready(function(){

    $('.deleteWishlist').on('click', function(e){

        
        var id =  $(this).val();
        swal("DELETE", 'Are you sure!', {
            buttons: {
                Yes: "Delete",
                cancel: "No",
            },
        })
        .then((value) => {
            switch (value) {

            case "Yes":
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'DELETE',
                    url  : "/wishlist/"+id,
                    data : ({id : id}),
                    success: function(response) {                       
                        window.location.replace("/wishlist");
                    }
                });                
                break;

            case "cancel":
                window.location.replace("/wishlist");
                break;
            }
        });
    })
}); 

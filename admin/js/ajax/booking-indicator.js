

setInterval(function () {
    $.ajax({
        url: "post-and-get/ajax/booking.php",
        type: "POST",
        data: {
            action: 'GETNEWBOOKING'
        },
        dataType: "JSON",

        success: function (jsonStr) {
            if (!$.isEmptyObject(jsonStr)) {
                var booking_is = jsonStr[0].id;

                swal({
                    title: "You Have a New Booking.!",
                    text: "Please Check it Now..!",
                    type: "success",
                    confirmButtonColor: "rgb(53, 126, 189)",
                    confirmButtonText: 'View Booking!..',
                }, function () {
                    window.location = "view-booking.php?id=" + booking_is;
                });

                var html = '<audio controls autoplay style="display: none;"> \n\ \n\
                                <source src="https://www.w3schools.com/html/horse.mp3" type="audio/mpeg"> \n\
                                Your browser does not support the audio element.\n\
                            </audio>';
                $('body').append(html);

            }
        }
    });

}, 3000);
 
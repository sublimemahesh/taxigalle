
$(document).ready(function () {
    $('#district').change(function () {

        var disID = $(this).val();

        $.ajax({
            url: "post-and-get/ajax/city.php",
            type: "POST",
            data: {
                district: disID,
                action: 'GETCITYSBYDISTRICT'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                var html = '<option> -- Please Select a City -- </option>';
                $.each(jsonStr, function (i, data) {
                    html += '<option value="' + data.id + '">';
                    html += data.name;
                    html += '</option>';
                });
                $('#city-bar').empty();
                $('#city-bar').append(html);
            }
        });
    });
});


$(document).ready(function () {
    $('.city-bar').change(function () {

        var disID = $(this).val();
        var VehicleType = $(".vehicleType").val();
        
        $.ajax({
            url: "post-and-get/ajax/vehicle.php",
            type: "POST",
            data: {
                city: disID,
                vehicleType: VehicleType,
                action: 'GETVEHICLEBYCITY',              

            },
            dataType: "JSON",
            
            success: function (jsonStr) {
                
                var html = '<option> -- Please Select a Vehice -- </option>';
                $.each(jsonStr, function (i, data) {
                    html += '<option value="' + data.id + '">';
                    html += data.model_and_brand;
                    html += '</option>';
                });
                $('#vehicle-bar').empty();
                $('#vehicle-bar').append(html);
            }
        });
    });
});

$(document).ready(function(){

    $('[class*="error"]').css('color', 'red');
    
    $( function() {
        $( "#birthday" ).datepicker({
            changeYear: true,
            dateFormat: 'M d, yy'
        });
    } );

    var name = ['_token', 'name', 'nickname', 'weight', 'height', 'gender', 'color', 'friendliness', 'birthday'];

    $("#form :input").each(function(ndx){
        if(ndx >= name.length) return;

        this.setAttribute('name', name[ndx]);   
        this.setAttribute('id', name[ndx]);   
    });

    $('#form').validate({
        ignore: [],
        rules: {
            name: {
                required: true,
                remote: {
                    url:  window.location.origin + "/pet/validate",
                    data: {
                        pet_id: pet.pet_id,
                        name: $('name').val(),
                        action: option
                    },
                    type: "GET"
                }
            },
            nickname: {
                required: true,
                minlength: 2
            },
            weight: {
                required: true,
                number: true
            },
            height: {
                required: true,
                number: true
            },
            gender: {
                required: true,
            },
            color: {
                minlength: 2
            },
            birthday: {
                required: true,
            },
            
        },
        messages: {
            name: {
                required: "Name is required",
                remote: "Name is already taken",
            },
            nickname: {
                minlength: "Nickname must be at least 2 characters",
            },

        },
        errorPlacement: function(error, element) {
            if (element.attr("id") == 'name') {
                error.appendTo(".name_error");
            }
            if (element.attr("id") == 'nickname') {
                error.appendTo(".nickname_error");
            }
            if (element.attr("id") == 'weight') {
                error.appendTo(".weight_error");
            }
            if (element.attr("id") == 'height') {
                error.appendTo(".height_error");
            }
            if (element.attr("id") == 'gender') {
                error.appendTo(".gender_error");
            }
            if (element.attr("id") == 'color') {
                error.appendTo(".color_error");
            }
            if (element.attr("id") == 'friendliness') {
                error.appendTo(".friendliness_error");
            }
            if (element.attr("id") == 'birthday') {
                error.appendTo(".birthday_error");
            }
        },
        submitHandler: function(form, e) {
            e.preventDefault();

            $("#form :input").each(function(ndx){
                if(ndx >= name.length) return;
                this.setAttribute('name', name[ndx]);   
                this.setAttribute('id', name[ndx]);   
    
            });

            $.ajax({
                type: type,
                url: action,
                data: $("#form").serialize(), 
                success: function(response) { 
                   window.location.replace(response);
                },
            });
        }
    });

});
$(function() {
    $('#addChild').click(function (){
        event.preventDefault();
        var url = 'http://localhost:8000/api/add/child'
        var dob = $('#dob').val();
        var token = $('#token').val();
        var gender = $('input[name=child_gender]:checked').val();
        $.ajax({
            type: "POST",
            headers: {
                'Authorization': `Bearer ${token}`,
            },
            dataType: "json",
            url: url,
            data: {gender: gender, dob: dob},
            success: function (data) {
                $('#child_id').val(data.child)
                console.log(data)
            },
            fail: function (data) {
                console.log(data)
            }
        });
    });
    $('#child-intrest').click(function (){
        event.preventDefault();
        var url = 'http://localhost:8000/api/add/child-interest'
        var interest = [];
        var token = $('#token').val();
        var child = $('#child_id').val();

        $('input[name="interest"]:checked').each(function() {
            interest.push(this.value);
        });
        $.ajax({
            type: "POST",
            headers: {
                'Authorization': `Bearer ${token}`,
            },
            dataType: "json",
            url: url,
            data: {interest: interest, child: child},
            success: function (data) {
                console.log(data)
            },
            fail: function (data) {
                console.log(data)
            }
        });
    });

});

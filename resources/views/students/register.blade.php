@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register Student</div>

                <div class="card-body">
                        
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email :</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Address :</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="course">Course Study :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="course" placeholder="Enter course" name="course">
                        </div>
                    </div>

                    <div class="form-group pt-1">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button onclick="addStudent()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>

    $( document ).ready(function() {
        console.log( "ready!" );
    });

    function addStudent(){

        url = "http://localhost:8000/api/student";

        name  = $('#name').val();
        email  = $('#email').val();
        address  = $('#address').val();
        course  = $('#course').val();

        datas = {
            'name':name,
            'email':email,
            'address':address,
            'course':course
        };

        $.ajax({
            url: url,
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzNhY2Q3ZTU1OTJhZWY1YWM5YmQwZGNiYWY3YzJlZDAwNGJlMGUzMmIyMTNlOTQ4NTIzY2MwNzVmNjFjYmY2NjZiZmZmM2IxMDBkMjM1NGQiLCJpYXQiOjE2NzM0NjI3MTEuNzE2NTI3LCJuYmYiOjE2NzM0NjI3MTEuNzE2NTMsImV4cCI6MTcwNDk5ODcxMS42NzUxMjEsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.dVp0aeaZ3QASdS4DuiW_CZg82JCW1Q63Kh9HT6VGVfzX9x2w1LwSJpwpDxaGZ-zBM08dl6uBsFO_XPzjz7qGhF8UrLcjUCUAN7SOzqt3HRZPVx6V9Roa2wIdT2uCK3E2dfXg3AlsITV3Z14iGSOWA5YI6ZebCez_PbeUBMF3njmi2JQX-m7FSIG4TJ9iyFuCCrKIoXe4IQg5iGEkbzqi-MofaGKBmbnj_JfoZcqWAXHREOu3U-LWZLU6TyoXjbT4eVTLVbMF4IXDBYhjdz3tJdN01JNvhRBVJdq7uCk14rLuJkTKFS8IBJ370ENpmG0U8S0HoogzA7YJW7HolQdbCXwLo9zra1AEBY8P4vjWXu9wzOzpHWsw9kcZIbqV6yujkTj8i-SSGHVXLwe76pDV2oF9UYUwpC93RiZAczCTyOGcKrXab6gxJInrCIE2OvDmnER5TKNIYSjqzmiISw73HVF82TuwXDdkbSpfW0EqgslxW_-KofH8v8DmdB1wWP4SLIPFvEWU9bAuW0vAcwNpIG_1uOOAsel0USRo35ZnANW6y72H2O8_J_I5DT6OWnknf7oPnhnDA6FgcrH6vwzD-82vUmFQ-IVfIqHq2UtwFkloSTt2QdoQel9gB8Xy52CBuf_hFZ8LEVb_65cwX4RYatJEBk6Ri_hpyd9U-ZjkNo4');
            },
            dataType: 'json',
            data: JSON.stringify(datas),
            crossDomain: true,
            contentType : 'application/json',
            success: function(result){

                console.log(result['message'].toLowerCase());

                msg = result['message'].toLowerCase();
                
                if(msg == 'success'){
                    alert('Student has been successfully registered.');
                }else{
                    alert('Error occured: Please try again.');
                }

            }
        });



    }

</script>

@endsection
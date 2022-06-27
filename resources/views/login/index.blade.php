<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRM | Circle Reseller Management</title>
    {{-- bootstrap links --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    input.ss{
        border-radius: 0px!important;
        font-size: 80%;
        font-weight: 400;
    }
   #btn{
    background-color: #3c8dbc;
    border-color: #204d74;
    border-radius: 0px!important;
}
.custom-mt{
    margin-top:10%;
}

;
}
</style>
</head>
<body  style="background-image: url('https://i.ibb.co/cvk0VBD/circle-min.jpg');height: 100vh; background-position: center;background-repeat: no-repeat;background-size:cover;">

<div class="container">
    <div class="login-box">
        <div class="login-logo">
            <p id="date"></p>
        <p id="time" class="bold"></p>
        </div>

    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4 bg-white py-5 custom-mt">
                <h3 class="font-weight-bold text-center">User Login Panel</h3>
                <p class="text-secondary text-center mt-4 mb-3 small">Sign in to start your session</p>
                <form action="{{url('user/login')}}" method="POST">
                    @csrf
                    @if(Session::get('fail'))
                     <div class="alert alert-danger">
                         {{Session::get('fail')}}
                     </div>
                     @endif
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control ss small" placeholder="Input Email" value="{{old('email')}}"   autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text" for="inputGroupSelect02"><i class="fa fa-user" aria-hidden="true"></i></span>
                          </div>
                      </div>
                      <span class="text-danger mt-2">@error('email'){{$message}} @enderror</span>

                      <div class="input-group mb-3 mt-2">
                        <input type="password" name="password" class="form-control small ss"  placeholder="Input password">
                        <div class="input-group-append">
                            <span class="input-group-text" for="inputGroupSelect02"><i class="fa fa-lock" aria-hidden="true"></i></span>
                          </div>
                      </div>
                      <span class="text-danger mt-2 mb-3">@error('password'){{$message}} @enderror</span>

                      <select class="custom-select custom-select-sm mb-4 mt-2" name="user-type" required>
                        <Option value="">Please Select Your Role</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                          </select>
                      </select>

            <button type="submit" class="btn btn-primary btn-flat" id="btn">
            <i class="fa fa-sign-in" aria-hidden="true"></i><span class="ml-2">Sign In</span></button>
            
        </form>
           
        </div>
        <div class="col-md-4"></div> 
    </div>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>       
<!-- Moment JS -->
<script src="bower_components/moment/moment.js"></script>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

;
    
});
</script>
</body>
</html>
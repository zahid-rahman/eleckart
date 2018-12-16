
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor registration</title>

    @include('layouts.design')
</head>
<body>


<div class="container">
    <h2>Vendor registration </h2>
    <form action="{{route('vendor.register.add')}}" method="POST">

        {{csrf_field()}}

        <div class="form-group">
            <label for="pwd">company name:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter company name" name="v_com_name">
            <p style="color:red">
                @if($errors->any())
                    {{$errors->first('v_com_name')}}
                @endif

            </p>

        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter vendor email" name="email">
            <p style="color:red">
                @if($errors->any())
                    {{$errors->first('email')}}
                @endif

            </p>

        </div>

        <div class="form-group">
            <label for="pwd">phone no:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter phone number" name="v_phone">

            <p style="color:red">
                @if($errors->any())
                    {{$errors->first('v_phone')}}
                @endif

            </p>
        </div>


        <div class="form-group">
            <label for="pwd">Address:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter address" name="v_address">
            <p style="color:red">
                @if($errors->any())
                    {{$errors->first('v_address')}}
                @endif

            </p>

        </div>


        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="v_pass">
            <p style="color:red">
                @if($errors->any())
                    {{$errors->first('v_pass')}}
                @endif

            </p>

        </div>


        <div class="form-group">

            <input style="display: none" type="text" class="form-control" id="pwd" name="v_role" value="vendor">
        </div>


        <input type="submit" class="btn btn-default" value="submit">
    </form>
</div>

</body>
</html>
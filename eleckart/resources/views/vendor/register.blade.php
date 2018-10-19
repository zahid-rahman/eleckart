
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('layouts.design')
</head>
<body>
<div class="container">
    <h2>Vendor registration </h2>
    <form action="" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter vendor email" name="v_email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="v_pass">
        </div>

        <div class="form-group">
            <label for="pwd">company name:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter company name" name="v_com_name">
        </div>

        <div class="form-group">
            <label for="pwd">phone no:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter phone number" name="v_phone">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Add Employee</h3>
    <form method="POST" action="{{ route('create.employee') }}">
        @csrf
        <div class="mb-3 row">
            <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="firstname">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="lasname">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="company" class="col-sm-2 col-form-label">Company</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="company">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
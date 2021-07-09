<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Add Company</h3>
    <form method="POST" action="{{ route('create.company') }}">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Company Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="logo" class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="logo">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="website" class="col-sm-2 col-form-label">Website</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="website">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
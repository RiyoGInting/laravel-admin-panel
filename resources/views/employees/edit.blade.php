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
    <form method="POST" action="{{ route('update.employee') }}">
        @csrf
        @foreach($employee as $e)

        <div class="mb-3 row">
            <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="first_name" placeholder={{$e->first_name}}>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="last_name" placeholder={{$e->last_name}}>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="company_id" class="col-sm-2 col-form-label">Company</label>
            <div class="col-sm-10">
                <select name="company_id" id="company_id">
                    <option selected="selected">Choose one</option>
                    @foreach ($company as $c)
                    <option value="{{ $c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" placeholder={{$e->email}}>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" placeholder={{$e->phone}}>
            </div>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
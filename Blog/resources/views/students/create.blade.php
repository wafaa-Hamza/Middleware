<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <title>To-Do List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>







    <div class="container">
        <h2>To-DoList</h2>

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ url('student/create') }}" method="post" enctype="multipart/form-data">

            @csrf
@method('Get')

            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="title"
                    placeholder="Enter Title" value="{{ old('title') }}">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Content</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="10" >  {{old('content')}}  </textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file"id="exampleInputPassword1" name="image">
            </div>
			
			<div class="form-group">
                <label for="exampleInputName">Start Date</label>
                <input type="date" class="form-control" id="exampleInputName" aria-describedby="" name="startdate"
                    placeholder="Enter Startdate" value="{{ old('startdate') }}">
            </div>
			
			<div class="form-group">
                <label for="exampleInputName">End Date</label>
                <input type="date" class="form-control" id="exampleInputName" aria-describedby="" name="enddate"
                    placeholder="Enter Endtdate" value="{{ old('enddate') }}">
            </div>
			


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


    <br>






</body>

</html>
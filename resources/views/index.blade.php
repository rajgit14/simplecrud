<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 align="center" style="color:red;">Listing Page</h1> <br>


    <div class="container">

        <table class="table table-hover table-bordered table-striped table-secondary" >
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>profile_picture</th>
                <th>date_of_birth</th>
                <th>gender</th>
                <th>city</th>
                <th>hobbies</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach($products as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>{{$pro->email}}</td>
                <td><img src="{{asset('uploads/employee/'.$pro->profile_picture)}}" height="100px" width="100px" alt=""></td>
                <td>{{$pro->date_of_birth}}</td>
                <td>{{$pro->gender}}</td>
                <td>{{$pro->city}}</td>
                <td>{{$pro->hobbies}}</td>
                <td><a href={{"delete/".$pro->id}} onclick="return abc();"><button class="btn btn-danger">Delete</button></a></td>
                <td> <a href={{"edit/".$pro->id}}><button class="btn btn-primary">Edit</button></a></td>
            </tr>
            @endforeach
        </table>

        <center>
    <span>
        {{$products->links()}}
    </span>
</center>
<style>
    .w-5{display:none;}
</style>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
    <script>
        function abc()
        {
            return confirm('are u sure u want to delete?');
        }
    </script>



</body>

</html>
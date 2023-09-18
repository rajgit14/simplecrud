<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color:grey;">
    <h1 align="center" style="color:red;">Update Employee Details</h1> <br>
    

    <div class="container">
        
    @php
    $hobby=explode(',',$editing->hobbies);
    @endphp  
        
        <form action="/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                     <input type="hidden" class="form-control" name="id" value="{{$editing->id}}"  />
                </div>
                
            </div> <br>

            <div class="row">
                <div class="col-md-6">
                    Name: <input type="name" class="form-control" placeholder="name" name="name" value="{{$editing->name}}"  />
                </div>
                <div class="col-md-6">
                <span style="color:green;">@error('name'){{$message}} @enderror</span>
                </div>
            </div> <br>

            <div class="row">
                <div class="col-md-6">
                    Email: <input type="email" class="form-control" placeholder="email" name="email" value="{{$editing->email}}" required />
                </div>

                <div class="col-md-6">
                <span style="color:green;">@error('email'){{$message}} @enderror</span>
                </div>
            </div> <br>

            <div class="row">
                <div class="col-md-6">
                    Password: <input type="password" class="form-control" placeholder="password" name="password" value="{{$editing->password}}" required />
                </div>

                <div class="col-md-6">
                <span style="color:green;">@error('password'){{$message}} @enderror</span>
                </div>
            </div> <br>

            <div class="row">
                <div class="col-md-6">
                    Confirm Password: <input type="password" class="form-control" placeholder="password_confirmation" name="password_confirmation" value="{{$editing->password}}" required />
                </div>
            </div> <br>

            <div class="row">
                <div class="col-md-6">
                    Image: <input type="file" class="form-control" name="profile_picture" /><br> <br>
                    <img src="{{asset('uploads/employee/'.$editing->profile_picture)}}" height="100px" width="100px" alt="">
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    Date Of Birth: <input type="date" class="form-control" name="date_of_birth" value="{{$editing->date_of_birth}}" required />
                </div>
            </div> <br>

            <div class="row">
                Gender:<div class="col-md-6">
                    Male<input type="radio" name="gender" value="male" {{$editing->gender=='male'?'checked':""}}>
                    Female<input type="radio" name="gender" value="female" {{$editing->gender=='female'?'checked':""}} >
                </div>
            </div> <br>

            <div class="row">
                City:<div class="col-md-6">
                    <select name="city" class="form-control">
                        <option value="select" > Select</option>
                        <option value="rajkot" {{$editing->city=='rajkot'?'selected':''}}>Rajkot</option>
                        <option value="ahmedabad"{{$editing->city=='Ahmedabad'?'selected':""}}> Ahmedabad</option>
                        <option value="surat"{{$editing->city=='Surat'?'selected':""}}> Surat</option>
                        <option value="Mumbai"{{$editing->city=='Mumbai'?'selected':""}}> Mumbai</option>
                    </select>
                </div>
            </div> <br>


            <div class="row">
                Hobbies:<div class="col-md-6">
                    cricket <input type="checkbox" name="hobbies[]" value="cricket" {{in_array('cricket',$hobby)?'checked':''}}>
                    football <input type="checkbox" name="hobbies[]" value="football" {{in_array('football',$hobby)?'checked':''}}>
                    music <input type="checkbox" name="hobbies[]" value="music" {{in_array('music',$hobby)?'checked':''}}>
                </div>
            </div> <br>

            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success" style="margin-right:10px;">Update</button>
                </div>
            </div> <br>
        </form>

        

        
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>
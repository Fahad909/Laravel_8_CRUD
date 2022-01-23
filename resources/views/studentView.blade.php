<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students::CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Student List</h1>
                <a href="{{url('/')}}" class="btn btn-success">Add Student</a>
                <br><br>
                @if(Session::has('msg'))
                <p class="alert alert-success">{{Session::get('msg')}}</p>
           @endif
           
                <table class="table table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Reg</th>
                        <th scope="col">Depatment</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Session</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($StudentView as $ItemView)
                        <tr>
                          <th scope="row">{{$ItemView->id}}</th>
                          <td>{{$ItemView->name}}</td>
                          <td>{{$ItemView->roll}}</td>
                          <td>{{$ItemView->registion}}</td>
                          <td>{{$ItemView->depatment}}</td>
                          <td>{{$ItemView->semester}}</td>
                          <td>{{$ItemView->session}}</td>

                          <td>
                            <a href="tel:{{$ItemView->phone}}" title="{{$ItemView->phone}}"><i class="fas fa-mobile"></i></a>
                          </td>

                          <td>
                            <a href="mailto:{{$ItemView->email}}" title="{{$ItemView->email}}"><i class="fas fa-envelope-open-text"></i></a>
                          </td>

                          <td>
                            <a href="#" title="{{$ItemView->created_at}}"><i class="far fa-calendar-alt"></i></a>
                          </td>

                          <td>
                            <img class="rounded-circle"  src="{{asset('uploads/students/'.$ItemView->profile)}}" width="70px" height="70px" alt="Profile Picture">
                          </td>

                          <td>
                            <a class="btn btn-success btn-sm" href="{{url('/studentedit/'.$ItemView->id)}}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{url('/studentdelete/'.$ItemView->id)}}">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  {{$StudentView->links()}}
                  {{-- {{$StudentView->onEachSide(10)->links()}} --}}

            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
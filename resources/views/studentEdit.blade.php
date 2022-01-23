<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Students::CRUD</title>
</head>
<body>

    <div class="container">
        <div class="row">
           <div class="col-md-12">
             <marquee behavior="scroll" scrollamount="12" direction="left"><h1>Students information Update</h1></marquee>
             
             <a href="{{url('/student_view')}}" class="btn btn-primary my-3">Show Data</a>
            <br>
                    @if(Session::has('msg'))
                         <p class="alert alert-success">{{Session::get('msg')}}</p>
                    @endif

                <form action="{{ url('/update/'.$studentEdit->id ) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name </label>
                                <input type="text" name="name" class="form-control" value="{{ $studentEdit->name }}" id="name" placeholder="Full Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror          
                              </div>
          
                              <div class="mb-3">
                                <label for="roll" class="form-label">Roll Number</label>
                                <input type="number" name="roll" value="{{ $studentEdit->roll }}" class="form-control" id="roll" placeholder="Roll Number">
                                @error('roll')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="mb-3">
                                <label for="registion" class="form-label">Registion Number </label>
                                <input type="number" name="registion" value="{{ $studentEdit->registion }}" class="form-control" id="registion" placeholder="Registion Number">
                                @error('registion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="mb-3">
                                <label for="depatment" class="form-label">Depatment </label>
                                <input type="text" name="depatment" value="{{ $studentEdit->depatment }}" class="form-control" id="depatment" placeholder="Depatment">
                                @error('depatment')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
          
                              <div class="mb-3">
                                <label for="semester" class="form-label">Semester </label>
                                <input type="number" name="semester" value="{{ $studentEdit->semester }}" class="form-control" id="semester" placeholder="Semester">
                                @error('semester')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror          
                              </div>

                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="session" class="form-label">Session </label>
                                <input type="number" name="session" value="{{ $studentEdit->session }}" class="form-control" id="session" placeholder="Session">
                                @error('session')
                                     <div class="text-danger">{{ $message }}</div>
                                @enderror          
                              </div>
          
                              <div class="mb-3">
                                <label for="phone" class="form-label">Mobile Number </label>
                                <input type="number" name="phone" value="{{ $studentEdit->phone }}" class="form-control" id="phone" placeholder="Mobile Number">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
          
                              <div class="mb-3">
                                <label for="email" class="form-label">Email address </label>
                                <input type="email" name="email" value="{{ $studentEdit->email }}" class="form-control" id="email" placeholder="Email Address">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror          
                              </div>

                              <div class="mb-3">
                                <label for="profile" class="form-label">Profile Picture </label>
                                <input type="file" value="{{asset('uploads/students/'.$studentEdit->profile)}}" name="profile" class="form-control" id="profile" >
                                @error('profile')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
          
                              <div class="mb-3">
                                <label for="password" class="form-label">Password </label>
                                <input type="password"  name="password" id="password" class="form-control"  placeholder="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>  

                        </div>
                        <button type="submit" class="btn btn-primary" value="submit">Upadate</button>
                    </div>

                  </form>
                  <br>
            </div>
          </div>
</div>


 



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>   
@extends('admin.template')

@section('title', 'Edit Profile')



@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">

                        <div class="col-md-6 text-center">
                            <a href="{{ route('users') }}" class="btn btn-dark mx-5">Back</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <h2 class="text-white ">Edit User <span style="color: #000;">{{ $user->name }}</span> </h2>
                        </div>

                </div>
              </div>

          <div class="card-body px-0 pb-2">



                <form id="update" class="mx-5 mt-5" action="{{ route('user.profile-update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-md-3 mb-5">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" placeholder="Your Name" id="name" style="background-color: #E8E8E8;" required>
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3 mb-5">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email  }}" placeholder="Exemple@gmail.com" id="email" style="background-color: #E8E8E8;" required>
                                @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2 mb-5">
                            <label for="phone" class="form-label">Phone</label>
                            <input name="phone" type="number" class="form-control @error('number') is-invalid @enderror" value="{{ $user->phone  }}" placeholder="Your Phone" id="phone" style="background-color: #E8E8E8;" required>
                            @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2 mb-5">
                            <label for="address" class="form-label">Address</label>
                            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address  }}" placeholder="Your Address" id="address" style="background-color: #E8E8E8;" required>
                            @error('address')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- ############################################### --}}
                        {{-- upload image --}}
                        <div class="form-group col-md-4 mb-5">
                            <div id="img-preview">
                                <img id="photo-preview" src="{{ '/images/users/' . $user->photo }}" alt="" style="max-width: 200px; max-height: 200px;">
                            </div>
                            <div class="custom-file">
                                <input class="form-control" accept="image/*" name="photo" type="file" id="photoFile" style="background-color: #E8E8E8;">
                                <label for="formFile" class="form-label">Upload Image</label>
                            </div>
                         </div>

                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary ">Update User</button>
                    </div>
                  </form>

                  <hr class="mt-3 mb-3">


          </div>

          <div class="card-footer">
            <h2 class="text-center">Edit Password</h2>

            <form id="reset" class="mx-5 mt-5" action="{{ route('user.reset-password') }}" method="POST">
                @csrf
                @method('put')
                <div class="row">

                    <div class="form-group col-md-3 mb-5">
                        <label for="password" class="form-label">Old Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}" placeholder="Old Password" id="password" style="background-color: #E8E8E8;" required>
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input name="passwordnew" type="password"
                            class="form-control @error('password') is-invalid @enderror" id="passwordnew"
                            placeholder="New Password" style="background-color: #E8E8E8;">
                        @error('passwordnew') <span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="passwordnew_confirmation">Confirm Password</label>
                        <input name="passwordnew_confirmation" type="password" style="background-color: #E8E8E8;"
                            class="form-control @error('passwordnew_confirmation') is-invalid @enderror"
                            id="passwordnew_confirmation" placeholder="Confirm Password">
                        @error('passwordnew_confirmation') <span
                            class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    {{-- <div class="form-group col-md-3 mb-5">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation" id="password_confirmation" style="background-color: #E8E8E8;" required>
                        @error('password_confirmation')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="form-group col-md-3 text-center mt-4">
                        <button type="submit" class="btn btn-primary ">Update Password</button>
                    </div>

                </div>

            </form>

          </div>

        </div>
      </div>
    </div>
</div>

@endsection

@section('customJs')

<script src="https:cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script>
    const chooseFile = document.getElementById("photoFile");
    const imgPreview = document.getElementById("img-preview");

    chooseFile.addEventListener("change", function () {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
            imgPreview.style.display = "block";
            imgPreview.innerHTML = '<img src="' + this.result + '" style="max-width: 200px; max-height: 200px;"/>';
            });
        }
    }
</script>

@endsection

@extends('admin.template')

@section('title', 'Create Users')



@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h2 class="text-white text-capitalize ps-3">Add new User</h2>
            </div>
          </div>

          <div class="card-body px-0 pb-2">



                <form class="mx-5 mt-5" action="{{ route('users.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3 mb-5">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Your Name" id="name" style="background-color: #E8E8E8;" required>
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3 mb-5">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Exemple@gmail.com" id="email" style="background-color: #E8E8E8;" required>
                                @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2 mb-5">
                            <label for="phone" class="form-label">Phone</label>
                            <input name="phone" type="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Your Phone" id="phone" style="background-color: #E8E8E8;" required>
                            @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2 mb-5">
                            <label for="address" class="form-label">Address</label>
                            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Your Address" id="address" style="background-color: #E8E8E8;" required>
                            @error('address')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2 mb-5">
                            <label for="exampleInputRole1" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select  @error('role') is-invalid @enderror form-select-lg mb-3" value="{{ old('role') }}" aria-label=".form-select-lg example" style="background-color: #E8E8E8;" required>
                                <option value="admin">Admin</option>
                                <option selected value="author">Author</option>
                                <option value="edit">Edit</option>
                            </select>
                            @error('role')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- ############################################### --}}
                        {{-- upload image --}}
                        <div class="form-group col-md-4 mb-5">
                            <div id="img-preview">
                                <img id="photo-preview" src="/images/users/default.jpg" alt="" style="max-width: 200px; max-height: 200px;">
                            </div>
                            <div class="custom-file">
                                <input class="form-control" accept="image/*" type="file" name="photo" id="photoFile" style="background-color: #E8E8E8;">
                                <label for="formFile" class="form-label">Upload Image</label>
                            </div>
                            @error('photo') <span class="text-danger small">{{ $message }}</span>@enderror
                         </div>

                        <div class="form-group col-md-3 mb-5">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" style="background-color: #E8E8E8;" required>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3 mb-5">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmated') is-invalid @enderror" id="password_confirmated" style="background-color: #E8E8E8;" required>
                            @error('password_confirmation')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary ">Create User</button>
                    </div>
                  </form>

                  <hr class="mt-3 mb-3">

            <a href="{{ route('users') }}" class="btn btn-dark mx-5">Back</a>
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

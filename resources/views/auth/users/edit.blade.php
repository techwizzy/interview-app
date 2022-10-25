<x-app-layout>


    <div class="card card-default">

        <div  style="border-bottom:1px dashed #ccc; padding:10px" >
             <h5 class="card-title">Edit User</h5>
        </div>


      <!-- /.card-header -->
      <div class="card-body">


        @if (count($errors) > 0)
        <div class="alert alert-icon bg-white text-danger alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="mdi mdi-block-helper mr-2"></i>
            <strong>Attention!</strong> Correct these issues and try submitting again.
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif



        <form action="{{ route('access.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input name="name"
                    type="text"
                    value="{{$user->name}}"
                    class=" form-control @error('name') is-invalid @enderror">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input name="email"
                    type="email"
                    value="{{$user->email}}"
                    class="form-control @error('email') is-invalid   @enderror">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="alert alert-info">
                        <i class="fas fa-info"></i>
                        Fill password fields only when changing the password!
                    </div>
                    <strong>Password:</strong>
                    <input name="password"
                    type="password"
                    placeholder="password"
                    class="form-control @error('password') is-invalid  @enderror">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input name="confirm-password"
                              type="password"
                              placeholder="confirm password"
                              class="form-control @error('confirm-password') is-invalid  @enderror">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Role:</label>

                    <select name="roles[]"  class="form-control select2-multiple" data-toggle="select2"  multiple="multiple" data-placeholder="Select Role">
                        <optgroup label="Roles">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" <?php if(in_array($role, $userRoles->toArray())) { ?> selected="true" <?php } ?>>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-outline-primary  btn-sm btn-flat">Save changes</button>
            </div>
        </div>
        </form>
      </div>
    </div>
</x-app-layout>

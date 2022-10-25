<x-app-layout>



    <div class="card card-default">
      <div  class="card-header" >
        <span class="m-5 p-10" >Create New User</span>

      </div>
      <!-- /.card-header -->
      <div class="card-body">


              <form method="POST" action="{{route('access.users.store')}}">
                  @csrf
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <label>Name:</label>

                              <input name="name"
                                      type="text"
                                      placeholder="Fullname"
                                      class=" form-control  ">
                          </div>
                      </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label>Email:</label>

                          <input name="email"
                                  type="email"
                                  placeholder="Email"
                                  class="form-control ">
                      </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                          <label>Password:</label>
                          <input name="password"
                                  type="password"
                                  placeholder="password"
                                  class="form-control  ">

                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6">
                      <div class="form-group">
                          <label>Confirm Password:</label>
                          <input name="confirm-password"
                              type="password"
                              placeholder="confirm password"
                              class="form-control  ">
                      </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <label>Role:</label>

                          <select name="roles[]" multiple data-role="tagsinput" multiple="multiple" data-placeholder="Select a Role" style="width: 100%;">
                              @foreach ($roles as $role)
                                  <option value="{{ $role }}" @selected(old('roles') == $role)>
                                      {{ $role }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 ">
                      <button type="submit" class="btn btn-primary btn-xs"><i class="mdi mdi-checkbox-marked-circle-outline" style="font-size: 18px"></i> Save</button>
                  </div>
              </div>
              </form>
      </div>
    </div>



</x-app-layout>


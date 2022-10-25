<x-app-layout>
    <!-- start  -->
    <div class="row">
       <div class="col-12">
           <div style="border-bottom:1px dashed #ccc; padding-bottom:35px">
            <div style="padding-bottom: 5px;">
                <h4 class="float-left">Roles</h4>
                        <span class="float-right" ><a href="#" data-toggle="modal" data-target="#addRoles" class="btn btn-xs btn-primary"><i class="mdi mdi mdi-plus-circle-outline"></i>Add Role </a></span>
            </div>
           </div>
       </div>
   </div>
   <!-- end row -->

   <div class="row">
       <div class="col-12">
           <div class="mt-5">


        <div class="modal fade" id="addRoles" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <form method="POST" action="{{ route('access.roles.store') }}">
                    @csrf
                <div class="modal-content" style="min-width: 400px">
                    <div class="modal-header header-title">
                        <h5 class="modal-title mt-0" id="addRoles">Add Role</h5>

                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input value="{{ old('name') }}"
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name" required>
                        </div>

                        <label for="permissions" class="form-label">Assign Permissions</label>

                        <table class="table table-bordered">
                            <thead>
                                <th scope="col" width="1%">
                                    <div class="checkbox checkbox-info checkbox-single  checkbox-circle">
                                    <input type="checkbox" name="all_permission">
                                    <label></label>
                                    </div>
                                </th>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="1%">Guard</th>
                            </thead>

                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info checkbox-single  checkbox-circle">
                                        <input type="checkbox"
                                        name="permission[{{ $permission->name }}]"
                                        value="{{ $permission->name }}"
                                        class='permission'>
                                        <label></label>
                                        </div>
                                    </td>
                                    <td class="modal-text">{{ $permission->name }}</td>
                                    <td class="modal-text">{{ $permission->guard_name }}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal"><i class="mdi mdi-close"></i>Close</button>
                        <button type="submit" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-checkbox-marked-circle-outline"></i>Add Role</button>
                        </div>
                </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <table id="dataTable" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
         <thead>

             <th width="1%">No</th>
             <th>Name</th>
             <th>Action</th>

         </thead>
         <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>

                    <a   href="{{ route('access.roles.edit', $role->id) }}"><i class="fas fa-edit"></i></a>
                </td>

            </tr>
            @endforeach
         </tbody>
        </table>


    </div>
</div>
</div>


<script>
    $(document).ready(function() {



        $('[name="all_permission"]').on('click', function() {

            if($(this).is(':checked')) {
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            } else {
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }

            });

    });
    </script>


</x-app-layout>

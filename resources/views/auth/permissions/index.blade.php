<x-app-layout>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">

            <div  style="border-bottom:1px dashed #ccc; padding:10px" >
                <div class="card-title">
                    <div >
                        Manage your permissions here.
                        <a href="{{ route('access.permissions.create') }}" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#addPermissions"><i class="mdi mdi mdi-plus-circle-outline"></i>Add permissions</a>
                     </div>
                  </div>
             </div>

            <div class="modal fade" id="addPermissions" tabindex="-1" role="dialog" aria-labelledby="addPermissions" aria-hidden="true" >
                <div class="modal-dialog modal-dialog-scrollable" >
                    <form method="POST" action="{{ route('access.permissions.store') }}">
                        @csrf
                        <div class="modal-content" style="min-width: 400px">
                            <div class="header-title">
                                <div class="modal-title mt-0 text-center p-2"   id="addPermissions">Add Permission</div>

                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input value="{{ old('name') }}"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        placeholder="Name" required>

                                    @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal"><i class="mdi mdi-close"></i>Close</button>
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-checkbox-marked-circle-outline"></i>Add Permission</button>
                                </div>
                        </div><!-- /.modal-content -->
                   </form>
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Guard</th>
                    <th scope="col"><i class="mdi mdi-view-sequential" style="font-size: 20px"></i></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td><a href="{{ route('access.permissions.edit', $permission->id) }}" ><i class="fas fa-edit"></i></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table = $('#permissionsTable').DataTable({
          processing: true,
          serverSide: false,
          dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [ {
                extend:    'excel',
                text:      '<i class="mdi mdi-file-excel-outline text-success"></i>Excel',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'pdf',
                text:      '<i class="mdi mdi mdi-file-pdf-box-outline text-danger"></i>PDF',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'print',
                text:      '<i class="mdi mdi-printer text-primary"></i>Print',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'colvis',
                text:      '<i class="mdi mdi-eye-off-outline text-warning"></i>Columns',
                className: 'btn btn-flat btn-sm btn-light'
            },

    ],
    lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ]

      });

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

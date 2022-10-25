

<x-app-layout>
    <!-- start  -->
    <div class="row">
       <div class="col-12">
           <div style="border-bottom:1px dashed #ccc; padding-bottom:35px" >
           <div style="padding-bottom: 10px;">
               <h4 class="float-left">Users</h4>
                       <span class="float-right" ><a href="{{ route('access.users.create') }}" class="btn btn-xs btn-primary">Add user </a></span>
           </div>

           </div>
       </div>
   </div>
   <!-- end row -->

   <div class="row">
       <div class="col-12">
           <div class="mt-5">

               <table id="dataTable" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                   <thead>
                       <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Created At</th>

                           <th>Actions</th>
                       </tr>
                   </thead>

                   <tbody>
                       @isset($users)
                       @foreach($users as $user)

                           <td>{{ $user->name }}</td>
                           <td>{{ $user->email }}</td>
                           <td> @if(!empty($user->getRoleNames()))
                               @foreach($user->getRoleNames() as $role)
                               <label class="badge badge-success">{{ $role }}</label>
                               @endforeach
                           @endif
                           </td>
                           <td>{{ $user->created_at }}</td>

                           <td>
                               <div class="row">
                               <div class="col-md-3">
                               <a class=""  href="{{ route('access.users.edit',$user->id) }}" data-toggle="tooltip" data-placement="bottom" title="View User Profile">
                                       <i class=" fas fa-edit" >
                                       </i>

                               </a>
                               </div>
                               @if ($user->deleted_at == null)
                               <div class="col-md-3">
                                <form method="POST" action="{{ route('access.users.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="pt-0 btn btn-xs btn-default-outline btn-flat show_confirm" data-toggle="tooltip" data-placement="bottom" title='Deactivate'>
                                     <i class="fas fa-user-times text-danger"></i></button>
                                </form>
                                </div>
                               @else
                               <div class="col-md-3">
                                <form method="POST" action="{{ route('access.users.restore', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="POST">
                                    <button type="submit" class="pt-0 btn btn-xs btn-default-outline btn-flat " data-toggle="tooltip" data-placement="bottom" title='Activate'>
                                        <i class="fas fa-unlock text-success"></i></button>
                                </form>
                                </div>
                               @endif

                               </div>
                           </td>
                       </tr>

                       @endforeach
                       @endisset

                       @empty($users)
                       <td colspan="=4">No users found. Create one..</td>
                       @endempty
                   </tbody>
               </table>
           </div>
       </div>
   </div>



   </x-app-layout>

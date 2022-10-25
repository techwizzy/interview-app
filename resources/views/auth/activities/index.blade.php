<x-app-layout>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">

            <div  style="border-bottom:1px dashed #ccc; padding:10px" >
                <div class="card-title">
                    <div >
                       Activity Logs

                     </div>
                  </div>
             </div>


        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th scope="col">Log Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Model</th>
                    <th scope="col">Event</th>

                    <th scope="col">Creator Id</th>
                    <th scope="col">Date Created</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td>{{ $activity->log_name }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->subject_type }}</td>
                            <td>{{ $activity->event }}</td>

                            <td>{{ $activity->causer_id }}</td>
                            <td>{{ $activity->created_at }}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        </div>
        </div>
    </div>

    </x-app-layout>

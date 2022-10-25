<x-app-layout>

    <div class="card">

        <div  style="border-bottom:1px dashed #ccc; padding:10px" >
            <div class="card-title">
                <div >
                 Edit  permission
                </div>
            </div>
        </div>

          <div class="card-body mt-2">


                <form method="POST" action="{{ route('access.permissions.update', $permission->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ $permission->name }}"
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Name" required>

                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-checkbox-marked-circle-outline" style="font-size: 16px"></i> Save changes</button>

                </form>
            </div>

        </div>

    </x-app-layout>

@extends('layouts.admin')

@section('content')

<h1>Media</h1>

@if ($photos)

    <form action="delete/media" method="POST" class="form-inline">
        
        @csrf
        @method('delete')
        
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="delete_all">
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>ID</th>
                    <th>Media</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($photos as $photo)
                    <tr>
                        <td><input type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}" class="checkBoxes"></td>
                        <td>{{ $photo->id }}</td>
                        <td><img src="{{ $photo->file  }}" alt="" width="74px" class="img-responsive"></td>
                        <td>{{ media_name_manipulation($photo->file, '/images/') }}</td> <!-- my costum func -->
                        <td>{{ $photo->created_at ? $photo->created_at : "-no-date-" }}</td>
                        <td>{{ $photo->updated_at ? $photo->updated_at : "-no-date-" }}</td>
                        <td>
                            {{-- {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminMediasController@destroy', $photo->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!} --}}


                            {{-- <input type="hidden" name="photo" value="{{ $photo->id }}">
                            <input type="submit" name="delete_single" value="Delete" class="btn btn-danger"> --}}

                            {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminMediasController@deleteMedia', $photo->id]]) !!}
                                {{-- {!! Form::submit('delete_single',  ['class' => 'btn btn-danger']) !!} --}}
                                <input type="hidden" name="photo" value="{{ $photo->id }}">
                                <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </form>
@endif

@endsection

@section('scripts')

    <script>

        $(document).ready(function(){
            
            $('#options').click(function(){
                
                if(this.checked) {
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });
                } 
                else 
                {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }

            });

        });

    </script>

@endsection
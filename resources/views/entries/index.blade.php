@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('entries.create') }}" class="btn btn-danger m-2 form-btn" data-title="<i class='fa fa-users'></i> Add Entry">Add Entry</a>

                    <table id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">FDA ID</th>
                                <th scope="col">Upload Date</th>
                                <th scope="col">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                            <tr class="table-info">
                                <td>{{ $entry->fda_id }}</td>
                                <td>{{ $entry->upload_date }}</td>
                                <td>
                                    <a href="{{ route('entries.edit', ['entry' => $entry->id]) }}" class="form-btn" data-title="<i class='fa fa-users'></i> Edit Entry"><i class="fa-solid fa-pen"></i></a>
                                    <a href="{{ route('entries.destroy', ['entry' => $entry->id]) }}" class="delete-btn"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#table_id").dataTable();
    })
</script>
@endsection

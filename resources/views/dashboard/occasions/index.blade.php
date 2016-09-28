@extends('dashboard.masterpage.dashboard')

@section('title')
    Occasions
@endsection

@section('description')
    Alle occasions
@endsection

@section('breadcrumb')
    <li class="active">Occasions</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Occasions</h3>
        </div>

        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kenteken</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Actie</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($occasions as $occasion)
                <tr>
                    <td>{{ $occasion->id }}</td>
                    <td>{{ $occasion->kenteken }}</td>
                    <td>{{ $occasion->merk }}</td>
                    <td>{{ $occasion->model }}</td>
                    <td>{{ $occasion->type }}</td>
                    <td>

                        <div>
                            <ul>
                                <li><a href='{{ url("dashboard/occasion/{$occasion->id}") }}'>Show</a></li>
                                <li><a href='{{ url("dashboard/occasion/{$occasion->id}/edit") }}'>Edit info</a></li>
                                <li><a href='{{ url("dashboard/image/{$occasion->id}/edit") }}'>Edit img</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $occasions->links() }}
        </div>
    </div>
@endsection
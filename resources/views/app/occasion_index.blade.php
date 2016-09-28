@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>Occasions</h1>

                <table class="table table-hover">
                    @foreach($occasions as $occasion)
                        <tr>

                                <td>
                                    <a href="{{ url('occasions/' . $occasion->kenteken) }}" title="View occasion">
                                        {{ $occasion->kenteken }}
                                    </a>
                                </td>
                                <td>
                                    {{ $occasion->merk }}
                                </td>
                                <td>
                                    {{ $occasion->model }}
                                </td>

                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection

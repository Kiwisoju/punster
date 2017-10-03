@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ str_plural($user->name) }} Jokes</h1>

                    @if ($jokes->count())
                        <table class="table table-striped">
                            <thead>
                                <th>Date</th>
                                <th>Notes</th>
                                <th>Referred by</th>
                                <th>Points</th>
                            </thead>
                            <tbody>
                                @foreach ($jokes as $joke)
                                    <tr>
                                        <td>{{ $joke->created_at->addHours(8)->format('d-m-Y h:ia') }}</td>
                                        <td>{{ $joke->notes }}</td>
                                        <td>{{ $joke->referrer->name }}</td>
                                        <td>{{ $joke->points }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th>{{ $jokes->sum('points') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p>No jokes? This person isn't funny.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

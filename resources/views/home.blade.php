@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Add Entry</h2>

                    <form method="POST" action="/joke">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Person</label>
                            <select class="form-control" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="points">Points</label>
                            <input class="form-control" id="points" type="number" name="points" value="0" />
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Results</h2>
                    <table class="table table-striped">
                        <thead>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Points</th>
                        </thead>
                        <tbody>
                            @foreach ($results as $rank => $user)
                                <tr>
                                    <td>{{ $rank + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->current_points }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

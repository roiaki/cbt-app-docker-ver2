@extends('layouts.app')

@section('content')

<p>ユーザーID {{ $user->id }} 番　{{ $user->name }} さん</p>

<h3>3コラム一覧</h3>
@if (count($three_columns) > 0)
<table class="table table-striped table-bordered">
    <thead>
        <tr class="table-primary">
            
            <th>3コラムid</th>
            <th>感情名</th>
            <th>考えたこと</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($three_columns as $three_column)
        <tr>                      
            <td><a href="{{ route('three_columns.show', $three_column->id) }}">{{ $three_column->id }}</a></td>
            <td>{{ $three_column->emotion_name }}</td>
            <td>{{ $three_column->thinking }}</td>                
        </tr>
        @endforeach
    </tbody>
</table>


@endif
{!! link_to_route('three_columns.create', '新規作成', [], ['class' => 'btn btn-primary mb-5']) !!}
<div class="d-flex justify-content-center">
   
</div>

@endsection
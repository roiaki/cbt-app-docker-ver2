@extends('layouts.app')

@section('content')

<p>ユーザーID {{ $user->id }} 番　{{ $user->name }} さん</p>

<h3>7コラム一覧</h3>

@if (count($seven_columns) > 0)
<table class="table table-striped table-bordered">
    <thead>
        <tr class="table-primary">
            
            <th>id</th>
            <th>タイトル</th>
            <th>内容</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seven_columns as $seven_column)
        <tr>
            
            <td><a href="{{ route('seven_columns.show', $seven_column->id) }}">{{ $seven_column->id }}</a></td>
            <td>{{ $seven_column->title }}</td>
            <td>{{ $seven_column->content }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endif
{!! link_to_route('seven_columns.create', '新規作成', [], ['class' => 'btn btn-primary mb-5']) !!}
<div class="d-flex justify-content-center">
    {{ $seven_columns->links('pagination::bootstrap-4') }}
</div>

@endsection
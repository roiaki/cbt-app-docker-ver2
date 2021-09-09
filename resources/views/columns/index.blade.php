@extends('layouts.app')

@section('content')

<p>ユーザーID {{ $user->id }} 番　{{ $user->name }} さん</p>

<h3>3コラム一覧</h3>
@if (count($columns) > 0)
<table class="table table-striped table-bordered">
    <thead>
        <tr class="table-primary">
            
            <th>id</th>
            <th>タイトル</th>
            <th>内容</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($columns as $column)
        <tr>
            
            <td><a href="{{ route('columns.show', $column->id) }}">{{ $column->id }}</a></td>
            <td>{{ $column->title }}</td>
            <td>{{ $column->content }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endif
{!! link_to_route('columns.create', '新規作成', [], ['class' => 'btn btn-primary mb-5']) !!}
<div class="d-flex justify-content-center">
    {{ $columns->links('pagination::bootstrap-4') }}
</div>

@endsection
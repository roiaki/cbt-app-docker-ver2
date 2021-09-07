@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="#" class="nav-link">説明</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
            </ul>
        </div>
<p>ユーザーID {{ $user->id }} 番　{{ $user->name }} さん</p>

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
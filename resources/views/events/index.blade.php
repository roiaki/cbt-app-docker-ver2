@extends('layouts.app')

@section('content')

<p>ユーザーID {{ $user->id }} 番　{{ $user->name }} さん</p>

<h3>イベント一覧</h3>
{{ $user }}
@if (count($events) > 0)
<table class="table table-striped table-bordered">
    <thead>
        <tr class="table-primary">
            
            <th>id</th>
            <th>タイトル</th>
            <th>内容</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            
            <td><a href="{{ route('events.show', $event->id) }}">{{ $event->id }}</a></td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->content }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endif
{!! link_to_route('events.create', '新規作成', [], ['class' => 'btn btn-primary mb-5']) !!}
<div class="d-flex justify-content-center">
    {{ $events->links('pagination::bootstrap-4') }}
</div>

@endsection
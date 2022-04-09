
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-sm-8">
    <h3 class="title_head">出来事一覧</h3>

    @if (count($events) > 0)
    <table class="table table-striped table-bordered">
      <thead>
        <tr class="table-primary">
          <th>タイトル</th>
          <th>内容</th>
          <th>更新日</th>
        </tr>
      </thead>
      <tbody>
        
      
        @foreach ($events as $event)
        <tr>
          <td>{{ $event->title }}</td>
          <td>
          @if (mb_strlen($event->content) > 25)
            {{ $content = mb_substr($event->content, 0, 25 ) . "..."; }}
          @else
            {{ $event->content}}
          @endif
          </td>
          <td>
            <p><a href="{{ route('events.show', $event->id) }}">詳細</a></p>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @endif

    {!! link_to_route('events.create', '新規作成', [], ['class' => 'btn btn-primary btn-lg']) !!}

    <div class="d-flex justify-content-center">
      {{ $events->links('pagination::bootstrap-4') }}
    </div>
  </div>
</div>
@endsection
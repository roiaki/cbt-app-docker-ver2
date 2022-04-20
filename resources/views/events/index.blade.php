@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-sm-7">
    <h3 class="title_head">出来事一覧</h3>

    <!--↓↓ 検索フォーム ↓↓-->
    <div class="row">
      <div class="col-sm-3 serch">
        <form class="form-inline" action="{{ route('events.serch') }}" method="get">
          @csrf
          <div class="form-group">
            <input type="text" name="keyword" value="@if ( !empty($keyword) ){{ $keyword }}@endif" class="form-control" placeholder="検索キーワード">

            <input type="submit" value="検索" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
    <!--↑↑ 検索フォーム ↑↑-->

    @if ( isset($events) )
      @if ( count($events) > 0 )
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
              {{ $content = mb_substr($event->content, 0, 25 ) . "....."; }}
              @else
              {{ $event->content}}
              @endif
            </td>
            <td>{{ date( 'Y/m/d H:i', strtotime($event->updated_at) ) }}
              <p><a href="{{ route('events.show', $event->id) }}">詳細</a></p>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


      {!! link_to_route('events.create', '新規作成', [], ['class' => 'btn btn-primary btn-lg']) !!}

      <div class="d-flex justify-content-center">
        @if ( isset($events) )
        {{ $events->links('pagination::bootstrap-4') }}
        @endif
      </div>

      @endif
    @endif
  </div>
</div>
@endsection
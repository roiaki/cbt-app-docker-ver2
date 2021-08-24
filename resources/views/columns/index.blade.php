@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
@if (count($columns) > 0)
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>id</th>
                    <th>タイトル</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($columns as $column)
                <tr>
                    <td>{{ $column->id }}</td>
                    <td>{{ $column->title }}</td>
                    <td>{{ $column->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
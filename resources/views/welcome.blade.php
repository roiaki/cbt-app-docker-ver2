@extends('layouts.app')

@section('content')

        <div class="center jumbotron">
            <div class="text-center">
                <h1>認知行動療法的なWebアプリ</h1>
                <p>3コラム、7コラムで思考の癖を把握して、 認知のゆがみを取りましょう。
                </p>
                <p>testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest<br>
                testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p>
                {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
   
@endsection
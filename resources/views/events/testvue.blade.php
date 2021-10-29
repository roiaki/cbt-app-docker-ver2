@extends('layouts.app')

@section('content')

<h3>VueTest</h3>
<div id="app">
<form v-on:submit.prevent="addItem" class="form-group">
    <div class="form-group">
        <div class="input-group">
            <input type="text" v-model="newItem" class="form-control">
            <span class="input-group-btn"><button class="btn btn-primary" type="submit">送信</button></span>
        </div>
    </div>
</form>
<ul class="list-group">
    <li class="list-group-item" v-for="todo in todos">@{{ todo }}</li>
</ul>
</div>
<script>
new Vue({
el: '#app',
data: {
    newItem: '',
    todos: []
    },

    methods:{
      addItem: function(){
          this.todos.push(this.newItem);
          this.newItem = '';
      }
    }
})
</script>
@endsection
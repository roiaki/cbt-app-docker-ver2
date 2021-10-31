@extends('layouts.app')

@section('content')

<h3>VueTest</h3>

<form action="{{ route('events.create') }}" class="form-group" method="get">
  <div id="form_area" style="display:block">
    
        <input type="text" name="text_0" id="text_0" placeholder="text_0">
        <button id="0" onclick="deleteBtn(this)">削除</button>
    
  </div>
  <input type="button" value="フォーム追加" onclick="addForm()">
</form>


<script>
  var i = 1;

  function addForm() {

    // input要素を作成
    var input_data = document.createElement('input');
    input_data.type = 'text';
    input_data.name = 'text_' + i;
    input_data.id = 'inputform_' + i;
    input_data.placeholder = 'text_' + i;
    var parent = document.getElementById('form_area');
    parent.appendChild(input_data);

    var button_data = document.createElement('button');
    button_data.id = i;
    button_data.onclick = function() {
      deleteBtn(this);
    }
    button_data.innerHTML = '削除';
    var input_area = document.getElementById(input_data.id);
    parent.appendChild(button_data);

    // <li>要素を作成し<input>要素をアペンドする
    //var newLi = document.createElement("li");
    //newLi.appendChild(input_data);
    //newLi.appendChild(button_data);

    // <li>要素を<ul>要素にアペンドする
    //var list = document.getElementById('list');
    //list.appendChild(newLi);

    i++;
  }

  function deleteBtn(target) {
    var target_id = target.id;
    var parent = document.getElementById('form_area');
    var ipt_id = document.getElementById('inputform_' + target_id);
    var tgt_id = document.getElementById(target_id);
    parent.removeChild(ipt_id);
    parent.removeChild(tgt_id);
  }
</script>
@endsection
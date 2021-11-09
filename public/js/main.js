// 削除確認 froms[0] ?
function confirmDelete() {
  if (window.confirm('本当に削除してもよろしいでしょうか?')) {
    document.forms[0].submit();
  } else {
    return false;
  }
}

var i = 1;

// フォーム追加
function addForm() {

  // input text要素を作成
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.name = 'text_' + i;
  input_data.class = 'form-control';
  input_data.size = '20';
  input_data.style = "margin:5px";
  input_data.id = 'inputform_' + i;
  input_data.placeholder = '感情名_' + i;
  var a = document.getElementById('form_area01');
  a.appendChild(input_data);

  // input number 要素を作成
  var input_data = document.createElement('input');
  input_data.type = 'number';
  input_data.name = 'number_' + i;
  input_data.class = 'form-control';
  input_data.size = '20';
  input_data.style = "margin:5px";
  input_data.id = 'inputform_' + i;
  input_data.placeholder = '強さ_' + i;
  var b = document.getElementById('form_area02');
  b.appendChild(input_data);

  i++;
}

// フォーム削除
function deleteForm() {
  const element01 = document.getElementById('form_area01');
  const element02 = document.getElementById('form_area02');
  element01.innerHTML = '';
  element02.innerHTML = '';
}
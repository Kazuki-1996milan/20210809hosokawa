<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>COACHTECH</title>
</head>

<body>
 <div class="wrapper">
  <h1>Todo List</h1>
    @error('content')
        <p>{{$message}}</p>
    @enderror
  <form action="/todo/create" method="POST" class="input_form">
    @csrf
    <input type="text" name="content">
    <input type="submit" value="追加">
</form>
  <table>
      <tr>
        <th class="make_day">作成日</th>
        <th class="tasks">タスク名</th>
        <th class="remake">更新</th>
        <th class="delete">削除</th>
      </tr>
    @foreach ($tasks as $task)

    <form method="POST">
    @csrf
    <tr>
          <input type="hidden" name="id" value="{{$task->id}}">
          <td>{{$task->created_at}}</td>
          <td><input type="text" name="content" value="{{$task->content}}" class="task_content"></td>
          <td><input type="submit" value="更新" formaction="/todo/update" class="remake_action"></td>
          <td><input type="submit" value="削除" formaction="/todo/delete" class="delete_action"></td>
    </tr>
    </form>
    @endforeach
  </table>
 </div>
</body>

</html>

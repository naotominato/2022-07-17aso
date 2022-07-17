<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム</title>
</head>

<style>
  .search_box {
    border: 1px solid #000;
  }

  .list_title {
    border-bottom: 1px solid #000;
  }

  .paginate {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  h1 {
    text-align: center;
    font-size: 24px;
  }

  .container {
    width: 80%;
    margin: 0 auto;
  }

  .form {
    width: 250px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #808080;
  }

  .search_box {
    padding: 30px 0;
  }

  .search_word {
    margin: 20px 0;
  }

  .label {
    display: inline-block;
    width: 150px;
    margin-left: 50px;
    font-weight: bold;
  }

  .first_content {
    display: flex;
    align-items: center;
    margin-bottom: -35px;
  }

  .gender {
    margin-left: 50px;
    display: flex;
    align-items: center;
  }

  .gender_ttl {
    font-weight: bold;
  }

  .gender_label {
    margin-left: 10px;
  }

  .gender_input {
    opacity: 0;
    width: 0;
    margin: 0;
  }

  .gender_label {
    padding: 12px 8px;
    margin-left: 35px;
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .gender_input:focus+.radio_btn {
    background: #000;
  }

  .gender_input:checked+.radio_btn {
    background: #fff;
  }

  .gender_input:checked+.radio_btn::before {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #000;
  }

  .radio_btn {
    position: relative;
    top: 0;
    left: 0;
    display: block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #808080;
  }

  .gender_name {
    margin-left: 12px;
    display: block;
    font-weight: bold;
  }

  .between {
    margin: 0 20px;
  }

  .form_btn {
    text-align: center;
  }

  .search_btn {
    background: #000;
    color: #fff;
    padding: 10px 60px;
    font-weight: bold;
    font-size: 16px;
    border-radius: 5px;
  }

  .reset {
    display: block;
    margin-top: 5px;
    color: #000;
  }

  table {
    margin: 0 auto;
    width: 100%;
    border-spacing: 0;
  }

  table tr th {
    border-bottom: 1px solid #000;
  }

  table tr th,
  table tr td {
    text-align: left;
    padding: 5px 40px 0 0;
  }

  table tr th:first-of-type,
  table tr td:first-of-type {
    text-align: center;
    padding-left: 25px;
  }

  .btn_delete {
    background: #000;
    color: #fff;
    padding: 0 15px;
    font-size: 16px;
    border-radius: 5px;
  }
</style>

<body>
  <div class="container">
    <h1>管理システム</h1>
    <div class="search_box">
      <form action="{{ route('search') }}" method="get">
        @csrf
        <div class="first_content">
          <div class="search_word">
            <label for="name" class="label">お名前</label>
            <input type="text" name="name" id="name" value="{{ $name }}" class="form">
          </div>
          <div class="search_word gender">
            <div class="gender_ttl">性別</div>
            <label for="all" class="gender_label">
              <input type="radio" name="gender" id="all" class="gender_input" checked value="" {{ ($gender == "")?"checked":"";}}>
              <span class="radio_btn"></span>
              <span class="gender_name">全て</span>
            </label>
            <label for="men" class="gender_label">
              <input type="radio" name="gender" id="men" class="gender_input" required value="1" {{($gender == 1)?"checked":"";}}>
              <span class="radio_btn"></span>
              <span class="gender_name">男性</span>
            </label>
            <label for="women" class="gender_label">
              <input type="radio" name="gender" id="women" class="gender_input" required value="2" {{($gender == 2)?"checked":"";}}>
              <span class="radio_btn"></span>
              <span class="gender_name">女性</span>
            </label>
          </div>
        </div>
        <div class="search_word">
          <label for="created_at" class="label">登録日</label>
          <input type="date" name="from" id="created_at" value="{{ $from }}" class="form">
          <span class="between">~</span>
          <input type="date" name="until" value="{{ $until }}" class="form">
        </div>
        <div class="search_word">
          <label for="email" class="label">メールアドレス</label>
          <input type="text" name="email" id="email" value="{{ $email }}" class="form">
        </div>
        <div class="form_btn">
          <button class="search_btn">検索</button>
          <a href="{{ route('search') }}" class="reset">リセット</a>
        </div>
    </div>
    </form>

    <div class="paginate">
      <div class="left">
        @if (count($users) >0)
        <p>全{{ $users->total() }}件中
          {{ ($users->currentPage() -1) * $users->perPage() + 1}} ~
          {{ (($users->currentPage() -1) * $users->perPage() + 1) + (count($users) -1)  }}件
        </p>
        @else
        <p>データがありません。</p>
        @endif
      </div>
      <div class="right">{{ $users->appends(request()->query())->links('vendor.pagination.default') }}</div>
    </div>

    <div class="result">
      <table>
        <tr class="list_title">
          <th>ID</th>
          <th>お名前</th>
          <th>性別</th>
          <th>メールアドレス</th>
          <th>ご意見</th>
          <th></th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->fullname }}</td>
          @if ($user->gender === 1)
          <td>男性</td>
          @elseif ($user->gender === 2)
          <td>女性</td>
          @endif
          <td>{{ $user->email }}</td>
          <td>{{ Str::limit ($user->opinion, 50, '...') }}</td>
          <td>
            <form action="{{ route('delete') }}" method="get">
              @csrf
              <input type="hidden" name="id" value="{{$user->id}}">
              <button class="btn_delete">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>

</html>
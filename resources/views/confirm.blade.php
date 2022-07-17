@extends('layouts.layout')
<style>
  h1 {
    font-size: 24px;
  }

  table {
    margin: 0 auto;
    width: 800px;
    border-collapse: collapse;
  }

  th {
    width: 25%;
  }

  td {
    width: 75%;
    height: 50px;
  }

  .form {
    width: 100%;
    margin: 0 auto;
    text-align: center;
  }

  .form_btn {
    text-align: center;
    margin: 20px;
  }

  .submit {
    background: #000;
    color: #fff;
    padding: 10px 60px;
    font-weight: bold;
    font-size: 16px;
    border-radius: 5px;
    display: block;
    margin: 0 auto 10px;
  }

  .redirect {
    background: none;
    border: none;
    border-bottom: 1px solid #000;
  }
</style>


@section('content')
<h1>内容確認</h1>

<form action="{{ route('complete') }}" method="POST">
  @csrf
  <table>
    <tr>
      <th>お名前</th>
      <td>
        {{ $contact['family_name'] }} {{ $contact['first_name'] }}
        <input type="hidden" name="family_name" value="{{ $contact['family_name'] }}">
        <input type="hidden" name="first_name" value="{{ $contact['first_name']}}">
      </td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        {{ $contact['gender'] }}
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>
        {{ $contact['email'] }}
        <input type="hidden" name="email" value="{{ $contact['email'] }}">
      </td>
    </tr>
    <tr>
      <th>郵便番号</th>
      <td>
        {{ $contact['postcode'] }}
        <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}">
      </td>
    </tr>
    <tr>
      <th>住所</th>
      <td>
        {{ $contact['address'] }}
        <input type="hidden" name="address" value="{{ $contact['address'] }}">
      </td>
    </tr>
    <tr>
      <th>建物名</th>
      <td>
        {{ $contact['building_name'] }}
        <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}">
      </td>
    </tr>
    <tr>
      <th>ご意見</th>
      <td>
        {{ $contact['opinion'] }}
        <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}">
      </td>
    </tr>
  </table>

  <div class="form_btn">
    <button name="complete" type="submit" value="true" class="submit">送信</button>
    <button name="back" type="submit" value="true" class="redirect">修正する</button>
  </div>

</form>

@endsection
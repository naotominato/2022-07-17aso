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

  input {
    font-size: 18px;
    border: 1px solid #808080;
  }

  textarea {
    font-size: 18px;
    border-color: #808080;
  }

  .form {
    width: 100%;
    margin: 0 auto;
    text-align: center;
  }

  .required {
    color: red;
  }

  .last_td {
    height: 150px;
  }

  .example_td {
    height: 35px;
    color: #808080;
    padding-left: 20px;
  }

  .example_postcode {
    padding-left: 40px;
  }

  .error {
    height: 30px;
    color: #8B0000;
    background: #FFC0CB;
  }

  .input {
    height: 50px;
    border-radius: 5px;
  }

  .textarea {
    height: 150px;
    border-radius: 5px;
  }

  .name_form {
    display: flex;
    justify-content: space-between;
  }

  .name_input {
    box-sizing: border-box;
    width: 48%;
  }

  .example_name {
    display: flex;
    align-items: center;
    height: 40px;
  }

  .example_familyname {
    width: 52%;
  }

  .example_firstname {
    width: 48%;
    padding-left: 20px;
  }

  .others_input {
    width: 100%;
  }

  .gender {
    display: flex;
  }

  .gender_input {
    opacity: 0;
    width: 0;
    margin: 0;
  }

  .gender_label {
    padding: 12px 8px;
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
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #808080;
  }

  .gender_name {
    margin-left: 12px;
    display: block;
    font-weight: bold;
  }

  .gender_label:last-of-type {
    margin-left: 45px;
  }

  .input_postcode {
    display: flex;
    width: 100%;
  }

  .input_postcode p {
    font-weight: bold;
    width: 5%;
  }

  .input_postcode input {
    width: 95%;
    height: 50px;
  }

  .submit {
    background: #000;
    color: #fff;
    padding: 10px 60px;
    font-weight: bold;
    font-size: 16px;
    border-radius: 5px;
    margin: 30px auto 20px;
  }
</style>


@section('content')

<h1>お問い合わせ</h1>
<div class="form">
  <form action="{{ route('confirm') }}" method="POST" class="h-adr">
    @csrf
    <table>
      <tr>
        <th>お名前<span class="required">※</span></th>
        <td>
          <div class="name_form">
            <input type="text" name="family_name" value="{{ old('family_name') }}" class="name_input input">
            <input type="text" name="first_name" value="{{ old('first_name') }}" class="name_input input">
          </div>
        </td>
      </tr>
      @error('family_name')
      <tr>
        <th class="error">※エラー</th>
        <td class="error">
          {{$message}}
        </td>
      </tr>
      @enderror
      @error('first_name')
      <tr>
        <th class="error">※エラー</th>
        <td class="error">
          {{$message}}
        </td>
      </tr>
      @enderror
      <tr>
        <th></th>
        <td class="example_td">
          <div class="example_name">
            <p class="example_familyname">例）山田</p>
            <p class="example_firstname">例）太郎</p>
          </div>
        </td>
      </tr>
      <tr>
        <th>性別<span class="required">※</span></th>
        <td>
          <div class="gender">
            <label for="men" class="gender_label">
              <input type="radio" name="gender" id="men" class="gender_input" required value="男性" checked {{ old("gender") == "男性" ? "checked" : "" }}>
              <span class="radio_btn"></span>
              <span class="gender_name">男性</span>
            </label>
            <label for="women" class="gender_label">
              <input type="radio" name="gender" id="women" class="gender_input" required value="女性" {{ old("gender") == "女性" ? "checked" : "" }}>
              <span class="radio_btn"></span>
              <span class="gender_name">女性</span>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="example_td"></td>
      </tr>
      <tr>
        <th>メールアドレス<span class="required">※</span></th>
        <td>
          <div class="input_right">
            <input type="email" name="email" value="{{ old('email') }}" class="others_input input">
          </div>
        </td>
      </tr>
      @error('email')
      <tr>
        <th class="error">※エラー</th>
        <td class="error">
          {{$message}}
        </td>
      </tr>
      @enderror
      <tr>
        <th></th>
        <td class="example_td">例）test@example.com</td>
      </tr>
      <tr>
        <th>郵便番号<span class="required">※</span></th>
        <td>
          <div class="input_postcode">
            <span class="p-country-name" style="display:none;">Japan</span>
            <p class="example">〒</p>
            <input type="text" name="postcode" size="8" maxlength="8" onblur="toHalfWidth(this)" pattern="\d{3}-\d{4}" value="{{ old('postcode') }}" class="p-postal-code input">
          </div>
        </td>
      </tr>
      @error('postcode')
      <tr>
        <th class="error">※エラー</th>
        <td class="error">
          {{$message}}
        </td>
      </tr>
      @enderror
      <tr>
        <th></th>
        <td class="example_td example_postcode">例）123-4567</td>
      </tr>
      <tr>
        <th>住所<span class="required">※</span></th>
        <td>
          <div class="input_right">
            <input type="text" name="address" class="p-region p-locality p-street-address p-extended-address others_input input" value="{{ old('address') }}">
          </div>
        </td>
      </tr>
      @error('address')
      <tr>
        <th class="error">※エラー</th>
        <td class="error">
          {{$message}}
        </td>
      </tr>
      @enderror
      <tr>
        <th></th>
        <td class="example_td">例）東京都渋谷区千駄ヶ谷1-2-3</td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          <div class="input_right">
            <input type="text" name="building_name" value="{{ old('building_name') }}" class="others_input input">
          </div>
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="example_td">例）千駄ヶ谷マンション101</td>
      </tr>
      <tr>
        <th>ご意見<span class="required">※</span></th>
        <td class="last_td">
          <div class="input_right">
            <textarea name="opinion" cols="30" rows="10" class="others_input textarea">{{ old('opinion')}}</textarea>
          </div>
        </td>
      </tr>
      @error('opinion')
      <tr>
        <th class="error">※エラー</th>
        <td class="error">
          {{$message}}
        </td>
      </tr>
      @enderror
    </table>
    <button type="submit" class="submit">確認</button>
  </form>
</div>

@endsection
@extends('layouts.layout')
<style>

  .view {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  button {
    background: #000;
    color: #fff;
    padding: 10px 20px;
    font-weight: bold;
    font-size: 16px;
    border-radius: 5px;
    display: block;
    margin: 60px auto;
  }
</style>

@section('content')
<div class="view">
  <div>
    <div class="text">
      ご意見いただきありがとうございました。
    </div>
    <button>トップページへ</button>
  </div>
</div>
@endsection
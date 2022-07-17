<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <title>お問い合わせ</title>

    @livewireStyles
</head>

<body>

    <h1>お問い合わせre</h1>
    <div class="container">
        <form wire:submit.prevent="saveContact" action="{{ route('confirm') }}" method="POST" class="h-adr">
            @csrf
            <table>
                <tr>
                    <th>お名前<span class="required">※</span></th>
                    <td>
                        <input type="text" wire:model.lazy="family_name" name="family_name" value="{{ old('family_name') }}">
                        <input type="text" wire:model.lazy="first_name" name="first_name" value="{{ old('first_name') }}">
                    </td>
                </tr>
                @error('family_name')
                <tr>
                    <th>※エラー</th>
                    <td>
                        {{$message}}
                    </td>
                </tr>
                @enderror
                @error('first_name')
                <tr>
                    <th>※エラー</th>
                    <td>
                        {{$message}}
                    </td>
                </tr>
                @enderror
                <tr>
                    <th></th>
                    <td>
                        <p class="inline name">例）山田</p>
                        <p class="inline name">例）太郎</p>
                    </td>
                </tr>
                <tr>
                    <th>性別<span class="required">※</span></th>
                    <td>
                        <input type="radio" name="gender" id="men" class="radio" required value="男性" checked {{ old("gender") == "男性" ? "checked" : "" }}>
                        <label for="men" class="gender_text">男性</label>
                        <input type="radio" name="gender" id="women" class="radio" required value="女性" {{ old("gender") == "女性" ? "checked" : "" }}>
                        <label for="women" class="gender_text">女性</label>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span class="required">※</span></th>
                    <td>
                        <input type="email" wire:model.lazy="email" name="email" required value="{{ old('email') }}">
                    </td>
                </tr>
                @error('email')
                <tr>
                    <th>※エラー</th>
                    <td>
                        {{$message}}
                    </td>
                </tr>
                @enderror
                <tr>
                    <th></th>
                    <td>例）test@example.com</td>
                </tr>
                <tr>
                    <th>郵便番号<span class="required">※</span></th>
                    <td>
                        <div class="width">
                            <span class="p-country-name" style="display:none;">Japan</span>
                            <p class="inline">〒</p><input type="text" wire:model.lazy="postcode" name="postcode" class="p-postal-code" size="8" maxlength="8" onblur="toHalfWidth(this)" pattern="\d{3}-\d{4}" value="{{ old('postcode') }}">
                        </div>
                    </td>
                </tr>
                @error('postcode')
                <tr>
                    <th>※エラー</th>
                    <td>
                        {{$message}}
                    </td>
                </tr>
                @enderror
                <tr>
                    <th></th>
                    <td>例）123-4567</td>
                </tr>
                <tr>
                    <th>住所<span class=" required">※</span></th>
                    <td>
                        <input type="text" wire:model.lazy="address" name="address" class="p-region p-locality p-street-address p-extended-address" value="{{ old('address') }}">
                    </td>
                </tr>
                @error('address')
                <tr>
                    <th>※エラー</th>
                    <td>
                        {{$message}}
                    </td>
                </tr>
                @enderror
                <tr>
                    <th></th>
                    <td>例）東京都渋谷区千駄ヶ谷1-2-3</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>
                        <input type="text" name="building_name" value="{{ old('building_name') }}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>例）千駄ヶ谷マンション101</td>
                </tr>
                <tr>
                    <th>ご意見<span class="required">※</span></th>
                    <td>
                        <textarea wire:model.lazy="opinion" name="opinion" cols="30" rows="10">{{ old('opinion')}}</textarea>
                    </td>
                </tr>
                @error('opinion')
                <tr>
                    <th>※エラー</th>
                    <td>
                        {{$message}}
                    </td>
                </tr>
                @enderror
            </table>
            <button type="submit">確認</button>
        </form>
    </div>
    @livewireScripts
</body>
<script>
    function toHalfWidth(elm) {
        elm.value = elm.value.replace(/[― ０-９！-～]/g, function(s) {
            return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
        });
    }
</script>

</html>
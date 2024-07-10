<x-layout>
    <h2 class="text-center my-5">Редактирование личного кабинета</h2>

    <img width="100" height="100" src="{{ $profile->profile->avatar }}" alt="">

    <form action="POST" action="{{ route('profile.update', $profile->id) }}">
        @csrf 
        @method('PUT')
    <table class="table profile-edit" >
        <tr>
            <td>
                Никнейм
            </td>
            <td>
                <input type="text" name="name" value="{{ $profile->name }}" placeholder="Ваш логин" required>
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                {{ $profile->email }}
            </td>
        </tr>
        <tr>
            <td>
                Город
            </td>
            <td>
                <input type="text" name="city" value="{{$profile->profile->city }}"  placeholder="Укажите ваш город">
            </td>
        </tr>
        <tr>
            <td>
                Телефон
            </td>
            <td>
                <input type="text" name="phone" value="{{$profile->profile->phone }}"  placeholder="Укажите номер телефона">
            </td>
        </tr>
        <tr>
            <td>
                Telegram
            </td>
            <td>
                <input type="text" name="telegram" value="{{$profile->profile->telegram }}"  placeholder="Ссылка на Telegram">
            </td>
        </tr>
        <tr>
            <td>
                VK
            </td>
            <td>
                <input type="text" name="vk" value="{{$profile->profile->vk }}"  placeholder="Ссылка на страницу VK">
            </td>
        </tr>
        <tr>
            <td>
                Дата рождения
            </td>
            <td>
                <input type="date" name="birthday" id="" value="{{$profile->profile->birthday }}"  placeholder="Укажите дату рождения">    
            </td>
        </tr>
        <tr>
            <td>
                О себе
            </td>
            <td>
                <textarea name="about" placeholder="Расскажите о себе">{{$profile->profile->about }}</textarea>
            </td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</x-layout>
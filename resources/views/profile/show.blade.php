<x-layout>
    <h2 class="text-center my-5">Личный кабинет</h2>

    <img width="100" height="100" src="{{ $profile->profile->avatar }}" alt="">

    <table class="table ">
        <tr>
            <td>
                Никнейм
            </td>
            <td>
                {{ $profile->name }}
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
                {{$profile->profile->city }}
            </td>
        </tr>
        <tr>
            <td>
                Телефон
            </td>
            <td>
                {{$profile->profile->phone }}
            </td>
        </tr>
        <tr>
            <td>
                Telegram
            </td>
            <td>
                {{$profile->profile->telegram }}
            </td>
        </tr>
        <tr>
            <td>
                Vk
            </td>
            <td>
                {{$profile->profile->vk }}
            </td>
        </tr>
        <tr>
            <td>
                Дата рождения
            </td>
            <td>
                {{$profile->profile->birthday }}
            </td>
        </tr>
        <tr>
            <td>
                О себе
            </td>
            <td>
                {{$profile->profile->about }}
            </td>
        </tr>
    </table>

    @if(Auth::id() === $profile->id)
        <a href="{{ route('profile.edit', $profile->id) }}">Редактировать</a>
    @endif
</x-layout>
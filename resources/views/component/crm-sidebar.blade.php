<div class="d-flex flex-column flex-shrink-0 p-3 text-white">
    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('users-list')}}">Пользователи</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Пользователи CRM</a>
                </li>
                <li>
                    <a href="#">Клиенты</a>
                </li>
                <li>
                    <a href="#">Поставщики</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('teams-list')}}">Отделы</a>
        </li>
        <li>
            <a href="{{route('tasks-list')}}">Задачи</a>
        </li>
        <li>
            <a href="{{route('task-statuses-list')}}">Статусы задач</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Заказы</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Активные</a>
                </li>
                <li>
                    <a href="#">Завершенные</a>
                </li>
                <li>
                    <a href="#">Отмененные</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('profile')}}">Профиль</a>
        </li>
    </ul>
</div>

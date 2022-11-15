<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Test de Laravel</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03"
            aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse float-right right" id="navbarsExample03" style="">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a @class(["nav-link" , "active"=>Route::is('task1')]) aria-current="page" href="{{ route('task1') }}">Task1</a>
                </li>
                <li class="nav-item">
                    <a @class(["nav-link" , "active"=>Route::is('task2')]) href="{{ route('task2') }}">Task2</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <ul id="users">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.axios.get('/api/users').then(
            response => {
                const userElement = document.getElementById("users");

                let users = response.data;

                users.forEach((user, index) => {
                    let elemnt = document.createElement("li");
                    elemnt.setAttribute('id', user.id);
                    elemnt.innerText = user.name;
                    userElement.appendChild(elemnt);

                });
            }
        );
    </script>

    <script>
        Echo.channel('users')
            .listen("UserCreated", (e) => {

                const userElement = document.getElementById("users");

                let element = document.createElement("li");
                element.setAttribute('id', e.user.id);
                element.innerText = e.user.name;
                userElement.appendChild(element);

            }).listen("UserUpdated", (e) => {

            const element = document.getElementById(e.user.id);
            element.innerText = e.user.name;

        }).listen("UserDeleted", (e) => {

            const element = document.getElementById(e.user.id);
            element.parentNode.removeChild(element);
        });
    </script>
@endpush

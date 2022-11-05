@extends('layouts.app')

@push('styles')
    <style type="text/css">

    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Chat') }}</div>

                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12 border rounded-lg p-3">
                                        <ul
                                            id="messages"
                                            class="list-unstyled overflow-auto"
                                            style="height: 45vh"
                                        >
                                            <li>Test 1: Hello</li>
                                            <li>Test 2: Hi There</li>
                                        </ul>
                                    </div>
                                </div>

                                <form action="">
                                    <div class="row py-3">
                                        <div class="col-10">
                                            <input type="text" id="message" class="form-control">
                                        </div>
                                        <div class="col-2">
                                            <button id="send" type="submit" class="btn btn-primary btn-block">Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-2">
                                <p><strong>Online Now</strong></p>
                                <ul
                                    id="users"
                                    class="list-unstyled overflow-auto text-info"
                                    style="height: 45vh"
                                >
                                    {{--                                    <li>Test 1</li>--}}
                                    {{--                                    <li>Test 2</li>--}}
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @push('scripts')
            <script>
                const userElement = document.getElementById("users");

                Echo.join('chat').here(users => {
                    users.forEach((user, index) => {
                        // console.log(users);
                        let element = document.createElement("li");
                        element.setAttribute('id', user.id);
                        element.innerText = user.name;
                        userElement.appendChild(element);

                    });
                }).joining(user => {
                    let element = document.createElement("li");
                    element.setAttribute('id', user.id);
                    element.innerText = user.name;
                    userElement.appendChild(element);
                }).leaving(user => {
                    const element = document.getElementById(user.id);
                    element.parentNode.removeChild(element);
                });

            </script>
    @endpush

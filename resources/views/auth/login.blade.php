<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>
    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Welcome Back</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you to log
                    in.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email"
                                          id="email"
                                          type="email"
                                          required
                            ></x-form-input>
                            {{--                            show error message for email--}}
                            <x-form-error name="email"></x-form-error>
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password"
                                          id="password"
                                          type="password"
                                          required
                            ></x-form-input>
                            {{--                            show error message for password--}}
                            <x-form-error name="password"></x-form-error>
                        </div>
                    </x-form-field>

                    {{--                    <div class="mt-10">--}}
                    {{--                        --}}{{--show error message for all--}}
                    {{--                        @if($error->any)--}}
                    {{--                            <ul>--}}
                    {{--                                @foreach($error->all() as $error)--}}
                    {{--                                    <li class="text-red-500 italic">{{$error}}</li>--}}
                    {{--                                @endforeach--}}
                    {{--                            </ul>--}}
                    {{--                        @endif--}}
                    {{--                    </div>--}}

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/auth/create" class="text-sm font-semibold leading-6 text-gray-900">Register</a>
            <x-form-button>Log In</x-form-button>
        </div>
    </form>

</x-layout>

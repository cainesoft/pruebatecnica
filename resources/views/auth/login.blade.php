


@extends('layouts.auth')
@section('content')
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            
            <div class="h-32 md:h-auto md:w-1/2">
                <img
                        aria-hidden="true"
                        class="object-cover w-full h-full dark:hidden"
                        src="../../assets/login-office.jpeg"
                        alt="Office"
                />
              
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                  
              
                  <h1 class=" mb-4 justify-center dark:text-gray-300 text-center items-center text-xl font-semibold text-gray-700 " >
                        PruebaTecnica
                  </h1>
             
                  
                    <h1 class="mb-4 text-xl dark:text-gray-300 font-semibold text-gray-700">
                        Inicio de sesión
                    </h1>
                    <x-jet-validation-errors class="mb-4" />

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                         {{ session('status') }}
                        </div>
                        @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-300">Gmail</span>
                            <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Ingresar"
                                    type="email" name="email" required
                                    autofocus
                            />
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-300">Contraseña</span>
                            <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="password"
                                    type="password"
                                  
                                    name="password"
                                    required autocomplete="current-password"
                            />
                        </label>


                        <!-- You should use a button here, as the anchor is only used for the example  -->
                        <button
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                                type="submit"
                        >
                            Ingresar
                        </button>
                    </form>

                    <hr class="my-8"/>


                    <p class="mt-1">
                        <!--
                        <a
                                class="text-sm font-medium text-green-600 dark:text-green-400 hover:underline"
                                href="{{ route('register') }}"
                        >
                            Crear cuenta
                        </a>
-->
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

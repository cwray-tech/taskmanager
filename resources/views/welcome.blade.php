<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>
    <link rel="icon"
          type="image/svg"
          href="/logo.svg">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
<div class="relative bg-gray-50 overflow-hidden">
    <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full">
        <div class="relative h-full max-w-screen-xl mx-auto">
            <svg class="absolute right-full transform translate-y-1/4 translate-x-1/4 lg:translate-x-1/2" width="404"
                 height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                             patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"/>
            </svg>
            <svg
                class="absolute left-full transform -translate-y-3/4 -translate-x-1/4 md:-translate-y-1/2 lg:-translate-x-1/2"
                width="404" height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="5d0dd344-b041-4d26-bec4-8d33ea57ec9b" x="0" y="0" width="20" height="20"
                             patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#5d0dd344-b041-4d26-bec4-8d33ea57ec9b)"/>
            </svg>
        </div>
    </div>

    <div class="relative pt-6 pb-12 sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6">
            <nav class="relative flex items-center justify-between sm:h-10 md:justify-center">
                <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="/" aria-label="Home">
                            <img class="h-8 w-auto sm:h-10"
                                 src="/logo.svg" alt="Logo">
                        </a>
                    </div>
                </div>

                <div class="md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
          <span class="inline-flex rounded-md shadow">
              @auth
                  <a href="/dashboard"
                     class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-gray-600 bg-white hover:text-gray-500 focus:outline-none focus:border-gray-300 focus:shadow-outline-gray active:bg-gray-50 active:text-gray-700 transition duration-150 ease-in-out">
              Dashboard
            </a>
              @else
                  <a href="/login"
                     class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-gray-600 bg-white hover:text-gray-500 focus:outline-none focus:border-gray-300 focus:shadow-outline-gray active:bg-gray-50 active:text-gray-700 transition duration-150 ease-in-out">
              Log in
            </a>
              @endauth
          </span>
                </div>
            </nav>
        </div>

        <main class="mt-10 mx-auto flex flex-col items-center justify-center min-h-screen max-w-screen-xl px-4 pb-40">
            <div class="text-center">
                <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-600 sm:text-5xl sm:leading-none md:text-6xl">
                    Task
                    <br class="xl:hidden">
                    <span class="text-gray-900">Manager</span>
                </h2>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Get your teams tasks under control.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    @guest
                        <div class="rounded-md shadow">
                            <a href="/register"
                               class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Get started
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="/login"
                               class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-gray-600 bg-white hover:text-gray-500 focus:outline-none focus:border-gray-300 focus:shadow-outline-gray transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Login
                            </a>
                        </div>
                    @else
                        <div class="rounded-md shadow">
                            <a href="/dashboard"
                               class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                Go To Dashboard
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>

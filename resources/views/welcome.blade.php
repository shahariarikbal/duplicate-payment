<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

        @toastifyCss
    </head>
    <body>
        <div class="flex items-center justify-center min-h-screen mt-10">
            <form class="max-w-sm w-full bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg space-y-6" action="{{ route('amount.store') }}" method="POST">
                @csrf
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select User</label>
                    <select id="role" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                    <input type="text" id="price" name="amount" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="e.g. 5200" required />
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-base px-6 py-3 text-center shadow-md transition-all duration-200 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </div>
            </form>
        </div>


        @toastifyJs
    </body>
</html>

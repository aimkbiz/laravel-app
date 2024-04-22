
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/userTodo" method="post">
                        {{ csrf_field() }}
                        <table>
                            <tr>
                                <td><input id="todo" name="todo" type="text" size="100" /><br /><br /> </td>
                                <td><input type="submit" value="作成" /><br /> <br /></td>
                            </tr>
                        </table>
                    </form>
                    <div class="grid gap-4 grid-cols-2">
                        <table>
                        @foreach ($aiChats as $todo)
                            <tr>
                                <form action="/userTodo" method="post">  
                                <td>
                                    {{ $todo->chat }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

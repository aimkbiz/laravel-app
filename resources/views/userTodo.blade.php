
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
                        @foreach ($todos as $todo)
                            <tr>
                                <td>
                                    <div>{{ $todo->status }}</div>
                                </td>
                                <form action="/userTodo" method="post">  
                                @method('PUT')  
                                {{ csrf_field() }}  
                                <td>
                                    <input id="todo" name="todo" type="text" size="100" value="{{ $todo->todo }}" /><br /><br /> 
                                    <input type="hidden" name="id" value="{{ $todo->id }}"/>  
                                </td>
                                <td>
                                    <input type="submit" value="更新"/>  
                                </td>
                                </form>
                                <td>
                                    <form action="/userTodo" method="post">  
                                        @method('DELETE')  
                                        {{ csrf_field() }}  
                                        <input type="hidden" name="id" value="{{ $todo->id }}"/>  
                                        <input type="submit" value="削除"/>  
                                    </form>
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

import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function userTodo({ auth, todos }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        todo: '',
    });
    const list = []
    for (const [i, todo] of todos.entries()) {
        list.push(<p>{todo.todo}</p>)
    }
    useEffect(() => {
        return () => {
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route('userTodo.create'));
    };

    return (
        <GuestLayout>
            <Head title="やりたいことリスト" />
            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}
            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="todo" value="やりたいこと" />
                    <TextInput id="todo" type="text" name="todo" value={data.todo} className="mt-1 block w-full"
                        onChange={(e) => setData('todo', e.target.value)}
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>
                <div className="flex items-center justify-end mt-4">
                    <PrimaryButton className="ms-4" disabled={processing}>
                        登録
                    </PrimaryButton>
                </div>
                { list }
            </form>
        </GuestLayout>
    );
}

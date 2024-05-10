import React, { useState, useEffect } from "react";
import axios from 'axios';
import PrimaryButton from '@/Components/PrimaryButton';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const REACT_APP_HOST_URL = "http://157.7.196.170";


export default function userTodo({ auth }) {
    const [categoryList, setCategoryList ] = useState([]);
    
    useEffect(() => {
      axios.get("/getUserTodo").then((response) => {
        setCategoryList(response.data);
      });
    }, []);

    const saveUserTodo = () => {
        axios.post('/getUserTodo', { todo: document.getElementById('todo').value }).then((response) => {
            console.log(response);
        }).catch((error) => console.log(error));
    };

    const updateUserTodo = (idVal) => {
        axios.post('/updateUserTodo', { id: idVal, todo: document.getElementById('todo' + idVal).value }).then((response) => {
            console.log(response);
        }).catch((error) => console.log(error));
    };

    const deleteUserTodo = (idVal) => {
        axios.post('/deleteUserTodo', { id: idVal }).then((response) => {
            console.log(response);
        }).catch((error) => console.log(error));
    };

    return (
        <AuthenticatedLayout
        user={auth.user}
        header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
        <div>
         <center><br /><br />
         <form onSubmit={saveUserTodo}>
            <p>
                <input type="text" name="todo" id="todo" />
                <PrimaryButton className="ms-5 bg-gradient-to-br from-red-300 to-red-800 hover:bg-gradient-to-tl text-white rounded px-4 py-2" >登録</PrimaryButton>
            </p><br /><br />
         </form>
           <table class="w-fit">
           {categoryList.map((val, index) => {
             return <tr key={index}>
                    <td className="w-2/5">
                        {val.todo}
                    </td>
                    <td className="w-2/5">
                    <form onSubmit={() => updateUserTodo(val.id)}>
                        <input type="text" name="todo" id={"todo" + val.id} />
                        <PrimaryButton className="ms-4" >変更</PrimaryButton>
                    </form>
                    </td>
                    <td className="w-1/5">
                        <form onSubmit={() => deleteUserTodo(val.id)}>
                            <PrimaryButton className="ms-4" >削除</PrimaryButton>
                        </form>
                    </td>
                </tr>
           })}
           </table>
         </center>
       </div>
       </AuthenticatedLayout>
    )
}

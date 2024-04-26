import React, { useState, useEffect } from "react";
import axios from 'axios';
import PrimaryButton from '@/Components/PrimaryButton';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const REACT_APP_HOST_URL = "http://157.7.196.170";


export default function userTodo({ auth }) {
    const [categoryList, setCategoryList ] = useState([]);
    
    useEffect(() => {
      axios.get(REACT_APP_HOST_URL + "/getUserTodo").then((response) => {
        setCategoryList(response.data);
      });
      async function fetchData() {
          const response = await fetch(REACT_APP_HOST_URL + "/ip")
          const data = await response.json()

          axios.post(REACT_APP_HOST_URL + '/saveUserAccess', { ip: data.ip }, {
              headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          }).then((response) => {
              console.log('success');
          });
      }
      //fetchData()
    }, []);

    const saveUserTodo = () => {
        axios.post(REACT_APP_HOST_URL + '/getUserTodo', { todo: document.getElementById('todo').value }).then((response) => {
            console.log(response);
        }).catch((error) => console.log(error));
    };

    const updateUserTodo = (idVal) => {
        axios.post(REACT_APP_HOST_URL + '/updateUserTodo', { id: idVal, todo: document.getElementById('todo' + idVal).value }).then((response) => {
            console.log(response);
        }).catch((error) => console.log(error));
    };

    const deleteUserTodo = (idVal) => {
        axios.post(REACT_APP_HOST_URL + '/deleteUserTodo', { id: idVal }).then((response) => {
            console.log(response);
        }).catch((error) => console.log(error));
    };

    return (
        <AuthenticatedLayout
        user={auth.user}
        header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
        <div>
         <center>
         <form onSubmit={saveUserTodo}>
            <p>
                <input type="text" name="todo" id="todo" />
                <PrimaryButton className="ms-4" >登録</PrimaryButton>
            </p><br /><br />
         </form>
           {categoryList.map((val, index) => {
             return <p key={index}>
                <table>
                    <tr>
                        <td>
                            <form onSubmit={() => updateUserTodo(val.id)}>
                                {val.todo}<input type="text" name="todo" id={"todo" + val.id} />
                                <PrimaryButton className="ms-4" >変更</PrimaryButton>
                            </form>
                        </td>
                        <td>
                            <form onSubmit={() => deleteUserTodo(val.id)}>
                                <PrimaryButton className="ms-4" >削除</PrimaryButton>
                            </form>
                        </td>
                    </tr>
                </table>
                </p>
           })}
         </center>
       </div>
       </AuthenticatedLayout>
    )
}

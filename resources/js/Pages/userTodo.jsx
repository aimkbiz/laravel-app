import React, { useState, useEffect } from "react";
import axios from 'axios';
import PrimaryButton from '@/Components/PrimaryButton';

const REACT_APP_HOST_URL = "http://157.7.196.170";


function userTodo() {
    const [categoryList, setCategoryList] = useState([]);
    
    useEffect(() => {
      axios.get(REACT_APP_HOST_URL + "/getUserTodo").then((response) => {
        setCategoryList(response.data);
      });

      //axios.post(REACT_APP_DB_HOST_URL + "/getAiChatList").then((response) => {
      //  setAiChatList(response.data);
      //});
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
            //setBooks(books.filter((book) => book.id !== id));
        }).catch((error) => console.log(error));
    };

    const updateUserTodo = (idVal) => {
        
        alert(idVal + document.getElementById('todo' + idVal).value);
        axios.post(REACT_APP_HOST_URL + '/updateUserTodo', { id: idVal, todo: document.getElementById('todo' + idVal).value }).then((response) => {
            console.log(response);
            //setBooks(books.filter((book) => book.id !== id));
        }).catch((error) => console.log(error));
    };

    const deleteUserTodo = (idVal) => {
        alert(idVal);
        //axios.delete(REACT_APP_HOST_URL + '/getUserTodo', { sss: id}).then((response) => {
        axios.post(REACT_APP_HOST_URL + '/deleteUserTodo', { id: idVal }).then((response) => {
            console.log(response);
            //setBooks(books.filter((book) => book.id !== id));
        }).catch((error) => console.log(error));
    };

    return (
        <div>
         <center>
         <img src="http://aimkbiz.com/img/gif/aimkbiz6_1.gif" width="300" /><br /><br />
         <form onSubmit={saveUserTodo}>
            <p>
                <input type="text" name="todo" id="todo" />
                <PrimaryButton className="ms-4" >登録</PrimaryButton>
            </p>
         </form>
           {categoryList.map((val, index) => {
             return <p key={index}>
                <form onSubmit={() => updateUserTodo(val.id)}>
                    {val.todo}<input type="text" name="todo" id={"todo" + val.id} />
                    <PrimaryButton className="ms-4" >変更</PrimaryButton>
                </form>
                <form onSubmit={() => deleteUserTodo(val.id)}>
                    {val.id}
                    <PrimaryButton className="ms-4" >削除</PrimaryButton>
                </form>
                </p>
           })}
         </center>
       </div>
    )
}

export default userTodo
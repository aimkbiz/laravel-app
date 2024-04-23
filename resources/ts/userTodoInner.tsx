import React, { useState, useEffect } from 'react';
import axios from 'axios';

const UserTodoInner: React.FC = () => {
  const [accessList, setAccessList] = useState([]);
    useEffect(()=>{
        const fetchFromLaravel = async () => {
            const res  = await axios.get(`/api/userTodo`);
            setAccessList(res.data.hoge);
        };
        fetchFromLaravel();
    }, [])

    return (
        <div className="UserTodoInner">
             {accessList.map((val, index) => {
               return <p key={index}>{val.todo}</p>
             })}
        </div>
        
    );
}

export default UserTodoInner;
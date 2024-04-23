import React, { useState, useEffect } from 'react';
import axios from 'axios';

const UserTodoInner: React.FC = () => {
  const [accessList, setAccessList] = useState([]);
    useEffect(()=>{
        const fetchFromLaravel = async () => {
            const res  = await axios.get(`/api/aiChat`);
            setAccessList(res.data.aiChat);
        };
        fetchFromLaravel();
    }, [])

    return (
        <div className="UserTodoInner">
             {accessList.map((val, index) => {
               return <p key={index}>{val.chat}</p>
             })}
        </div>
        
    );
}

export default UserTodoInner;
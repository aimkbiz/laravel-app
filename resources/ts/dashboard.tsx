import React from 'react';
import { createRoot } from 'react-dom/client';
import UserTodoInner from './userTodoInner';
import AiChat from './aiChat';

const container = document.getElementById('app');
const root = createRoot(container!);

root.render(
  <React.StrictMode>
    <div className="text-blue">
        Hello World!2222333
        <UserTodoInner />
        <AiChat />
    </div>
    </React.StrictMode>,
);
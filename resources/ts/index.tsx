import React from 'react';
import { createRoot } from 'react-dom/client';

const container = document.getElementById('app');
const root = createRoot(container!);

root.render(
  <React.StrictMode>
    <div className="text-blue">
        Hello World!2222333 <br /><br />
        <a href="/login">ログイン</a><br /><br />
        <a href="/register">登録</a><br />
    </div>
    </React.StrictMode>,
);

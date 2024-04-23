import React from 'react';
import { createRoot } from 'react-dom/client';

const container = document.getElementById('app');
const root = createRoot(container!);

root.render(
  <React.StrictMode>
    <div className="text-blue">
        Hello World!2222333
    </div>
    </React.StrictMode>,
);
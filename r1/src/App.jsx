import './App.scss';
import { BooksProvider } from './Components/BooksContext';
import Layout from './Components/Layout';

export default function App() {
  return (
    <BooksProvider>
    <div className="app">
      <div className="bin">
        <Layout />
      </div>
    </div>
    </BooksProvider>
  );
}
import { useContext } from 'react';
import { BooksContext } from './BooksContext';
import Books from './Books';

export default function Layout() {

    const { books } = useContext(BooksContext);

    return (
        <div className="layout">

            {
            books === null 
            ? 
            <div className="loading">Loading...</div>
            :
            <Books/>

        }
            
        </div>
    )
}
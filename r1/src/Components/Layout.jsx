import { useContext } from 'react';
import { BooksContext } from './BooksContext';
import Books from './Books';
import Top from './Top';

export default function Layout() {

    const { books } = useContext(BooksContext);

    return (
        <div className="layout">
            <Top/>
            {
            books === null 
            ? 
            <div className="loading">Kraunasi knygos...</div>
            :
            <Books/>

        }
            
        </div>
    )
}
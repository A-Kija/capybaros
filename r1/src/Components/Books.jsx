import { useContext } from 'react';
import { BooksContext } from './BooksContext';
import Book from './Book';

export default function Books() {

    const { books } = useContext(BooksContext);

    return (
        <div className="books">
            {
            books.map(book => <Book key={book.id} book={book}/>)
            }

        </div>
    )
}
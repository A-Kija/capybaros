import { useContext } from 'react';
import { BooksContext } from './BooksContext';

export default function Book({ book }) {

    const { title, author, type, price, img } = book;
    const { types } = useContext(BooksContext);

    return (
        <div className="book">
            <div className="book__image">
                <img src={img} alt={title} />
            </div>
            <div className="book__title">{title}</div>
            <div className="book__author">{author}</div>
            <div className="book__type">{types !== null ? types.find(t => t.id === type).title : ''}</div>
            <div className="book__price">{price} EUR</div>
        </div>
    );
}
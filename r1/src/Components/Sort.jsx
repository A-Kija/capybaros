import { useState, useContext, useEffect } from 'react';
import { BooksContext } from './BooksContext';

const sorts = [
    { title: 'Nerūšiuota', id: 0 },
    { title: 'Pavadinimas ↑', id: 1 },
    { title: 'Pavadinimas ↓', id: 2 },
    { title: 'Kaina ↑', id: 3 },
    { title: 'Kaina ↓', id: 4 },
];

export default function Sort() {

    const [sort, setSort] = useState(0);

    const { setBooks, books } = useContext(BooksContext);

    useEffect(_ => {

        if (books === null) {
            return;
        }

        switch (sort) {
            case 0:
                setBooks(prev => [...prev].sort((a, b) => a.row - b.row));
                break;
            case 1:
                setBooks(prev => [...prev].sort((a, b) => a.title.localeCompare(b.title)));
                break;
            case 2:
                setBooks(prev => [...prev].sort((a, b) => b.title.localeCompare(a.title)));
                break;
            case 3:
                setBooks(prev => [...prev].sort((a, b) => a.price - b.price));
                break;
            case 4:
                setBooks(prev => [...prev].sort((a, b) => b.price - a.price));
                break;
            default:
        }

    }, [sort]);

    return (
        <div className="sort">
            {
                sorts.map(s => <div key={s.id} className="sort__button" style={
                    {
                        color: sort === s.id ? 'crimson' : null,
                        cursor: sort === s.id ? 'default' : 'pointer'
                    }
                } onClick={_ => setSort(s.id)}>{s.title}</div>)
            }
        </div>
    )
}
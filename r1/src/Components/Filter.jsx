import { useContext, useEffect, useState } from 'react';
import { BooksContext } from './BooksContext';

export default function Filter() {

    const { types, setBooks} = useContext(BooksContext);

    const [filter, setFilter] = useState(0);

    // const handleFilter = e => {
    //     setFilter(parseInt(e.target.value));
    //     if (parseInt(e.target.value) === 0) {
    //         setBooks(bk => bk.map(b => ({...b, show: true})));
    //         return;
    //     }
    //     setBooks(bk => bk.map(b => (b.type === parseInt(e.target.value) ? {...b, show: true} : {...b, show: false})));
    // }

    useEffect(_ => {
        if (types === null) {
            return;
        }
        const f = parseInt(filter);
        if (f === 0) {
            setBooks(bk => bk.map(b => ({...b, show: true})));
            return;
        }
        setBooks(bk => bk.map(b => (b.type === f ? {...b, show: true} : {...b, show: false})));
    }, [filter, setBooks, types]);

    if (types === null) {

        return (
            <div className="filter">
                <select defaultValue={0}>
                    <option value={0} disabled>Filtras Kraunasi</option>
                </select>
            </div>
        );
    }

    return (
        <div className="filter">
            <select value={filter} onChange={e => setFilter(e.target.value)}>
                <option value={0}>Visos knygos</option>
                {
                    types.map(t => <option key={t.id} value={t.id}>{t.title}</option>)
                }
            </select>
        </div>
    );

}


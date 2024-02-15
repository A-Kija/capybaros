import Delete from './Delete';
import List from './List';
import './style.scss';
import { useContext } from 'react';
import { Data } from './Data';

export default function Layout() {

    const { deleteColor } = useContext(Data);

    return (
        <main>
            <div className="bin">
                <h1>Colors</h1>
                <List />
                {deleteColor && <Delete />}
            </div>

        </main>
    );
}
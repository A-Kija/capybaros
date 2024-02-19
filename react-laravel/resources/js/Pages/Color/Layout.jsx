import Delete from './Delete';
import Edit from './Edit';
import Create from './Create';
import List from './List';
import './style.scss';
import { useContext } from 'react';
import { Data } from './Data';
import {Head} from '@inertiajs/react';

export default function Layout() {

    const { deleteColor, editColor, createColor } = useContext(Data);

    return (
        <>
        <Head title="Magic Colors Balls" />
        <main>
            <div className="bin">
                <h1>Colors</h1>
                <List />
                {deleteColor && <Delete />}
                {editColor && <Edit />}
                {createColor && <Create />}
            </div>

        </main>
        </>
    );
}
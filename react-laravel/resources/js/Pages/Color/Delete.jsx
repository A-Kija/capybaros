import { useContext } from 'react';
import { Data } from './Data';

export default function Delete() {

    const { deleteColor, setDeleteColor, setDestroyColor } = useContext(Data);

    const submit = _ => {
        setDestroyColor(deleteColor);
        setDeleteColor(null);
    }

    return (
        <div className="modal-delete">
            <div className="modal">
                <h2>Delete Color {deleteColor.hex}</h2>
                <p>Are you sure you want to delete this color?</p>
                <div className="buttons">
                    <button className="no" onClick={_ => setDeleteColor(null)}>Cancel</button>
                    <button className="yes" onClick={submit}>Delete</button>
                </div>
            </div>
        </div>
    );
}
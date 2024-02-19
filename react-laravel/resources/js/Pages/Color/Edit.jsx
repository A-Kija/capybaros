import { useContext, useState } from 'react';
import { Data } from './Data';

export default function Edit() {

    const { editColor, setEditColor, setUpdateColor } = useContext(Data);
    const [hex, setHex] = useState(editColor.hex);
    const [size, setSize] = useState(editColor.size);

    const submit = _ => {
        setUpdateColor({
            new: {
                id: editColor.id,
                hex,
                size,
            },
            old: editColor
        });
        setEditColor(null);
    }

    return (
        <div className="modal-edit">
            <div className="modal">
                <h2>Edit Color {editColor.hex}</h2>
                <div className="form">
                    <label>Hex:</label>
                    <input type="color" value={hex} onChange={e => setHex(e.target.value)} />
                    <label>Size {size}:</label>
                    <input type="range" min="100" max={200} value={size} onChange={e => setSize(+e.target.value)} />
                </div>
                
                <div className="buttons">
                    <button className="no" onClick={_ => setEditColor(null)}>Cancel</button>
                    <button className="save" onClick={submit}>Save</button>
                </div>
            </div>
        </div>
    );
}
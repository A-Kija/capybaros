import { useContext, useState } from 'react';
import { Data } from './Data';

export default function Create() {

    const { createColor, setCreateColor, setStoreColor } = useContext(Data);
    const [hex, setHex] = useState(createColor.hex);
    const [size, setSize] = useState(createColor.size);

    const submit = _ => {
        setStoreColor({
            hex,
            size,
        });
        setCreateColor(null);
    }

    return (
        <div className="modal-create">
            <div className="modal">
                <h2>Create Color {createColor.hex}</h2>
                <div className="form">
                    <label>Hex:</label>
                    <input type="color" value={hex} onChange={e => setHex(e.target.value)} />
                    <label>Size {size}:</label>
                    <input type="range" min="100" max={200} value={size} onChange={e => setSize(+e.target.value)} />
                </div>

                <div className="buttons">
                    <button className="no" onClick={_ => setCreateColor(null)}>Cancel</button>
                    <button className="save" onClick={submit}>Save</button>
                </div>
            </div>
        </div>
    );
}
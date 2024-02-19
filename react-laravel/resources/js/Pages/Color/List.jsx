import { useContext } from 'react';
import { Data } from './Data';

export default function List() {

    const { colors, setDeleteColor, setEditColor, setCreateColor } = useContext(Data);

    return (
        <>
        <div className="colors">
            {
                colors.map(color => {
                    return color.deleted ? null : (
                        <div key={color.id} className="color" style={{
                            backgroundColor: color.hex + '66',
                            border: '4px solid ' + color.hex,
                            width: color.size + 'px',
                            height: color.size + 'px',
                            opacity: color.temp ? 0.2 : 1
                        }}>
                            {!color.temp &&
                            <div className="buttons">
                                <p>Actions:</p>
                                <button className="edit" onClick={_ => setEditColor(color)}>Edit</button>
                                <button className="delete" onClick={_ => setDeleteColor(color)}>Delete</button>
                            </div>
                            }
                            <p>{color.hex}</p>
                        </div>
                    );
                })
            }

        </div>
        <button className="create" onClick={_ => setCreateColor({hex: '#000000', size: 100})}>Create</button>
        </>
    );
}
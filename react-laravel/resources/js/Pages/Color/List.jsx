import { useContext } from 'react';
import { Data } from './Data';

export default function List() {

    const { colors, setDeleteColor } = useContext(Data);

    return (
        <div className="colors">
            {
                colors.map(color => {
                    return color.deleted ? null : (
                        <div key={color.id} className="color" style={{
                            backgroundColor: color.hex + '66',
                            border: '4px solid ' + color.hex,
                            width: color.size + 'px',
                            height: color.size + 'px'
                        }}>
                            <div className="buttons">
                                <p>Actions:</p>
                                <button className="edit">Edit</button>
                                <button className="delete" onClick={_ => setDeleteColor(color)}>Delete</button>
                            </div>
                            <p>{color.hex}</p>
                        </div>
                    );
                })
            }

        </div>
    );
}
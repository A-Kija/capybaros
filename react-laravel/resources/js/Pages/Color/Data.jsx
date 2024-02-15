import { createContext, useState } from 'react';
import useColorRequest from './useColorRequest';

export const Data = createContext();


export const DataProvider = ({ children, data }) => {

    const [colors, setColors] = useState(data.colors);
    const [deleteColor, setDeleteColor] = useState(null);

    const { destroyColor, setDestroyColor } = useColorRequest(setColors);


    return (
        <Data.Provider value={{
            ...data, colors, setColors, 
            deleteColor, setDeleteColor,
            destroyColor, setDestroyColor
            
            }}>
            {children}
        </Data.Provider>
    );
}
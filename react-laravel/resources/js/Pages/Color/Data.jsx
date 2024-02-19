import { createContext, useState } from 'react';
import useColorRequest from './useColorRequest';

export const Data = createContext();


export const DataProvider = ({ children, data }) => {

    const [colors, setColors] = useState(data.colors);
    const [deleteColor, setDeleteColor] = useState(null);
    const [editColor, setEditColor] = useState(null);
    const [createColor, setCreateColor] = useState(null);

    const { destroyColor, setDestroyColor, updateColor, setUpdateColor,storeColor, setStoreColor } = useColorRequest(setColors);


    return (
        <Data.Provider value={{
            ...data, colors, setColors, 
            deleteColor, setDeleteColor,
            destroyColor, setDestroyColor,
            editColor, setEditColor,
            updateColor, setUpdateColor,
            createColor, setCreateColor,
            storeColor, setStoreColor
            
            }}>
            {children}
        </Data.Provider>
    );
}
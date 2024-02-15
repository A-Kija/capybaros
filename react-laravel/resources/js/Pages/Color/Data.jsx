import { createContext } from 'react';

export const Data = createContext();


export const DataProvider = ({ children, data }) => {
    return (
        <Data.Provider value={{...data}}>
            {children}
        </Data.Provider>
    );
}
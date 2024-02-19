import { useEffect, useState } from 'react';
import axios from 'axios';
import { v4 as uuidv4 } from 'uuid';
const URL = 'http://127.0.0.1:8000/colors';

export default function useColorRequest(setColors) {

    const [destroyColor, setDestroyColor] = useState(null);
    const [updateColor, setUpdateColor] = useState(null);
    const [storeColor, setStoreColor] = useState(null);


    useEffect(_ => {
        if (storeColor !== null) {
            const tempId = uuidv4();
            const newColor = {
                id: tempId,
                hex: storeColor.hex,
                size: storeColor.size,
                temp: true
            };
            setColors(c => [...c, newColor]);
            axios.post(URL, storeColor)
                .then(response => {
                    setColors(c => c.map(color => {
                        if (color.id === tempId) {
                            return {...color, temp: false, id: response.data.id};
                        }
                        return color;
                    }));
                    setStoreColor(null);
                })
                .catch(error => {
                    setColors(c => c.filter(color => color.id !== tempId));
                    console.log(error)
                });
        }
    }, [storeColor, setColors]);


    useEffect(_ => {
        if (destroyColor !== null) {
            setColors(c => c.map(color => {
                if (color.id === destroyColor.id) {
                    return { ...color, deleted: true };
                }
                return color;
            }));
            axios.delete(`${URL}/${destroyColor.id}`)
                .then(response => {
                    setColors(c => c.filter(color => color.id !== destroyColor.id));
                    setDestroyColor(null);
                })
                .catch(error => {
                    setColors(c => c.map(color => {
                        if (color.id === destroyColor.id) {
                            return { ...color, deleted: false };
                        }
                        return color;
                    }));
                    console.log(error)
                });
        }
    }, [destroyColor, setColors]);

    useEffect(_ => {
        if (updateColor !== null) {
            setColors(c => c.map(color => {
                if (color.id === updateColor.old.id) {
                    return {...updateColor.new, temp: true};
                }
                return color;
            }));
            axios.put(`${URL}/${updateColor.new.id}`, updateColor.new)
                .then(response => {
                    setColors(c => c.map(color => {
                        if (color.id === updateColor.new.id) {
                            return {...updateColor.new, temp: false};
                        }
                        return color;
                    }));
                    setUpdateColor(null);
                })
                .catch(error => {
                    setColors(c => c.map(color => {
                        if (color.id === updateColor.old.id) {
                            return updateColor.old;
                        }
                        return color;
                    }));
                    console.log(error)
                });
        }
    }, [updateColor, setColors]);


    return { destroyColor, setDestroyColor, updateColor, setUpdateColor, storeColor, setStoreColor};

}

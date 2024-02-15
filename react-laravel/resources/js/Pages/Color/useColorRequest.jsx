import { useEffect, useState } from 'react';
import axios from 'axios';
const URL = 'http://127.0.0.1:8000/colors';

export default function useColorRequest(setColors) {

    const [destroyColor, setDestroyColor] = useState(null);

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


    return { destroyColor, setDestroyColor };

}

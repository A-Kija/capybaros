import { useState } from 'react';

export default function Important() {

    const [count, setCount] = useState(0);

    const doCount = _ => {

        setCount(c => c < 5 ? c + 1 : c);

        setCount(c => c < 5 ? c + 1 : c);

        setCount(c => c < 5 ? c + 1 : c);
        
    }

    return (
        <>
        <h2>JA: {count}</h2>
        <button onClick={doCount}>+</button>
        </>
    );



}



import { createContext, useEffect, useState } from 'react';
import axios from 'axios';

export const BooksContext = createContext();

const booksUrl = 'https://in3.dev/knygos/';
const typesUrl = 'https://in3.dev/knygos/types/';


export const BooksProvider = ({children}) => {

    const [books, setBooks] = useState(null);

    useEffect(_ => {
        axios.get(booksUrl)
        .then(res => {
            setBooks(res.data);
            console.log(res.data);
        });
    }, []);



  return (
    <BooksContext.Provider value={{
        books
    }}>
      {children}
    </BooksContext.Provider>
  )
}
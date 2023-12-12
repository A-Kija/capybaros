import { createContext, useEffect, useState } from 'react';
import axios from 'axios';

export const BooksContext = createContext();

const booksUrl = 'https://in3.dev/knygos/';
const typesUrl = 'https://in3.dev/knygos/types/';


export const BooksProvider = ({ children }) => {

  const [books, setBooks] = useState(null);
  const [types, setTypes] = useState(null);

  useEffect(_ => {
    axios.get(booksUrl)
      .then(res => {
        setBooks(res.data.map((b, i) => ({...b, show: true, row: i})));
      });
  }, []);

  useEffect(_ => {
    axios.get(typesUrl)
      .then(res => {
        setTypes(res.data);
        console.log(res.data);
      });

  }, []);



  return (
    <BooksContext.Provider value={
      {
        books: books,
        types,
        setBooks,
        setTypes
      }
    }>
      {children}
    </BooksContext.Provider>
  )
}
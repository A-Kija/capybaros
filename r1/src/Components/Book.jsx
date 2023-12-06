export default function Book({book}) {

    const { id, title, author, type, price, img } = book;

    return (
        <div className="book">
            <div className="book__image">
                <img src={img} alt={title} />
            </div>
            <div className="book__title">{title}</div>
            <div className="book__author">{author}</div>
            <div className="book__type">{type}</div>
            <div className="book__price">{price}</div>
        </div>
    );
}
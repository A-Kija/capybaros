import Filter from "./Filter";
import Sort from "./Sort";

export default function Top() {

    return (
        <div className="top">
            <div className="top__title">Knygų parduotuvė</div>
            <div className="top__buttons">
                <Filter />
                <Sort />
            </div>
            <div className="top__subtitle">Knygų sąrašas</div>
        </div>
    )
}
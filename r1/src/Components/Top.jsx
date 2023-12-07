import Filter from "./Filter";

export default function Top() {

    return (
        <div className="top">
            <div className="top__title">Knygų parduotuvė</div>
            <div className="top__buttons">
                <Filter />
            </div>
            <div className="top__subtitle">Knygų sąrašas</div>
        </div>
    )
}
class Stikline {
    constructor(turis) {
        this.turis = turis;
        this.kiekis = 0;
    }

    ipilti(kiekis) {
        this.kiekis = Math.min(this.turis, this.kiekis + kiekis);
        return this;
    }

    ispilti() {
        const kiekis = this.kiekis;
        this.kiekis = 0;
        return kiekis;
    }

    stiklinejeYra() {
        console.log(this.kiekis);
    }
}

const s100 = new Stikline(100);
const s150 = new Stikline(150);
const s200 = new Stikline(200);

// s100.ipilti(s200.ipilti(s150.ipilti(500).ispilti()).ispilti());

// s100.stiklinejeYra();
// s150.stiklinejeYra();
// s200.stiklinejeYra();

s100.ipilti(30).stiklinejeYra();


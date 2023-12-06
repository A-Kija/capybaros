class Grybas {
    constructor() {
        this.svoris = this.rand(5, 45);
        this.valgomas = !this.rand(0, 1);
        this.sukirmijes = !this.rand(0, 1);
    }

    rand(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
}

class Krepsys {
    constructor() {
        this.dydis = 500;
        this.prikrauta = 0;
    }

    prideti(grybas) {
        if (!grybas.sukirmijes && grybas.valgomas) {
            this.prikrauta += grybas.svoris;
        }
        return this.dydis >= this.prikrauta;
    }
}

const krepsys = new Krepsys();


while (krepsys.prideti(new Grybas())) {}


console.log(krepsys);
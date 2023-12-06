class Kibiras1 {
    constructor() {
        this.akmenuKiekis = 0;
    }
    prideti1Akmeni() {
        this.akmenuKiekis++;
    }
    pridetiDaugAkmenu(kiekis) {
        this.akmenuKiekis += kiekis;
    }
    kiekPririnktaAkmenu() {
        console.log('Akmenų kiekis:', this.akmenuKiekis);
    }
}


const kibiras1 = new Kibiras1();
const kibiras2 = new Kibiras1();
const kibiras3 = new Kibiras1();

kibiras1.prideti1Akmeni();
kibiras1.prideti1Akmeni();
kibiras1.prideti1Akmeni();
kibiras1.pridetiDaugAkmenu(10);

kibiras2.prideti1Akmeni();

kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.prideti1Akmeni();
kibiras3.pridetiDaugAkmenu(100);


kibiras1.kiekPririnktaAkmenu();
kibiras2.kiekPririnktaAkmenu();
kibiras3.kiekPririnktaAkmenu();
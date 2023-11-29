console.log('Welcome to magic farm');

const farm = [
    'Cow',
    'Pig',
    'Chicken',
    'Dog',
    'Cat',
    'Cow',
    'Horse',
    'Sheep',
    'Goat',
    'Cow',
    'Duck',
    'Cat',
    'Turkey',
];

// Kindergarden
let cowsSum1 = 0;
for (let i = 0; i < farm.length; i++) {
    if (farm[i] == 'Cow') {
        cowsSum1++;
    }
}
console.log('cowsSum1', cowsSum1);

// Middle school
let cowsSum2 = 0;
for (const animal of farm) {
    if (animal == 'Cow') {
        cowsSum2++;
    }
}
console.log('cowsSum2', cowsSum2);

// High school
let cowsSum3 = 0;
farm.forEach(animal => animal == 'Cow' ? cowsSum3++ : null);

console.log('cowsSum3', cowsSum3);

let cowsSum4 = 0;
// University
farm.forEach(animal => animal == 'Cow' && cowsSum4++);

console.log('cowsSum4', cowsSum4);

const farm2 = [
    { name: 'Cow', age: 5 },
    { name: 'Pig', age: 3 },
    { name: 'Chicken', age: 1 },
    { name: 'Dog', age: 2 },
    { name: 'Cat', age: 4 },
    { name: 'Cow', age: 7 },
    { name: 'Horse', age: 4 },
    { name: 'Sheep', age: 6 },
    { name: 'Goat', age: 3 },
    { name: 'Cow', age: 2 },
    { name: 'Duck', age: 1 },
    { name: 'Cat', age: 2 },
    { name: 'Turkey', age: 3 },
];

// Kindergarden
let cowsAgeSum5 = 0;
for (let i = 0; i < farm2.length; i++) {
    if (farm2[i].name == 'Cow') {
        cowsAgeSum5 += farm2[i].age;
    }
}
console.log('cowsAgeSum5', cowsAgeSum5);

// Middle school
let cowsAgeSum6 = 0;
for (const animal of farm2) {
    if (animal.name == 'Cow') {
        cowsAgeSum6 += animal.age;
    }
}

console.log('cowsAgeSum6', cowsAgeSum6);

// High school
let cowsAgeSum7 = 0;
farm2.forEach(animal => animal.name == 'Cow' ? cowsAgeSum7 += animal.age : null);

console.log('cowsAgeSum7', cowsAgeSum7);

// University
let cowsAgeSum8 = 0;
farm2.forEach(animal => animal.name == 'Cow' && (cowsAgeSum8 += animal.age));

console.log('cowsAgeSum8', cowsAgeSum8);

let A = 5;
let B = A; // by value

A = 10;

console.log('A', A);
console.log('B', B);

let C = { value: 5 };
let D = C; // by reference

C.value = 10;

console.log('C', C);
console.log('D', D);

let E = 12;
let F = 12;

console.log(E == F);

let G = { value: 12 };
let H = { value: 12 };

console.log(G == H);

// rest and spread


// ,,,,,,,,,,, => [] rest
// {} => ,,,,,,,,,,,, spread

const sum = (a, ...numbers) => {
    console.log('numbers', numbers);
    let result = 0;
    for (const number of numbers) {
        result += number;
    }
    console.log('result', result, a);
}


sum(5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23);

let V = { value: 5, name: 'Vasya', age: 25, hasCat: true };
let I = { age: 44, ...V, hasCat: false };

V.value = 10;

console.log('V', V);
console.log('I', I);

const mas1 = [1, 2, 3, 4, 5];
const obj1 = { value: 5, name: 'Vasya', age: 25 };

const [T, M] = mas1;
const { age, what } = obj1;

console.log('T', T);
console.log('M', M);

console.log('age', age);
console.log('what', what);


const hatchEggs = (amountBirds) => {
    let countHatch = 441 / 21;
    let birds = amountBirds;

    for(let i = 0; i < countHatch; i++) {
        birds += birds - (Math.round(birds * 11.1 / 100));
    }

    return birds;

}


console.log(`Jumlah burung setelah 441 hari adalah ${hatchEggs(6969)}`);
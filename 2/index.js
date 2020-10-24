const drawStar = (n) => {
    if(n % 2 == 0) {
        document.querySelector('body').innerHTML = `<h1>Silahkan buka console untuk melihat jawaban</h1>`;
        console.log('Angka harus berupa bilangan ganjil !');
    } else {
        let str = "";
        const mid = parseInt((n + 1) / 2);
        let r = 0;

        for(let i = 1; i <= n; i++){
            i <= mid ? r++ : r--;
            
            for(let j = 1; j <= n; j++){
                if(j <= (mid - r) || j >= (mid + r)){
                    str += ' ';
                } else {
                    if(r !== mid){
                        if(j === (mid - r + 1) || j ===(mid + r -1) || j == mid){
                            str += '*';
                        } else {
                            str += ' ';
                        }
                    } else {
                        str += '*';
                    }
                    
                }
            }
            str += '\n';
        }

        document.querySelector('body').innerHTML = `<h1>Silahkan buka console untuk melihat jawaban</h1>`;
        console.log(str);
    }
}

const angka = parseInt(prompt('Silahkan masukkan angka !\nAngka harus merupakan bilangan ganjil'));

drawStar(angka);
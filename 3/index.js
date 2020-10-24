const checkMatch = (dataKeys, word) => {
    const keys = dataKeys;
    const str = word;

    keys.forEach(key => {
        const _isMatch = str.match(key);
        if(_isMatch) {
            console.log(`${key} => true`);
        } else {
            console.log(`${key} => false`);
        }
    });

    console.log('------------------------');
}

const data = ['dumb','ways','the','best'];
const word = 'dumbways';


const wordList = ['dari', 'guna', 'class', 'duel', 'kenapa', 'enggan', 'sukses', 'klasik', 'Super', 'ada', 'mengapa'];
const longString = `Mengutip dari Goal, penggunaan "El Clasico" untuk duel Barcelona dan Real Madrid tergolong baru. Sekitar pertengahan 2000-an, julukan partai "El Clasico" baru muncul untuk menggambarkan duel dua tim tersukses di Liga Spanyol itu. Sebelumnya, pertandingan antara Barca dan Madrid terkenal dengan sebutan El Derbi atau bahkan lebih lugas disebut "Madrid-Barca" atau "Barca-Madrid". Dipercaya bahwa sepak bola Spanyol mengambil inspirasi julukan "El Clasico" dari Amerika Selatan dan Tengah. Yang paling terkenal adalah duel klasik mempertemukan Boca Junior dan River Plate di Liga Argentina. Duel Boca vs River Plate sering dijuluki "Superclasico".`


checkMatch(data, word);
checkMatch(wordList, longString);
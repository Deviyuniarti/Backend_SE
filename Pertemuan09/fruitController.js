// import data
const fruits = require('./data.js')

// menampilkan semua data
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
}

// menambahkan data
const store = (name) =>{
    fruits.push(name)

    console.log(`Menambahkan data ${name}`)
    index()
};


// update data
const update = (indexToUpdate, newName) => {
    if (indexToUpdate >= 0 && indexToUpdate < fruits.length){
        const oldName = fruits[indexToUpdate];
        fruits[indexToUpdate] = newName;
        console.log(`Mengupdate data dari "${oldName}" menjadi "${newName}"`);
    } else {
        console.log(`Index ${indexToUpdate} tidak valid`);
    }
    
    console.log("Data setelah update:");
    index(); // Menampilkan data setelah update
    console.log(); // baris kosong
}

// destroy data
const destroy = (indexToDelete) => {
    if (indexToDelete >= 0 && indexToDelete < fruits.length){
        const deletedFruit = fruits.splice(indexToDelete, 1);
        console.log(`Menghapus data "${deletedFruit[0]}"`);
    } else {
        console.log(`Index ${indexToDelete} tidak valid`);
    }

    console.log("Data setelah penghapusan:");
    index(); // Menampilkan data setelah penghapusan
    console.log(); // baris kosong
}

// export
module.exports = {index, store,update, destroy};


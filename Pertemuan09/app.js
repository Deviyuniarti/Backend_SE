// import method dalam controller
const {index, store, update, destroy} = require('./fruitController')

const main = () => {
    console.log(`Menampilkan data buah-buahan`);
    index()

    console.log(`\n`);
    store('Blubery')

    console.log(`\n`);
    update(0, 'Manggis')

    console.log(`\n`);
    destroy(0)
}

main()
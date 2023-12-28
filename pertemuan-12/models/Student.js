// import database
const db = require("../config/database");

// membuat class Model Student
class Student {
  /**
   * Membuat method static all.
   */
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";
      /**
       * Melakukan query menggunakan method query.
       * Menerima 2 params: query dan callback
       */
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  /**
   * TODO 1: Buat fungsi untuk insert data.
   * Method menerima parameter data yang akan diinsert.
   * Method mengembalikan data student yang baru diinsert.
   */
  static create(Student) {
    return new Promise((resolve, reject) => {
        const sql = "INSERT INTO students SET ?";
        db.query(sql, Student, (err, results) => {
            resolve(this.show(results.insertId));
        });
    });

  
}

static show(id) {
    return new Promise((resolve, reject) => {
        const sql = `SELECT * FROM students WHERE id = ${id} `;
        db.query(sql, (err, results) => {
            resolve(results);
        });
    });
}

static update(id) {
  return new Promise((resolve, reject) => {
      const sql = `"UPDATE students SET ? "WHERE id = ${id} `;
      db.query(sql, (err, results) => {
          resolve(results);
      });
  });
}


}


// export model
module.exports = Student;
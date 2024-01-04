// import model Student
const Student = require('../models/Student');

class StudentController {
    // menambahkan keyword async memberitahu proses asynchronous
    async index(req, res) {
        // memanggil method static all dengan async await
        const students = await Student.all();

        if (students.length > 0) {
          const data = {
              message: "Menampilkan semua students",
              data: students
          };
          
          return res.status(200).json(data);
      }
          const data = {
              message: "Students is empty",
          }

          return res.status(200).json(data);
  }

     async store(req, res) {
      //memanggil method create dari model student 
      //mengirim data dan callback
      await Student.create(req.body, (student)=> {
        const data = {
            message: `Menambahkan data student`,
            data: student,
        };
        res.json(data);
    });
  }

  async update(req, res) {
    const { id } = req.params;
    //cari id student yang ingin diupdate
    const student = await student.find(id);

    if (student) {
      // melakukan update data
      const student = await student.update(req, res.body);
      const data = {
        message: `Mengedit data students`,
        data: student,
      };
      res.status(200),json(data);
    }
    else {
      const data ={
        message: `Student not found`,
      };

      res.status(404),json(data);
    }
  }
  
  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      await student.delete(id);
      const data = {
        message: `menghapus data students`,
      };

      res.status(200).json(data);
    }else {
      const data ={
        message: `student not found`,
      };
      res.status(404).json(data);
    }
  }

  async show(req, res) {
    const { id } = req.params;
    const student = await student.find(id);

    if (student) {
      const data = {
        message: `menampilkan detail student`,
        data: studen,
      };
      res.status(200).send(data);
    }
    else {
      const data = {
        message: `student not found`,
      };

      res.ststus(404).json(data);
    }
  }
}

module.exports = new StudentController;
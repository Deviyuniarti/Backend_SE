// import express
const express = require("express");

// membuat object express
const app = express();

// 
app.get("/", (req, res ) => {
    res.send("Hello world!");
});

// Mendefisnisikan port
app.listen(3000);
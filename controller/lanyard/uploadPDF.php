<?php

const express = require('express');
const multer = require('multer');
const fs = require('fs');
const app = express();
const port = 3000;

const storage = multer.diskStorage({
  destination: (req, file, cb) => cb(null, 'uploads/'),
  filename: (req, file, cb) => cb(null, file.originalname)
});

const upload = multer({ storage });

app.post('/upload', upload.single('archivo'), (req, res) => {
  console.log('Archivo recibido:', req.file.originalname);
  res.send('OK');
});

app.listen(port, () => console.log(`Servidor en http://localhost:${port}`));

 ?>

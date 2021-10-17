const express = require('express');
const router = express.Router();

router.get('/', (req, res, next) => {
  const data = req.context;
  res.render('home', data);
});

router.get('/blog', (req, res, next) => {
  res.render('blog', req.context);
});

module.exports = router;

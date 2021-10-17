const express = require('express');
const router = express.Router();

router.get('/', (req, res, next) => {
  const data = req.context;
  res.render('home.html', data);
});

router.get('/blog', (req, res, next) => {
  const data = req.context;
  res.render('blog.html', data);
});

module.exports = router;

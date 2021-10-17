const express = require('express');
const router = express.Router();

router.get('/', (req, res, next) => {
  res.render('home.html', req.context);
});

router.get('/blog', (req, res, next) => {
  res.render('blog.html', req.context);
});

module.exports = router;

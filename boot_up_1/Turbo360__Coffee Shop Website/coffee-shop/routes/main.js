const express = require('express');
const router = express.Router();

const get_home_json = {
  hero: {
    header: 'Drink Healthy <br> and Natural Coffee',
    subtext:
      "At Joe's House of Coffee, we only brew the freshest coffee from all around the world. We also serve pastries such as cupcakes and brownies.",
    bg_image: '/images/barista.jpg'
  },
  about: {
    header: "Welcome to Joe's Coffee House.",
    subtext:
      'Welcome to our house of coffee! We hope you enjoy our broad selection of premium coffee from all over the world. Welcome to our house of coffee! We hope you enjoy our broad selection of premium coffee from all over the world. Welcome to our house of coffee! We hope you enjoy our broad selection of premium coffee from all over the world.',
    bg_image: '/images/barista-2.jpg',
    images: [
      { image: '/images/coffee.jpg', caption: 'Coffee' },
      { image: '/images/tea.jpg', caption: 'Tea' },
      { image: '/images/cupcake.jpg', caption: 'Pastries' }
    ]
  }
};

router.get('/', (req, res, next) => {
  const data = req.context;
  data.page = get_home_json;
  res.render('home.html', data);
});

router.get('/blog', (req, res, next) => {
  res.render('blog.html', req.context);
});

module.exports = router;

const express = require('express');
const session = require('express-session');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const path = require('path');
const app = express();

// Create a MySQL connection
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'finals_db'
});

app.use(express.static('public'));

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Set up session middleware
app.use(session({ secret: 'somesecretkey', resave: true, saveUninitialized: true }));

// Set the views directory and the Pug view engine
app.set('views', path.join(__dirname, 'content_manager', 'view'));
app.set('view engine', 'pug');

app.get('/', (req, res) => {
  res.redirect('/dashboard');
});

app.get('/dashboard', (req, res) => {
  const username = req.session.username;

  connection.query('SELECT * FROM user WHERE username = ?', [username], (err, results) => {
    if (err) {
      console.error(err);
      return res.status(500).send('Internal Server Error');
    }

    res.render('dashboard', { username, data: results });
  });
});

app.get('/logout', (req, res) => {
    // Clear the session data
    req.session.destroy((err) => {
      if (err) {
        console.error('Error destroying session:', err);
        return res.status(500).send('Internal Server Error');
      }
  
      // Redirect to the relative path
      res.redirect('/WebtechFinals-1/index.php');
    });
  });
  
app.listen(3000, 'localhost', () => {
  console.log("NodeJS Server is running at port 3000");
});

process.on('SIGINT', () => {
  connection.end();
  process.exit();
});
app.get('*', (req, res) => {
    res.redirect('/WebtechFinals-1/index.php');
  });

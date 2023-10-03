const express = require('express');
const app = express();
const crypto = require('crypto');
var nodemailer = require('nodemailer');
var mysql = require('mysql');
const bodyParser = require('body-parser');
app.use(bodyParser.urlencoded({ extended: false }));
app.set('view engine', 'pug');


app.use(express.static(__dirname + '/public'));

/**
 * Send them to home page
 */
app.get(['/', '/index'], (req, res) => {
    res.render('index', {
        title: 'index'
    });
});


 app.get('/contact', (req, res) =>{
        res.render('contact',{
            title: 'Contact us'
        });
 });


app.post('/contact_action', (req, res) => {
    //Send them a confirmation email
    sendEmail(req.body.email, req.body.message);
    //Send myself their message
    sendUserMessage('meiraswebprogramming@gmail.com', req.body.email, req.body.message);
    console.log(req.name);
    res.render('emailreceived', {
        title: 'emailreceived',
        name: req.body.name,
        email: req.body.email,
        message: req.body.message

    });
});
   /**
    * Send them to the rankings page
    */
   app.get('/rankings', (req, res) =>{
       // try{
            var users = [];
            getUsers(users,res);
        /*}
        catch(error){
            console.log('could not connect to database');
        }*/
   });


    /**
     * Get form to add a user
     */
app.get('/login', (req, res) =>{
    res.render('login',{
        title: 'Add User'
    })
});

    /**
     * Add the user to database
     */
app.post('/add_user', (req, res) => {

    addUser(req, res);

});



const server = app.listen(8080, () => {
    console.log(`Express running -> PORT ${server.address().port}`);
});

app.use(function (req, res, next) {
    res.status(404).send("Sorry can't find that!")
  })


/**
 * Method to send them a confirmation email.
 * @param {} emailAdd
 */
function sendEmail(emailAdd, message){
    var transport = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'meiraswebprogramming@gmail.com',
            pass: 'PASSWORD_HERE'
        }
    });

    var mailOptions = {
        from: 'meiraswebprogramming@gmail.com',
        to: emailAdd,
        subject: 'Message Received Confirmation',
        html: 'Hi,<br>This is a confirmation that we received your message:<br><em>' + message + '</em><br>We will get back to you shortly.<br>Thank you for your time,<br>Cyberpro'
    };

    transport.sendMail(mailOptions, function(error, info){
        if(error){
            console.log(error);
        }
         else {
            console.log('Email sent: ' + info.response);
        }
    });
}

function sendUserMessage(emailAdd, userEmail, message){
    var transport = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'meiraswebprogramming@gmail.com',
            pass: 'PASSWORD_HERE'
        }
    });

    var mailOptions = {
        from: 'meiraswebprogramming@gmail.com',
        to: emailAdd,
        subject: 'Message Received',
        html: 'Message Received from ' + userEmail + '<br><em>' + message + '</em>'
    };

    transport.sendMail(mailOptions, function(error, info){
        if(error){
            console.log(error);
        }
         else {
            console.log('Email sent: ' + info.response);
        }
    });
}

function getUsers(users, res){
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "finaltermproject"

    });

    con.connect(function(err){
        if(err) throw err;
        else{
            console.log("Connected!");
        }
        var sql = "SELECT * FROM users INNER JOIN colors ON profilecolor = color_id ORDER BY score DESC";
        con.query(sql, function(err, result, fields){
            if (err){
                console.log("error here");
                console.log("err");
                throw err;
            }
            for(var i = 0; i < result.length; i++){
                var user = {
                    'name':result[i].name,
                    'score':result[i].score
                }
                users.push(user);
            }
            for(var i = 0; i < users.length; i++){
                console.log(users[i]);
            }
            console.log("all users logged");
            //return classes;
            res.render('rankings', {
                title: 'User Rankings',
                list: users
            });
        });

    });

}

function addUser(req, res ){
    const crypto = require('crypto');
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "finaltermproject"
    });

    con.connect(function(err){
        if(err) throw err;
        else{
            console.log("Connected!")
        }



        const pass = req.body.password;
        const salt = "meiraistheawesomesteeever54352343";
        const passfinal = pass + salt;
        const password = crypto.createHash('md5').update(passfinal).digest('hex');

         var sql = "INSERT INTO `users`( `category`, `name`, `email`, `password`," +
        " `score`, `profilecolor`) VALUES ('" + req.body.cat +"','"+ req.body.name +"','" +  req.body.email + "','" +  password + "','" + 0 +"','" +  req.body.color + "')";
        console.log("sql query: " + sql);
        con.query(sql, function (error, results, fields) {
            if (error) throw error;
            res.redirect('/login');
          });
    });
}
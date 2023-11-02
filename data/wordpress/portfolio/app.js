const express = require('express');

const app = express();

//Middlewares
app.use(express.static('/var/www/html/portfolio/public'))

app.get('/portfolio', (req, res) => {
    res.sendFile('/var/www/html/portfolio/public/index.html', (err) => {
        if (err)
        {
            console.log(err);
            res.status(err.status).end();
      }
        else
            console.log("Next");
    })
    
})



app.listen(3000, console.log("Listening on port 3000"));
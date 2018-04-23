function addSkit(user, data){
    var http = require('http');
    var querystring = require('querystring');
    var post_data = {"content":data,"time":Date.now()};
    var options = {
        host: "skits",
        port: "9200",
        path: "/skits/"+user+"/",
        method: "POST",
        headers: { 
            "Content-Type": "application/json",
        }
    };
    var putReq = http.request(options, function (res){
        res.setEncoding('utf8');
        res.on('data', function (chunk) {
            console.log('Response: ' + chunk);
        });
    });
    putReq.write(JSON.stringify(post_data));
    putReq.end();
}

var http = require('http');
var express = require('express');
var bodyParser = require('body-parser');
var app = express();

app.use(bodyParser.urlencoded());

app.listen(8888, function (err) {
    if (err) {
        throw err;
    }
});


app.post('/addSkit', function(req, res){
    var data = req.body.newSkit;
    var user = req.body.user;
    addSkit(user, data);
    console.log('Skit added');
    res.end();
});



/*
http.createServer(function (req, res) {
        res.writeHead(200, {'Content-Type': 'text/html'});
        var params = req.body;
        res.write(params[0]);
        //addSkit();
        res.end();
}).listen(8888);*/

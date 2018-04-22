function addSkit(){
    var http = require('http');
    var options = {
        host: "skits",
        port: "9200",
        path: "/skits/jxf9385",
        method: "PUT",
        headers: { 
            "Content-Type": "application/json"
        }
    };
    var putReq = http.request(options, function (res){
        res.on("end", function() {
            console.log(responseString);
        });
    });
    putReq.write("{'field':'value'}");
    putReq.end();
}

var http = require('http');
http.createServer(function (req, res) {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.write(req.url);
        addSkit();
        res.end();
}).listen(8888);

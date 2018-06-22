var http = require("http");
   function onRequest(request, response) {
      response.writeHead(200, {"Content-Type": "text/plain"});
      response.write("Hello World");
      response.end();
   }
http.createServer(onRequest).listen(3000);
console.log("Server has started.");


// var io = require('socket.io');
// var http = require('http');
//
// var app = http .createServer();
// var io = io.listen(app);
// app.listen(3000);
//
// io.sockets.on('connection', function (socket) {
//     console.log('serv started');
//     socket.on('eventServer', function (data) {
//         console.log(data);
//         socket.emit('eventClient', { data: 'Hello Client' });
//     });
//     socket.on('disconnect', function () {
//         console.log('user disconnected');
//     });
// });
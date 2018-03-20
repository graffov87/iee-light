/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */
'use strict';

var fs = require('fs');

function Csv(file) {
    this.file = file;
}

Csv.prototype.setHeaders = function(data) {
    fs.writeFile(this.file, data, 'utf8', function (err) {
        if (err) {
            console.log('Some error occured - file either not saved or corrupted file saved.');
        }
    });
}

Csv.prototype.setData = function(data) {
    var buffer = new Buffer(data.join(",") +"\n");
    fs.open(this.file, 'a+', function(err, fd) {
        fs.write(fd, buffer, 0, buffer.length, null, function(err) {
            if (err) {
                console.log('Some error occured - file either not saved or corrupted file saved.');
            }
        });
    });
}

exports.Csv = Csv;
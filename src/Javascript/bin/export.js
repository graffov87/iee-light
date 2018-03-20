/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */
'use strict';
var log = require('../Models/Log');
var exports = require('../Models/Export');
var file = require('../Models/Writer/Csv');
var runner = require('child_process');

var model = null;
var write = new log.Log();
//var getData = getData.bind(this);
exec()
    .then(function (data) {
        return new Promise(function (resolve, reject) {
            return resolve(getExport(JSON.parse(data)));
        })
    })
    .then(function (data) {
        model = data;
        model.getData().then(function (data) {
           // write.writeln(data);
            var csv = new file.Csv('pupsik3.csv');
            csv.setHeaders(Object.keys(data[0]));
            data.forEach(function(value, index) {
                var aray = [];
                if (typeof value == 'object') {
                    var keys = Object.keys(value);
                    keys.forEach(function (value2) {
                        aray.push(value[value2]);
                    });
                    csv.setData(aray);
                }
            });
        });

        model.disconnect();
        write.outEndTime();
    }).catch(function (err) {
    // Неявно вызовется это:
    console.log("Ошибка!", err);
});

/*runner.exec(
    'php -r \'echo json_encode(include("../../../../../../app/etc/env.php"));\'',
    function (err, stdout, stderr) {
        var connection = JSON.parse(stdout);
        var products = new exports.Export(connection.db.connection.default);
        var value =  products.getData().then(function (data) {
            write.writeln(data);
            products.disconnect();
            write.outEndTime();
        })
            .catch(function(err) {
                write.writeln(err);
                products.disconnect();
                write.outEndTime();
            });

    }

);
*/
function exec() {
    return new Promise(function (resolve, reject) {
        runner.exec(
            'php -r \'echo json_encode(include("../../../../../../app/etc/env.php"));\'',
            function (err, stdout, stderr) {
                if (err) return reject(err);
                return resolve(stdout);
            }
        )
    })
}

function getExport(connection) {
    return new exports.Export(connection.db.connection.default);
}

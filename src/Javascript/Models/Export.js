/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */
'use strict';

const mysql = require("mysql");

function Export(params) {
    this.connection = mysql.createConnection({
        host: params.host,
        user: params.username,
        password: params.password,
        database: params.dbname
    });
    this.connection.connect();

}


Export.prototype.disconnect = function () {
    this.connection.end(function (err) {
        if (err) return console.log(err);
        console.log("Disconnect");
    });
}

Export.prototype.getData = function () {
    var self = this;
    return new Promise(function (resolve, reject) {
        self.connection.query("Select * from catalog_product_entity where updated_at >='1970-01-01 00:00:00'", function (err, rows, fields) {
            if (err) return reject(err);
            return resolve(rows);
        });
    });
}

exports.Export = Export;
/**
 * @author   : Vitaliy Charnou <graffov87@gmail.com>
 */
'use strict';

function Log() {
    this.beginTime = new Date();;
}

Log.prototype.writeln = function(text) {
    console.log(text);
}

Log.prototype.outEndTime = function () {
    this.endTime = new Date();

    console.log("Time: " + ((this.endTime.getTime() - this.beginTime.getTime()) / 1000).toFixed(3));

}

exports.Log = Log;

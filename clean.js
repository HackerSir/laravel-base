/*******************************
 Clean Task
 *******************************/

var rimraf = require('rimraf');

// cleans not minified files
module.exports = function (callback) {
    rimraf('./public/semantic/components', function (err) {
        if (err) {
            console.log(err);
        } else {
            console.log('Successfully delete public/semantic/components.');
        }
    });
    rimraf('./public/semantic/themes/basic', function (err) {
        if (err) {
            console.log(err);
        } else {
            console.log('Successfully delete public/semantic/themes/basic.');
        }
    });
    rimraf('./public/semantic/themes/github', function (err) {
        if (err) {
            console.log(err);
        } else {
            console.log('Successfully delete public/semantic/themes/github.');
        }
    });
    rimraf('./public/semantic/semantic.css', function (err) {
        if (err) {
            console.log(err);
        } else {
            console.log('Successfully delete public/semantic/semantic.css.');
        }
    });
    rimraf('./public/semantic/semantic.js', function (err) {
        if (err) {
            console.log(err);
        } else {
            console.log('Successfully delete public/semantic/semantic.js.');
        }
    });
};

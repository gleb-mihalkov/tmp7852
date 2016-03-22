var gulp = require("gulp");
var sass = require("gulp-sass");
var rename = require("gulp-rename");
var include = require("gulp-include");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
var PrettyError = require("pretty-error");
var watch = require("gulp-watch");
var replace = require("gulp-replace");
var prefixer = require("gulp-autoprefixer");
var changed = require("gulp-changed");
var sftp = require('gulp-sftp');
var path = require("path");

var flsPath = ["./**/*", "!./_*/**", "!./_*", "!./main.*"];
var dstPath = {
  host: "sbx21.hosting.reg.ru",
  user: "u0127910",
  pass: "j0zjf4E_",
  remotePath: "/var/www/u0127910/data/www/aspired.ru/_homemaker/gleb-mihalkov.dev/templates/main"
};
var srcPath = "./src";

var errorRenderer = null;
var errorNotifier = null;

function _error(cb) {
  if (errorRenderer == null) {
    errorNotifier = notify.onError("Runtime error! See terminal log for details.");
    errorRenderer = new PrettyError();
    errorRenderer.skipNodeFiles();
  }
  return function(error) {
    var text = errorRenderer.render(error);
    errorNotifier(error);
    console.log(text);
    if (cb != null) cb();
  }
}

function _glob(glob, base) {
  var isFile = typeof glob == "string";
  if (isFile) glob = [glob];
  for (var i = 0; i < glob.length; i += 1) {
    var isIgnore = glob[i][0] == "!";
    var value = isIgnore ? glob[i].substr(1) : glob[i];
    var file = path.resolve(base, value);
    if (isIgnore) file = "!" + file;
    glob[i] = file;
  }
  if (glob.length == 0) return [];
  return isFile ? glob[0] : glob;
}

function _src(glob, cb) {
  var files = _glob(glob, srcPath);
  var s1 = gulp.src(files);
  var s2 = plumber({errorHandler: _error(cb)});
  s1.pipe(s2);
  return s2;
}

function _dst(cb) {
  var sTarget = sftp(dstPath);
  if (cb != null) sTarget.on("end", cb);
  return sTarget;
}

function _watch(glob, task) {
  var files = _glob(glob, srcPath);
  watch(files, function() { gulp.start(task); });
}

function _exec(command) {
  var current = exec(command, {}, function(error, stdout, stderr) {
    if (error != null) throw error;
    console.log(stdout);
    console.log(stderr);
  });
  current.stderr.pipe(process.stderr);
  current.stdout.pipe(process.stdout);
  current.stdin.pipe(process.stdin);
}

function _templates() {
  var p1 = /<!--\s+template\s+(\w+)\s+-->/gi;
  var p2 = /<!--\s+endtemplate\s+-->/gi;
  var s1 = replace(p1, "<script type='text/template' id='$1'>");
  var s2 = replace(p2, "</script>");
  s1.pipe(s2);
  return s1;
}

function _bem() {
  var p1 = /\sclass\s*=\s*['"][^'"]+['"]/gi;
  var p2 = /^\sclass\s*=\s*['"]/gi;
  var p3 = /["']$/g;
  return replace(p1, function(text) {
    var content = text.replace(p2, "").replace(p3, "");
    var list = content.split(" ");
    var result = [];
    for (var i = 0; i < list.length; i += 1) {
      if (!list[i]) continue;
      var values = list[i].split("--");
      result.push(values[0]);
      for (var j = 1; j < values.length; j += 1) {
        var value = values[0] + "--" + values[j];
        result.push(value);
      }
    }
    return ' class="' + result.join(" ") + '"';
  });
}

process.on("uncaughtException", _error());

gulp.task("build:css", function(cb) {
  _src("./main.sass", cb)
    .pipe(sass())
    .pipe(prefixer())
    .pipe(rename("styles.css"))
    .pipe(_dst(cb));
});

gulp.task("build:js", function(cb) {
  _src("./main.js", cb)
    .pipe(include())
    .pipe(rename("scripts.js"))
    .pipe(_dst(cb));
});

gulp.task("build:assets", function(cb) {
  _src(flsPath)
    .pipe(_dst(cb));
});

gulp.task("build", ["build:css", "build:js", "build:assets"]);

gulp.task("serve", ["build"], function() {
  _watch("./**/*.sass", "build:css");
  _watch("./**/*.js", "build:js");
  _watch(flsPath, "build:assets");
});

gulp.task("default", ["build", "serve"]);
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var ngModuleSort = require('gulp-ng-module-sort');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var csslint = require('gulp-csslint');
var gulporder = require('gulp-order');
var autoPrefixer = require('gulp-autoprefixer');
//if node version is lower than v.0.1.2
require('es6-promise').polyfill();
var cssComb = require('gulp-csscomb');
var cmq = require('gulp-merge-media-queries');
var cleanCss = require('gulp-clean-css');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var merge = require('merge-stream');
var del = require('del');
var cleanCSS = require('gulp-clean-css');
var babel = require('gulp-babel');

var paths = {
    styles: {
      src: 'scss/**/*.scss',
      dest: '../dist/css/',
      vendor1: 'node_modules/bootstrap/dist/css/bootstrap.min.css',
      vendor2: 'node_modules/font-awesome/css/font-awesome.min.css'
    },
    scripts: {
      src: 'js/**/*.js',
      jqueryjs: 'node_modules/jquery/dist/jquery.js',
      bootstrapjs: 'node_modules/bootstrap/dist/js/bootstrap.min.js',
      dest: '../dist/js/'
      
    }
};

function clean() {
    return del([ paths.scripts.dest, paths.styles.dest ]);
}

function styles() {
    return gulp.src(paths.styles.src)
      .pipe(sass())
      .pipe(cleanCSS())
      // pass in options to the stream
      .pipe(rename({
        basename: 'main',
        suffix: '.min'
      }))
      //.pipe(sourcemaps.init())
      .pipe(autoPrefixer())
      .pipe(cssComb())
      .pipe(cmq({log:true}))
      .pipe(csslint())
      .pipe(csslint.formatter())
      .pipe(concat('main.css'))
      //.pipe(sourcemaps.write())
      .pipe(gulp.dest(paths.styles.dest))
      .pipe(notify('styles task finished'));
}

function scripts() {
    var vendor1 = gulp.src(paths.scripts.bootstrapjs);
    var vendor2 = gulp.src(paths.scripts.jqueryjs);
    //var js = gulp.src(paths.scripts.src);
    
    return merge([vendor2, vendor1])
      //.pipe(babel())
      //.pipe(uglify())
      .pipe(ngModuleSort())
      .pipe(concat('main.min.js'))
      .pipe(gulp.dest(paths.scripts.dest));
}

function vendor_styles(){

    var vendor1 = gulp.src(['node_modules/bootstrap/dist/css/bootstrap.min.css']);
    //var vendor2 = gulp.src(['node_modules/font-awesome/css/font-awesome.min.css']);
    
    return merge([vendor1])
    .pipe(concat('vendor.css'))
    .pipe(gulp.dest('../dist/css'));
    //.pipe(notify('vendor css task finished'));

};   

function watch() {
    var watcher_s = gulp.watch(paths.scripts.src, scripts);
    var watcher = gulp.watch(paths.styles.src, styles);

    watcher.on('default', function(path, stats) {
        console.log('File ' + path + ' was changed');
      });
    watcher_s.on('default', function(path, stats) {
        console.log('File ' + path + ' was changed');
      });
      
}  

var build = gulp.series(gulp.parallel(styles, scripts, vendor_styles));
gulp.task('build', build);
gulp.task('default', build);
gulp.task('watch', watch);
gulp.task('scripts', scripts);
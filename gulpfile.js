'use strict';

var gulp      = require('gulp'),
    sass      = require('gulp-sass'),
    rename    = require('gulp-rename'),
    minifycss = require('gulp-minify-css'),
    uglify    = require('gulp-uglify'),
    webpack   = require('webpack-stream');

var SRC        = './assets',
    DIST       = './public',
    SASS_SRC   = SRC + '/scss',
    SASS_DIST  = DIST + '/css',
    JS_SRC     = SRC + '/js',
    JS_DIST    = DIST + '/js';

// Compile sass files in source and move output to destination
function sassHandler() {
  return gulp
    .src(SASS_SRC + '/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(minifycss())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(SASS_DIST));
}

function cssHandler() {
  return gulp
    .src(SASS_SRC + '/**/*.css')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(SASS_DIST));
}

// Compile js files and minify/uglify them
function jsHandler() {
  return gulp
    .src(JS_SRC + '/**/*.js')
    .pipe(uglify())
    .on('error', (err) => {
      console.log('Error uglifying the JavaScript: ' + err);
      return false;
    })
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(JS_DIST));
}

// Watch for changes and run respective tasks
function watchHandler() {
  gulp.watch(SASS_SRC + '/**/*.scss', ['sass', 'css']);
  gulp.watch(JS_SRC + '/**/*.js', ['js']);
}
gulp.task('js', jsHandler);
gulp.task('sass', sassHandler);
gulp.task('css', cssHandler);
gulp.task('watch', watchHandler);

gulp.task('default', ['sass', 'css', 'js']);

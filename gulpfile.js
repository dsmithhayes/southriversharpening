'use strict';

var gulp      = require('gulp'),
    sass      = require('gulp-sass'),
    rename    = require('gulp-rename'),
    minifycss = require('gulp-minify-css'),
    uglify    = require('gulp-uglify');

var SRC        = './assets',
    DIST       = './public',
    SASS_SRC   = SRC + '/scss',
    SASS_DIST  = DIST + '/css',
    JS_SRC     = SRC + '/js',
    JS_DIST    = DIST + '/js';

// Combines and uglifies the JavaScript, places it in the document root
gulp.task('js', function() {
  return gulp.src(JS_SRC + '/**/*.js')
             .pipe(uglify())
             .on('error', (err) => {
               console.log('Error uglifying the JavaScript: ' + err);
               return false;
             })
             .pipe(rename({suffix: '.min'}))
             .pipe(gulp.dest(JS_DIST));
});

// Builds the CSS out of the SASS.
gulp.task('sass', function() {
  return gulp.src(SASS_SRC + '/**/*.scss')
             .pipe(sass().on('error', sass.logError))
             .pipe(minifycss())
             .pipe(rename({suffix: '.min'}))
             .pipe(gulp.dest(SASS_DIST));
});

// Places the final compiled CSS file into the document root
gulp.task('css', function() {
  return gulp.src(SASS_SRC + '/**/*.css')
             .pipe(sass().on('error', sass.logError))
             .pipe(gulp.dest(SASS_DIST));
});

// Watches for changes to files within the SASS and JS directories
gulp.task('watch', function() {
  gulp.watch(SASS_SRC + '/**/*.scss', ['sass', 'css']);
  gulp.watch(JS_SRC + '/**/*.js', ['js']);
});

// Compiles the SASS, puts the CSS into the document root, along with the JS
gulp.task('default', ['sass', 'css', 'js']);

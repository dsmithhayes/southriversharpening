'use strict';

var gulp      = require('gulp'),
    sass      = require('gulp-sass'),
    rename    = require('gulp-rename'),
    minifycss = require('gulp-minify-css'),
    uglify    = require('gulp-uglify');

var locations = {
  src: './assets',
  dist: {
    public: './public',
    admin: './admin'
  },
  scss: '/scss',
  css: '/css',
  js: '/js',
  images: '/images'
};

var all_js   = '/**/*.js',
    all_scss = '/**/*.scss',
    all_css  = '/**/*.css',
    all_images = '/**/*';

// Combines and uglifies the JavaScript, places it in the document root
gulp.task('js', function() {
  return gulp.src(locations.src + locations.js + all_js)
             .pipe(uglify())
             .on('error', (err) => {
               console.log('Error uglifying the JavaScript: ' + err);
               return false;
             })
             .pipe(rename({suffix: '.min'}))
             .pipe(gulp.dest(locations.dist.public + locations.js))
             .pipe(gulp.dest(locations.dist.admin + locations.js));
});

// Builds the CSS out of the SASS.
gulp.task('sass', function() {
  return gulp.src(locations.src + locations.scss + all_scss)
             .pipe(sass().on('error', sass.logError))
             .pipe(minifycss())
             .pipe(rename({suffix: '.min'}))
             .pipe(gulp.dest(locations.dist.public + locations.css))
             .pipe(gulp.dest(locations.dist.admin + locations.css));
});

// Places the final compiled CSS file into the document root
gulp.task('css', function() {
  return gulp.src(locations.src + locations.scss + all_css)
             .pipe(sass().on('error', sass.logError))
             .pipe(gulp.dest(locations.dist.public + locations.css))
             .pipe(gulp.dest(locations.dist.admin + locations.css));
});

gulp.task('images', function() {
  return gulp.src(locations.src + locations.images + all_images)
             .pipe(gulp.dest(locations.dist.public + locations.images))
             .pipe(gulp.dest(locations.dist.admin + locations.images));
});

// Watches for changes to files within the SASS and JS directories
gulp.task('watch', function() {
  gulp.watch(locations.src + locations.scss + all_scss, ['sass', 'css']);
  gulp.watch(locations.src + locations.js + all_js, ['js']);
});

// Compiles the SASS, puts the CSS into the document root, along with the JS
gulp.task('default', ['sass', 'css', 'js', 'images']);

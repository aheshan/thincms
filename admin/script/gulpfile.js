var gulp = require('gulp'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    print = require('gulp-print'),
    del = require('del');

//cleaning files
gulp.task('clean', function (cb) {
  del([
    'apps/category/category_app.js',
    'apps/post/post_app.js'
  ], cb);
});

//build category app
gulp.task('build:category', function () {
   return gulp.src([
        "apps/category/categoryServices.js",
        "apps/category/categoryControllers.js"
      ])
      .pipe(print())
      .pipe(jshint())
      .pipe(uglify({mangle: false}))
      .pipe(concat('category_app.js'))
      .pipe(gulp.dest('apps/category'));
});

//build post app
gulp.task('build:post', function () {
   return gulp.src([
        "apps/post/postServices.js",
        "apps/post/postControllers.js"
      ])
      .pipe(print())
      .pipe(jshint())
      .pipe(uglify({mangle: false}))
      .pipe(concat('post_app.js'))
      .pipe(gulp.dest('apps/post'));
});

//build all apps
gulp.task('build:all',['build:category','build:post']);
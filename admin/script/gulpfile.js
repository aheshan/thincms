var gulp = require('gulp'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    print = require('gulp-print'),
    del = require('del');

//cleaning files
gulp.task('clean', function (cb) {
  del([
    'apps/category/category_app.js'
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

//build all apps
gulp.task('build:all',['build:category']);
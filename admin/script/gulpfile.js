var gulp = require('gulp'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    del = require('del');

//cleaning files
gulp.task('clean', function (cb) {
  del([
    'apps/category/category_app.js'
  ], cb);
});

//build category app
gulp.task('build:category', function () {
   return gulp.src('apps/category/*.js')
      .pipe(jshint())
      .pipe(jshint.reporter('default'))
      .pipe(uglify())
      .pipe(concat('category_app.js'))
      .pipe(gulp.dest('apps/category'));
});

//build app
//build category app
gulp.task('build:all',['build:category']);
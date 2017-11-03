'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var babel = require('gulp-babel');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var buildBranch = require('gulp-build-branch');

gulp.task('sass', function () {
  return gulp.src('./src/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./dist'));
});

gulp.task('sass:watch', function () {
  gulp.watch('./src/**/*.scss', ['sass']);
});

gulp.task('js', function () {
  return gulp.src('src/**/*.js')
    .pipe(babel({
        presets: ['env']
    }))
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist'));
});

gulp.task('js:watch', function () {
  gulp.watch('./src/**/*.js', ['js']);
});

gulp.task('watch', ['js', 'sass'],function () {
  gulp.watch('./src/**/*.js', ['js']);
  gulp.watch('./src/**/*.scss', ['sass']);
});

gulp.task('build', ['js', 'sass'],function () {
  gulp.src('*.php')
    .pipe(gulp.dest('build'));

  gulp.src('dist/**/*')
    .pipe(gulp.dest('build/dist'));
});

gulp.task('deploy', ['build'], function() {
  return buildBranch({ folder: 'build', branch: 'build' });
});

gulp.task('default', ['watch']);

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var rename = require("gulp-rename");

var paths = {
    scss: ['./web-src/scss/*.scss'],
    js: ['./web-src/js/*.js']
};

gulp.task('sass', function () {
    gulp.src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(rename('main.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./web/css'));
});


gulp.task('js', function () {
    gulp.src(paths.js)
        .pipe(uglify())
        .pipe(gulp.dest('./web/js'));
});

gulp.task('watch', function() {
    gulp.watch(paths.scss, ['sass']);
    gulp.watch(paths.js, ['js']);
});

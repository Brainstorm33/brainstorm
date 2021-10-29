var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify');

gulp.task('serve', function() {
    gulp.series('sass')();
    gulp.watch("./assets/css/**/*.scss", gulp.series('sass'));
    gulp.watch("./assets/js/*.js", gulp.series('min-js'));
});

gulp.task('sass', function() {
    const cssSourcePath = [
        './assets/css/styles.scss',
    ];

    const sassOptions = {
        errLogToConsole: true,
        outputStyle: 'compressed'
    };

    return gulp.src(cssSourcePath)
        .pipe(sass(sassOptions))
        .pipe(gulp.dest('./dist/css'))

});

gulp.task('min-js', function() {
    return gulp.src('./assets/js/main.js')
        .pipe(minify({
            ext: {
                min: '.min.js'
            },
        }))
        .pipe(gulp.dest('./dist/js'))
});

gulp.task('default', gulp.series('serve'));

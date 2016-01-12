var gulp = require('gulp');

gulp.task('php',function(){
    return gulp.src('app/**/*.php')
    .pipe('build/**/*.php');
});

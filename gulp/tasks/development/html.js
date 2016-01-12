var gulp = require('gulp');

gulp.task('html',function(){
    return gulp.src('app/**/*.html')
    .pipe('build/**/*.html');
});

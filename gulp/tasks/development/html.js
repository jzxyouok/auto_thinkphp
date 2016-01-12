var gulp = require('gulp');

gulp.task('html',function(){
    return gulp.src('app/**/*.html')
    .pipe(gulp.dest('build'));
});

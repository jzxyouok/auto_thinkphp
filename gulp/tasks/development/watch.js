var gulp = require('gulp');

/*
 * Start browserSync task and then watch files for changes
 */

 gulp.task('watch',function(){
         //监控scss
        gulp.watch('app/**/*.scss',['sass'])
 });

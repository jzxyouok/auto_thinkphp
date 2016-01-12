var gulp = require('gulp');
var browserSync = require('browser-sync');


// gulp.task('default',function(){
//     console.log('Hellp Gulp.js!');
// });

gulp.task('default',['watch'],function(){
     const bs = browserSync.create();
     bs.init({
         notify:true,
         logPrefix:'THINK_PHP',
         proxy:'auto_thinkphp.com'
     })
     gulp.watch(['build/**/*'],bs.reload);
});


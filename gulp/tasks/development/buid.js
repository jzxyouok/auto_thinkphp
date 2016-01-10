var  gulp   = require('gulp');
var  runSequence = require('run-sequence');
var  gulpLoadPlugins = require('gulp-load-plugins');
var  $   = gulpLoadPlugins();
/**
 * Run all tasks needed for a build in defined order
 */
gulp.task('build',['delete'],function(callback){
     gulp.src('app/**/*')
     .pipe($.rename({suffix:'.min'}))
     .pipe(gulp.dest(function(file){
         var filePath = file.path.toLowerCase();//一个文件一个文件处理
         return 'build'
     }))
});

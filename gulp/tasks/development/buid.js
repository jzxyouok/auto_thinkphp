var  gulp   = require('gulp');
var  runSequence = require('run-sequence');
var  gulpLoadPlugins = require('gulp-load-plugins');
var  $   = gulpLoadPlugins();
/**
 * Run all tasks needed for a build in defined order
 */
gulp.task('build',['delete'],function(callback){
     gulp.src(
        [
            'app/**/*',
            '!app/**/*.scss'
        ]
     )
     .pipe(gulp.dest(function(file){
         return 'build'
     }))
});

var gulp    =   require('gulp');
// var plumber  =    require('gulp-plumber');
// var browsersync =  require('browser-sync');
// var sass      =  require('gulp-ruby-sass');
// var autoprefixer  = require('gulp-autoprefixer');
// var sourcemaps   =   require('gulp-sourcemaps');
// var config       =    require('../../config');

/**
 * Generate css from scss
 * Build sourcemaps
 */

//拷贝普通css文件
gulp.task('normalCss',function(){
     gulp.src('app/**/*.css')
     .pipe(gulp.dest('build'));
});

gulp.task('sass',function(){

});

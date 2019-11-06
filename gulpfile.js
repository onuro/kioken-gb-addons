var gulp = require('gulp');

gulp.task('makebuild', function(cb) {
  //root files
   gulp.src('./*.{php,png,txt,md}').pipe(gulp.dest('./gutenbooster-addons'));

   gulp.src('./inc/*.php').pipe(gulp.dest('./gutenbooster-addons/inc'));


   gulp.src('./dist/**').pipe(gulp.dest('./gutenbooster-addons/dist'));

   cb();
});

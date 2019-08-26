var gulp = require('gulp');

gulp.task('makebuild', function(cb) {
  //root files
   gulp.src('./*.{php}').pipe(gulp.dest('./build'));

   gulp.src('./inc/*.{php}').pipe(gulp.dest('./build/inc'));

   gulp.src('./dist/**').pipe(gulp.dest('./build/dist'));
   
   cb();
});
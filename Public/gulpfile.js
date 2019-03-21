/*
	Gulp Task
	Note: Every time you make changes in the main.js file
		  you have to run this task manually by typing gulp on the command prompt
		  1. Install nodeJS from https://nodejs.org/en/download/ (Choose LTS version)
		  2. open the current folder in command prompt (You must use Git Bash)
		  3. type npm init
		  4. Now you can run gulp by typing 'gulp' without the quote
		     or you may run the task by specifying the task name
		     for example: gulp mapSiamna
		  5. Finally you don't have to modify the following codes

	Written by: Mawia HL
 */
'use strict';
let gulp 	= require('gulp'),
	uglify	= require('gulp-uglify'),
	rename	= require('gulp-rename'),
	maps	= require('gulp-sourcemaps');
gulp.task("mapSiamna", done => {
	gulp.src('js/main.js')
	.pipe(maps.init())
	.pipe(maps.write('./'))
	.pipe(gulp.dest('js'))
	done();
});
gulp.task('tihTetna',done =>{
	gulp.src("js/main.js")
	.pipe(uglify())
	.pipe(rename("app.min.js"))
	.pipe(gulp.dest('js'));
	done();
});
gulp.task('default', gulp.series('mapSiamna', 'tihTetna', done => {
  done();
 }));
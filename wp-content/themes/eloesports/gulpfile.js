/* Dependencias */

var gulp = require('gulp');
var prefix = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var stylish = require('jshint-stylish');
var rename = require('gulp-rename');
var stripDebug = require('gulp-strip-debug');
var browserSync = require('browser-sync').create();
var stylus = require('gulp-stylus');
var sourcemaps = require('gulp-sourcemaps');
var reload = browserSync.reload;
var args   = require('yargs').argv;
var nib = require('nib');
var jeet = require('jeet');

var serverUrl = args.proxy;

if (!serverUrl){
  serverUrl = 'local.example.dev';
}


var paths = {
  js: 'js/*.js',
  jsDest: 'js/buildjs',
  css: './',
  styles: 'stylus',
  img: 'img',
  php: './',
  phpTemplates: 'templates',
};

// TAREAS DE SCRIPTS

gulp.task('lint', function(){
  return gulp.src([
      paths.js
    ])
    .pipe(jshint())
    .pipe(jshint.reporter(stylish));
});

gulp.task('scripts', function(){
  return gulp.src(paths.js)
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(paths.jsDest))
    .pipe(rename('scripts.min.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest(paths.jsDest))
    .pipe(browserSync.stream());
});

gulp.task('php', function(){
  gulp.src([paths.php + '*.php', paths.phpTemplates + '/**/*.php'])
    .pipe(browserSync.stream());
});

// TAREA DE ESTILOS

gulp.task('styles', function(){
  gulp.src(paths.styles + '/style.styl')
    .pipe(sourcemaps.init())
    .pipe(stylus({
      paths: ['node_modules', 'styles/globals'],
      import: ['stylus-type-utils', 'nib', 'rupture/rupture'],
      use: [nib(), jeet()],
      'include css': true,
      compress: true,
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.css))
    .pipe(browserSync.stream());
});


// TAREA PARA PREFIJOS AUTOMATICOS

gulp.task('prefix', function () {
  gulp.src(paths.css + '*.css')
    .pipe(prefix(["last 8 version", "> 1%", "ie 8"]))
    .pipe(gulp.dest(paths.css));
});


// Watch

gulp.task('watch', function () {
  gulp.watch(paths.js, ['lint', 'scripts']);
  gulp.watch(paths.styles + '/**/*.styl', ['styles']);
  gulp.watch(paths.styles + '/globals/**/*.styl', ['styles']);
  gulp.watch(paths.php + '*.php', ['php']);
  gulp.watch(paths.phpTemplates + '/**/*.php', ['php']);
});

// Dynamic Server
gulp.task('browserSync-server', function () {
  browserSync.init({
    //host: '192.168.1.128:3000/eloesports',
    proxy: serverUrl,
  });
});

gulp.task('default', ['scripts', 'watch', 'browserSync-server']);

gulp.task('serve', ['scripts', 'watch', 'prefix', 'browserSync-server']);
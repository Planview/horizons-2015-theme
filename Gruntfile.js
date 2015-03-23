module.exports = function (grunt) {
  'use strict';

  require('load-grunt-tasks')(grunt);
  require('time-grunt')(grunt);

  grunt.initConfig({
    sass: {
      options: {
        loadPath: 'bower_components'
      },
      styles: {
        files: [{
          expand: true,
          cwd: 'scss',
          src: ['*.scss'],
          dest: 'css',
          ext: '.css'
        }]
      }
    },
    watch: {
      js: {
        files: ['js/{,*/}*.js'],
        tasks: ['jshint'],
        options: {
          livereload: true
        }
      },
      gruntfile: {
        files: ['Gruntfile.js']
      },
      sass: {
        files: ['scss/{,*/}*.{scss,sass}'],
        tasks: ['sass:styles'/*, 'autoprefixer'*/]
      },
      livereload: {
        options: {
          livereload: true
        },
        files: [
          '**/*.php',
          '!vendor/**/*.php'
        ]
      }
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc',
        reporter: require('jshint-stylish')
      },
      all: [
        'Gruntfile.js',
        'js/{,*/}*.js'
      ]
    },
    // Add vendor prefixed styles
    autoprefixer: {
      options: {
        browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
      },
      dist: {
        files: [{
          expand: true,
          cwd: 'css/',
          src: '{,*/}*.css',
          dest: 'css/'
        }]
      }
    }
  });

  grunt.registerTask('default', [
    'sass:styles',
    'jshint',
    'watch'
  ]);
};

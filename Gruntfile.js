/**
 * Created by frank on 02.04.15.
 */

module.exports = function( grunt ) {

	// Do grunt-related things in here
	// Set strict js mode
	'use strict';

	var JS_PATH  = 'assets/js/',
		CSS_PATH = 'assets/css/',
		IMG_PATH = 'assets/img/';

	grunt.initConfig( {
		// watch for changes and trigger
		watch: {
			scripts: {
				files: '<%= jshint.files %>',
				tasks: [ 'jshint', 'uglify' ],
				options: {
					spawn: false
				}
			},
			css: {
				files: [ CSS_PATH + '*.css' ],
				tasks: [ 'cssmin' ]
			}
		},

		// javascript linting with jshint
		jshint: {
			files  : [ 'Gruntfile.js', JS_PATH + 'main.js' ],
			options: {
				// options here to override JSHint defaults
				globals: {
					jQuery  : true,
					console : true,
					module  : true,
					document: true
				}
			}
		},

		// use cssmin for minifying CSS file(s)
		cssmin: {
			target: {
				files: [
					{
						expand: true,
						cwd   : CSS_PATH,
						src   : [ '*.css', '!*.min.css' ],
						dest  : CSS_PATH,
						ext   : '.min.css'
					}
				]
			}
		},

		// uglify to concat, minify, and make source maps
		uglify: {
			target: {
				files: [
					{
						expand: true,
						cwd   : JS_PATH,
						src   : [ '*.js', '!*.min.js' ],
						dest  : JS_PATH,
						ext   : '.min.js'
					}
				]
			}
		}
	} );

	// load all grunt tasks
	require( 'matchdep' ).filterDev( 'grunt-*' ).forEach( grunt.loadNpmTasks );

	// register task
	//grunt.registerTask( 'default', [ 'watch' ] );
	grunt.registerTask( 'default', [ 'jshint', 'cssmin', 'uglify' ] );
};

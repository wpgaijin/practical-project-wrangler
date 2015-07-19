module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Sass
		sass: {
			dist: {
				options: {
					style: 'expanded',
					sourcemap: 'none'
				},
				files: {
					'includes/css/style.css': 'sass/style.scss',
					'admin/css/style.css': 'sass/admin-style.scss'
				}
			}
		},

		// Autoprefexer
		autoprefixer: {
	        style: {
				src: 'includes/css/style.css',
				dest: 'includes/css/style.css'
			},
			admin: {
				src: 'admin/css/style.css',
				dest: 'admin/css/style.css'
			}
		},

		// CSSmin
	    cssmin: {
			target: {
				files: {
					'includes/css/style.min.css': 'includes/css/style.css',
					'admin/css/style.min.css': 'admin/css/style.css'
				}
			}
        },

		// Concat JS
	    concat: {
	        /*main: {
	            src: [
	                'js/lib/no-conflict/no-conflict.js'
	            ],
	            dest: 'js/scripts.min.js'
	        }*/
	    },

	    // Jshint
	    jshint: {
	        files: [
	        	'includes/js/ppw-client-form.js',
                'includes/js/ppw-comments-off.js',
                'includes/js/ppw-comments-editor.js',
                'includes/js/ppw-password-meter.js',
                'includes/js/ppw-project-search.js'
	        ],
			options: {
				scripturl: true,
				globals: {
					jQuery: true
				}
			}
	    },

	    // JSValidate
	    jsvalidate: {
			options:{
				globals: {},
				esprimaOptions: {},
				verbose: false
			},
			dist:{
				files:{
					src: [
			        	'includes/js/ppw-client-form.js',
		                'includes/js/ppw-comments-off.js',
		                'includes/js/ppw-comments-editor.js',
		                'includes/js/ppw-password-meter.js',
		                'includes/js/ppw-project-search.js'
	        		]
				}
			}
		},

		// Uglify
        uglify: {
            options: {
                mangle: false,
                compress: true,
                quoteStyle: 3
            },
            dist: {
                files: {
                	'includes/js/ppw-client-form.min.js': 'includes/js/ppw-client-form.js',
                    'includes/js/ppw-comments-off.min.js': 'includes/js/ppw-comments-off.js',
                    'includes/js/ppw-comment-editor.min.js': 'includes/js/ppw-comment-editor.js',
                    'includes/js/ppw-password-meter.min.js': 'includes/js/ppw-password-meter.js',
                    'includes/js/ppw-project-search.min.js': 'includes/js/ppw-project-search.js'
                }
            }
        },

	    // Watch
	    watch: {
            livereload: {
                options: {livereload: true},
				files: ['*.css', 'includes/js/*.js', '*.html', '*.php', 'images/*']
            },
            scripts: {
                files: ['includes/js/**/*.js'],
                tasks: ['jshint', 'jsvalidate', /*'concat',*/ 'uglify'],
                options: {
                    spawn: false
                }
            },
            css: {
              files: ['sass/**/*.scss'],
              tasks: ['sass', 'autoprefixer', 'cssmin']
            }
        },

        // Clean
        clean: {
            build: {
                src: [ '_build' ]
            }
        },

        // Copy
        copy: {
            build: {
                src: [
                    '**',
                    '!**/.sass-cache/**',
                    '!**/assets/**'
                ],
                dot: [
                    '.htaccess'
                ],
                dest: '_build',
                expand: true
            }
        }

	});
	
	// Autoprefixer
	grunt.loadNpmTasks('grunt-autoprefixer');
    // Concat
    grunt.loadNpmTasks('grunt-contrib-concat');
    // CSSmin
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    // Jshint
    grunt.loadNpmTasks('grunt-contrib-jshint');
    // JSValidate
    grunt.loadNpmTasks('grunt-jsvalidate');
    // Uglify
    grunt.loadNpmTasks('grunt-contrib-uglify');
    // Watch
    grunt.loadNpmTasks('grunt-contrib-watch');
    // Sass
    grunt.loadNpmTasks('grunt-contrib-sass');
    // Clean
    grunt.loadNpmTasks('grunt-contrib-clean');
    // Copy
    grunt.loadNpmTasks('grunt-contrib-copy');

    // Watch Task
    grunt.registerTask('default', ['watch']);
    // Build Task
    grunt.registerTask('build', ['clean', 'copy']);

};
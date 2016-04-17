module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'dest/css/style.css' : 'src/scss/style.scss'
				}
			}
		},
		cssmin: {
		  	options: {
		    	shorthandCompacting: false,
		    	roundingPrecision: -1
		  	},
		  	target: {
		    	files: {
		      		'dest/css/style.min.css': ['dest/css/style.css']
		    	}
		  	}
		},
		uglify: {
		    my_target: {
		      	files: {
		        	'dest/js/main.min.js': ['src/js/main.js']
		      	}
		    }
		},
		watch: {
			css: {
				files: 'src/scss/*.scss',
				tasks: ['sass']
			},

			scripts: {
				files: ['src/js/*.js'],
			    tasks: ['uglify'],
			    options: {
			      spawn: false,
			    },
			}
		},
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default',['uglify', 'cssmin', 'watch']);
}
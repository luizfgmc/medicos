module.exports = function (grunt) {
    grunt.initConfig({
        autoprefixer: {
           dist: {
                    src: 'assets/css/**/*.css'
                }
        },
        watch: {
            styles: {
                files: ['main.css'],
                tasks: ['autoprefixer']
            }
        }
    });
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-watch');
};
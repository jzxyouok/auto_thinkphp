var src  = 'app';
var build= 'build';

module.exports = {
    browsersync :{
        development:{
            server:{
                baseDir:[build]
            },
            port:9999,
        }
    },
    delete:{
        src:[build+'/*'],
    },
}


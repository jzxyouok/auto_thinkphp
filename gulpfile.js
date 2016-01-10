var requireDir =  require('require-dir');
// require all files on /gulp/tasks ,including subfolders
requireDir('./gulp/tasks',{recurse:true});

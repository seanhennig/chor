function plugin_return_file_id(){
	this.name='return_file_id';
	this.title='return file id';
	this.mode=2;//single files
	this.writable=2;
	this.category='returning';
	this.extensions='all';
	this.doFunction=function(files){
		window.opener.SetUrl(files.join(','));
		setTimeout('window.close()',1);
	}
}
// removed zUhrikova 3/2/2010 Foliovisoin
//kfm_addHook(new plugin_return_file_id());

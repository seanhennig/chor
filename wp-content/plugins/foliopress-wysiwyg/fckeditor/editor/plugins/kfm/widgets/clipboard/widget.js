function Clipboard(){
	this.istarget=0;
	this.name='Clipboard'; // TODO: new string
	this.files=[];
	this.folders=[];
	this.display=function(){
		el=document.createElement('div');
		el.id='kfm_widget_clipboard_container';
		el.className='widget_clipboard';
		el.title=this.name;
		$j(el).css('float','left');
		el.style.padding='5px';
		el.style.width='70px';
		el.style.height='70px';
		el.style.background='url(\'widgets/clipboard/clipboard_empty.png\') no-repeat';
		el.style.fontSize='10px';
		$j.event.add(el,'mouseover',function(){
			if(document.getElementById('kdnd_drag_wrapper')){
				if(kfm_theme=='blt') this.style.backgroundImage='url(\'widgets/clipboard/clipboard_add_blt.png\')';
				else this.style.backgroundImage='url(\'widgets/clipboard/clipboard_add.png\')';
			}
			if(this.hasEventsSet)return;
			$j.event.add(this,'mouseout',function(){this.setAppearance();});
			$j.event.add(this,'click',function(){
				if(!selectedFiles.length)return;
				this.action(selectedFiles,[]);
				kfm_selectNone();
			});
			this.hasEventsSet=true;
		});
		if(kfm_theme=='blt'){
			el.empty_url='widgets/clipboard/clipboard_empty_blt.png';
			el.full_url='widgets/clipboard/clipboard_full_blt.png';
			$j(el).css('background-image','url('+el.empty_url+')');
		}else{
			el.empty_url='widgets/clipboard/clipboard_empty.png';
			el.full_url='widgets/clipboard/clipboard_full.png';
		}
		el.files=[];
		el.folders=[];
		el.setAppearance=function(){
			var html='';
			if(this.files.length || this.folders.length){
				this.style.backgroundImage='url(\''+this.full_url+'\')';
				if(this.files.length)html+=this.files.length+' file'; // TODO: new string
				if(this.files.length>1)html+='s';
				if(this.folders.length)html+='<br/>'+this.folders.length+' folders'; // TODO: new string
			}
			else this.style.backgroundImage='url(\''+this.empty_url+'\')';
			this.innerHTML=html;
		}
		el.action=function(files,folders){
			for(var i=0;i<files.length;i++){
				if(!kfm_inArray(files[i],this.files))this.files.push(files[i]);
			}
			for(var i=0;i<folders.length;i++){
				if(!kfm_inArray(folders[i],this.folders))this.folders.push(folders[i]);
			}
			this.setAppearance();
		};
		el.clearContents=function(){
			this.files=[];
			this.folders=[];
			this.setAppearance();
		};
		el.pasteContents=function(){
			if(this.files.length)x_kfm_copyFiles(this.files,kfm_cwd_id,function(m){
				kfm_showMessage(m);
				x_kfm_loadFiles(kfm_cwd_id,kfm_refreshFiles);
			});
			if(this.folders.length)kfm.alert(_("paste of folders is not complete. please post a request at http://mantis.verens.com/ if you need this")); //TODO: complete
			this.clearContents();
		};
		kfm_addContextMenu(el,function(e){
			var el=$('kfm_widget_clipboard_container');
			var links=[];
			var plugins=kfm_getLinks(el.files);
			{ // add the links
				context_categories['kfm'].add({
					name:'clipboard_clear',
					title:'clear clipboard',
					category:'kfm',
					doFunction:function(){el.clearContents();}
				});
				context_categories['kfm'].add({
					name:'clipboard_paste',
					title:'paste clipboard to current folder',
					category:'kfm',
					doFunction:function(){el.pasteContents();}
				});
			}
		});
		setTimeout("kdnd_makeDraggable('widget_clipboard');",1);
		return el;
	}
	return this;
}
kfm_addWidget(new Clipboard());
kdnd_addDropHandler('widget_clipboard','#kfm_right_column',function(e){
	e.sourceElement.pasteContents();
});
kdnd_addDropHandler('kfm_file','.widget_clipboard',function(e){
	if(!selectedFiles.length)kfm_addToSelection(e.sourceElement.id.replace(/.*_/,''));
	e.targetElement.action(selectedFiles,[]);
});
kdnd_addDropHandler('kfm_dir_name','.widget_clipboard',function(e){
	var dir_from=parseInt($j('.kfm_directory_link',e.sourceElement)[0].node_id);
	e.targetElement.action([],[dir_from]);
});
kdnd_addDropHandler('widget_clipboard','.kfm_dir_name',function(e){
	if(!e.sourceElement.files.length)return;
	var dir_over=parseInt($j('.kfm_directory_link',e.targetElement)[0].node_id);
	var links=[];
	links.push(['x_kfm_copyFiles(['+e.sourceElement.files.join(',')+'],'+dir_over+',kfm_showMessage);kfm_selectNone()','copy files']);
	links.push(['x_kfm_moveFiles(['+e.sourceElement.files.join(',')+'],'+dir_over+',function(e){if($type(e)=="string")return alert("error: could not move file[s]");kfm_removeFilesFromView(['+selectedFiles.join(',')+'])});kfm_selectNone()','move files',0,!kfm_vars.permissions.file.mv]); // TODO: new string
	kfm_createContextMenu({x:e.pageX,y:e.pageY},links);
	e.sourceElement.clearContents();
});
kdnd_addDropHandler('widget_clipboard','.widget_trash',function(e){
	if(!e.sourceElement.files.length)return;
	e.targetElement.action(e.sourceElement.files);
	e.sourceElement.clearContents();
});

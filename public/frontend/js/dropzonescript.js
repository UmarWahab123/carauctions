// var DropzoneDemo={init:function(){Dropzone.options.mDropzoneOne={paramName:"file",maxFiles:1,maxFilesize:5,addRemoveLinks:!0,accept:function(e,o){"justinbieber.jpg"==e.name?o("Naha, you don't."):o()}},Dropzone.options.mDropzoneTwo={paramName:"file",maxFiles:10,maxFilesize:10,addRemoveLinks:!0,accept:function(e,o){"justinbieber.jpg"==e.name?o("Naha, you don't."):o()}},Dropzone.options.mDropzoneThree={paramName:"file",maxFiles:10,maxFilesize:10,addRemoveLinks:!0,acceptedFiles:"image/*,application/pdf,.psd",accept:function(e,o){"justinbieber.jpg"==e.name?o("Naha, you don't."):o()}}}};DropzoneDemo.init();
function removeImg(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

function JS_ClearDropZone() {
    //DropZone Object Get
    
}
var posts= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.posts= {
                paramName:"file",
                maxFiles:20,
                maxFilesize:20,
                acceptedFiles:".jpg,.jpeg,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "/uploads/posts/"+serverFileName;
                    // $('input[name="image"]').val(fileListinput[i]);
                    $('input[name="image"]').val(JSON.stringify(fileListinput));
                    i++;
                },
                removedfile:function(file) {
                    var path ="/uploads/posts/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            //  url: document.location.origin+"/ozland/delete_temp_files.php",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="image"]').val(JSON.stringify(fileListinput));
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }
          
        }
    }
    ;

var imagesupload= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.imagesupload= {
                paramName:"file",
                maxFiles:30,
                maxFilesize:5000,
                acceptedFiles:".jpg,.jpeg,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = serverFileName;
                    //when multiple file upload use the below line
                    $('input[name="lotimage"]').val(JSON.stringify(fileListinput));
                    //when single file upload use the below line
                    // $('input[name="images"]').val(fileListinput[i]);
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/lot/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="lotimage"]').val('');
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }

        }
    }
    ;

var imagesupload1= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.imagesupload1= {
                paramName:"file",
                maxFiles:1,
                maxFilesize:5000,
                acceptedFiles:".jpg,.jpeg,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "/public/uploads/business/"+serverFileName;
                    //when multiple file upload use the below line
                    // $('input[name="dp"]').val(JSON.stringify(fileListinput));
                    //when single file upload use the below line
                    $('input[name="dp"]').val(fileListinput[i]);
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/business/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="dp"]').val('');
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }

        }
    }
    ;
    var imagesupload3 = {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.imagesupload3={
                paramName:"file",
                maxFiles:1,
                maxFilesize:5000,
                acceptedFiles:".jpg,.jpeg,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "/public/uploads/resume/"+serverFileName;
                    //when multiple file upload use the below line
                    // $('input[name="dp"]').val(JSON.stringify(fileListinput));
                    //when single file upload use the below line
                    $('input[name="cv_file"]').val(fileListinput[i]);
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/resume/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="cv_file"]').val('');
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }

        }
    };
    var imagesupload2= {
        init:function() {
            var fileList = new Array;
            var fileListinput = new Array;
            var i =0;
            Dropzone.options.imagesupload2= {
                paramName:"file",
                maxFiles:1,
                maxFilesize:5000,
                acceptedFiles:".jpg,.jpeg,.png",
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                    fileListinput[i] = "/public/uploads/affiliate/"+serverFileName;
                    //when multiple file upload use the below line
                    // $('input[name="dp"]').val(JSON.stringify(fileListinput));
                    //when single file upload use the below line
                    $('input[name="dp"]').val(fileListinput[i]);
                    i++;
                },
                removedfile:function(file) {
                    var path ="/public/uploads/affiliate/";
                    var rmvFile = "";
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="dp"]').val('');
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
            }

        }
    }
    ;

imagesupload3.init();
imagesupload2.init();
imagesupload1.init();
imagesupload.init();
posts.init();
